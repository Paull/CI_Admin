<?php defined('BASEPATH') || exit('No direct script access allowed');

class Member extends MY_Controller {

    private $_model = 'm_member';

    function __construct()
    {
        parent::__construct();
        $this->load->language('member');
    }
    
    //后台会员列表
    public function index()
    {
        $this->_data['template']['title'] = '会员列表';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>$this->_data['template']['title']);

        $this->_data['template']['styles'][] = STATIC_URL.'plugins/jquery.x-editable/css/bootstrap-editable.css';
        $this->_data['template']['scripts'][] = STATIC_URL.'plugins/jquery.x-editable/js/bootstrap-editable.min.js';

        $this->_data['template']['styles'][] = STATIC_URL.'plugins/jquery.footable/css/footable.core.min.css';
        $this->_data['template']['scripts'][] = STATIC_URL.'plugins/jquery.footable/dist/footable.min.js';
        $this->_data['template']['scripts'][] = STATIC_URL.'plugins/jquery.footable/dist/footable.filter.min.js';
        $this->_data['template']['scripts'][] = STATIC_URL.'plugins/jquery.footable/dist/footable.sort.min.js';
        $this->_data['template']['scripts'][] = STATIC_URL.'plugins/jquery.footable/dist/footable.paginate.min.js';

        $this->_data['template']['javascript'] .= "
$(\"span[data-toggle='tooltip']\").tooltip();

$('.footable').footable();

$('.editable').editable({
    selector: 'a[data-type]',
    ajaxOptions: {
        dataType: 'json'
    },
    url: '".base_url(CLASS_URI.'/ajax_modify')."',
    validate: function(value) {
        if($.trim(value) == '') return '该项必须填写.';
    },
    params: function(params) {
        params.hash = hash;
        return params;
    },
    success: function(response, newValue) {
        if(!response.success){
            return response.msg;
        }else{
            return {newValue: response.newValue}
        }
    }
});\n";

        //读取数据
        $this->_data['list'] = $this->{$this->_model}->order_by('id')->get()->result_array();
        
        //加载模板
        $this->load->view($this->_layout, $this->_data);
    }

    //会员添加、修改
    public function modify($id=0)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="label label-important">', '</span>');
        $this->form_validation->set_rules('password', '密码', 'required|min_length[6]');
        $this->form_validation->set_rules('identity', '身份', 'required|alpha');
        $this->form_validation->set_rules('status', '状态', 'required|callback__check_status');
        $this->form_validation->set_rules('areaid', lang('area'), 'required|is_natural_no_zero');

        if($id > 0)
        {
            $this->form_validation->set_rules('username', '帐号', 'required|min_length[2]|max_length[10]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('realname', '称呼', 'required|min_length[2]|max_length[10]');
            //初始化会员数据
            $this->_data['row'] = $this->{$this->_model}->where('id', $id)->get()->row_array();
            $this->_data['template']['title'] = '修改会员';
            $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>'会员列表');
            $this->_data['template']['breadcrumbs'][] = array('uri'=>METHOD_URI, 'title'=>$this->_data['template']['title']);
            $this->_data['template']['breadcrumbs'][] = array('uri'=>METHOD_URI.'/'.$id, 'title'=>$this->_data['row']['realname']);
        }
        else
        {
            $this->form_validation->set_rules('username', '帐号', 'required|min_length[2]|max_length[10]|is_unique[member.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[member.email]');
            $this->form_validation->set_rules('realname', '称呼', 'required|min_length[2]|max_length[10]|is_unique[member.realname]');
            $this->_data['template']['title'] = '添加会员';
            $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>'会员列表');
            $this->_data['template']['breadcrumbs'][] = array('uri'=>METHOD_URI, 'title'=>$this->_data['template']['title']);
            //初始化会员空数据
            $this->_data['row'] = $this->{$this->_model}->new_row();
        }

        if ($this->form_validation->run() == FALSE)
        {
            //初始化选项列表数据
            $this->_data['groups'] = Helper_Array::toHashmap(load_options('member_identity', $this->_data['self']['identity']), 'value', 'text');
            $this->_data['status'] = Helper_Array::toHashmap(load_options('member_status'), 'value', 'text');
            $this->_data['areas'] = $this->m_area->get_dropdown();

            $this->load->view($this->_layout, $this->_data);
        }
        else
        {
            //准备更新数据
            if($id > 0)
            {
                $data['id'] = $id;
                //密码有变动
                if($this->_data['row']['password'] != $this->input->post('password'))
                {
                    $data['old_password'] = $this->_data['row']['password'];
                    $data['salt'] = $this->_data['row']['salt'];
                }
            }
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['realname'] = $this->input->post('realname');
            $data['password'] = $this->input->post('password');
            $data['identity'] = $this->input->post('identity');
            $data['status'] = $this->input->post('status');
            $data['areaid'] = $this->input->post('areaid');

            //更新数据
            $result = $this->{$this->_model}->modify($data);

            if($result)
            {
                $this->load->view('common/message', array('message'=>$this->_data['template']['title']."成功", 'url'=>site_url(CLASS_URI)));
            }
            else
            {
                $this->load->view('common/message', array('message'=>$this->_data['template']['title']."失败"));
            }
        }
    }
    
    //会员删除
    public function destroy($id){
        $id = intval($id);

        $this->{$this->_model}->destroy($id);

        redirect(REFERER_URI);
    }


    //动态加载SELECT选项
    public function load_options($field)
    {
        if ( $field == 'areas' )
        {
            $data = $this->m_area->get_dropdown('array');
        }
        else
        {
            $data = load_options('member_'.$field, $this->_data['self']['identity']);
        }

        $this->output->set_output(json_encode($data));
    }
    
    //会员表格单击修改
    public function ajax_modify()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');

        $rules['id'] = array('name'=>'pk', 'title'=>'编号', 'rule'=>'required|is_natural_no_zero|callback__check_id');
        $rules['username'] = array('name'=>'value', 'title'=>'帐号', 'rule'=>'required|min_length[2]|max_length[10]|is_unique[member.username]');
        $rules['email'] = array('name'=>'value', 'title'=>'Email', 'rule'=>'required|valid_email|is_unique[member.email]');
        $rules['realname'] = array('name'=>'value', 'title'=>'称呼', 'rule'=>'required|min_length[2]|max_length[10]|is_unique[member.realname]');
        $rules['identity'] = array('name'=>'value', 'title'=>'身份', 'rule'=>'required|callback__check_identity');
        $rules['status'] = array('name'=>'value', 'title'=>'状态', 'rule'=>'required|callback__check_status');
        $rules['areaid'] = array('name'=>'value', 'title'=>lang('area'), 'rule'=>'required|is_natural_no_zero');

        if($this->input->is_ajax_request() && $this->input->post())
        {
            $data['id'] = $this->input->post('pk');
            $data[$this->input->post('name')] = $this->input->post('value');

            //为每个提交的值设置表单验证规则
            foreach($data as $key=>$value)
            {
                if(isset($rules[$key]))
                {
                    $this->form_validation->set_rules($rules[$key]['name'], $rules[$key]['title'], $rules[$key]['rule']);
                }
            }


            if ($this->form_validation->run() == FALSE)
            {
                $response['success'] = false;
                $response['msg'] = validation_errors();
            }
            else
            {
                try
                {
                    $response['success'] = $this->{$this->_model}->modify($data);
                }
                catch(Exception $e)
                {
                    $response['msg'] = $e->getMessage();
                }

                if( ! $response['success'] && !isset($response['msg']) )
                {
                    $response['msg'] = '更新失败';
                }
                else
                {
                    $response['newValue'] = $this->input->post('value');
                }
            }

            $this->output->set_output(json_encode($response));
        }
    }

    //检查帐号是否存在
    public function _check_id($str)
    {
        if($this->{$this->_model}->where('id', $str)->get()->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__, '会员数据不存在.');
            return FALSE;
        }
    }

    //验证身份选项是否正确
    public function _check_identity($str)
    {
        if( in_array($str, array('user', 'agent', 'superman')) )
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__, '该选项不可用.');
            return FALSE;
        }
    }

    //验证状态选项是否正确
    public function _check_status($str)
    {
        if( in_array($str, array('-1.suspend', '0.standby', '1.email_confirmed', '2.admin_confirmed', '9.active')) )
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__, '该选项不可用.');
            return FALSE;
        }
    }
    
}

/* End of file Member.php */
/* Location: ./application/controllers/admincp/Member.php */
