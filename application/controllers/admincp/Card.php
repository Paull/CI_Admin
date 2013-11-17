<?php defined('BASEPATH') || exit('No direct script access allowed');

class Card extends MY_Controller {

    function __construct()
    {
        parent::__construct();

        //加载本控制器常用模块
        $this->load->model('m_card');
    }

    //充值卡列表
    public function prepaid($page=0)
    {
        $page = intval($page);
        $this->load->library('pagination');

        $this->_data['template']['title'] = '充值卡列表';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>METHOD_URI, 'title'=>$this->_data['template']['title']);

        $this->_data['template']['styles'][] = BASEURL.'assets/plugins/jquery.x-editable/css/bootstrap-editable.css';
        $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/jquery.x-editable/js/bootstrap-editable.min.js';

        $this->_data['template']['javascript'] .= "
$('#editable').editable({
    selector: \"a[data-type]\",
    ajaxOptions: {
        dataType: 'json'
    },
    url: '".base_url(CLASS_URI.'/ajax_edit_prepaid_card')."',
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
});

var get_username = function(obj, uid){
    $(obj).load('".base_url(CLASS_URI.'/ajax_get_username')."', {uid: uid, hash:hash});
}\n";

        //分析查询条件
        $conditions = array();
        $this->_data['keyword'] = $this->input->post('keyword');

        if( $this->_data['keyword'] === NULL)
        {
            $this->_data['keyword'] = $this->uri->segment(5);
        }

        //设置查询条件
        if ( $this->_data['keyword'] )
        {
            $conditions = array('cardnum'=>$this->_data['keyword'], 'remark'=>$this->_data['keyword']);
        }

        //分页参数配置
        $config['base_url']   = base_url(METHOD_URI);
        if ( $this->_data['keyword'] )
        {
            $config['first_url']   = site_url(METHOD_URI.'/0/'.$this->_data['keyword']);
        }
        else
        {
            $config['first_url']   = site_url(METHOD_URI);
        }
        $config['uri_segment'] = 4;
        $config['suffix']     = $this->_data['keyword'] ? '/'.$this->_data['keyword'].URL_SUFFIX : URL_SUFFIX;
        $config['total_rows'] = $this->m_card->or_like($conditions)->num_rows();
        $config['num_links']  = 10;
        $config['per_page']   = 10;
        $page = $page > floor($config['total_rows'] / $config['per_page']) * $config['per_page'] ? floor($config['total_rows'] / $config['per_page']) * $config['per_page'] : $page;    //分页参数大于最大页数则缩减到最大页
        $config['cur_page']   = $page;

        //加载分页配置
        $this->pagination->initialize($config);
        $this->_data['pager'] = $this->pagination->create_links();
        
        //读取数据
        $this->_data['list'] = $this->m_card->or_like($conditions)->order_by('id')->get_page($page, $config['per_page'])->result_array();
        
        $this->load->view('common/layout', $this->_data);
    }
    
    //查验充值卡
    public function verify($cardnum='')
    {
        $this->_data['template']['title'] = '充值卡查验';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>METHOD_URI, 'title'=>$this->_data['template']['title']);

        $this->_data['keyword'] = $this->input->post('keyword');
        if( $this->_data['keyword'] === NULL)
        {
            $this->_data['keyword'] = $cardnum;
        }
        if($this->_data['keyword'])
        {
            $this->_data['row'] = $this->m_card->find(array('cardnum'=>$this->_data['keyword']))->row_array();
            if($this->_data['row']['used_by'] > 0)
            {
                $member = $this->m_member->select('email, realname')->find($this->_data['row']['used_by'])->row_array();
                if(!empty($member))
                {
                    $this->_data['row']['used_by'] = $member['realname'] ? mb_substr($member['realname'], 0, 1).'*****'. mb_substr($member['realname'], -1): substr($member['email'], 0, 1).'*****'. substr($member['email'], -1);
                }
                else
                {
                    $this->_data['row']['used_by'] = '检索出错';
                }
            }
        }

        $this->load->view('common/layout', $this->_data);
    }

    //使用充值卡
    public function charge($cardnum='')
    {
        $this->_data['cardnum'] = $cardnum;

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>');
        $this->form_validation->set_rules('username', '用户名', 'required|min_length[2]|max_length[7]|callback__check_username');
        $this->form_validation->set_rules('cardnum',  '充值卡', 'required|alpha_dash|callback__check_cardnum');

        $this->_data['template']['title'] = '充值';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>METHOD_URI, 'title'=>$this->_data['template']['title']);

        if($this->form_validation->run() === TRUE)
        {
            //充值
            $this->_data['card']   = $this->m_card->find(array('cardnum'=>$this->input->post('cardnum')))->row_array();
            $this->_data['member'] = $this->m_member->find(array('realname'=>$this->input->post('username')))->row_array();
            $this->_data['result'] = $this->m_card->charge($this->_data['member']['id'], $this->_data['card']['cardnum'], $this->_data['card']['balance']);

            //如果是为自已充值，则重新读取$self
            if ( $this->_data['member']['id'] == $this->_data['self']['id'] )
            {
                $this->_data['self'] = $this->m_member->find($this->_data['self']['id'])->row_array();
            }
        }
        
        $this->load->view('common/layout', $this->_data);
    }

    //生成充值卡
    public function generate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="label label-important">', '</span>');
        $this->form_validation->set_rules('prefix',  '前缀', 'required|alpha|max_length[4]|callback__check_prefix');
        $this->form_validation->set_rules('balance', '面额', 'required|is_natural_no_zero|callback__check_balance');
        $this->form_validation->set_rules('number',  '数量', 'required|is_natural_no_zero');

        $this->_data['template']['title'] = '生成充值卡';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>METHOD_URI, 'title'=>$this->_data['template']['title']);

        if($this->form_validation->run() === TRUE)
        {
            //使用模型生成充值卡
            $this->_data['list'] = $this->m_card->generate($this->_data['self']['id'], $this->input->post('prefix'), $this->input->post('balance'), $this->input->post('number'));

            //重新读取$self
            $this->_data['self'] = $this->m_member->find($this->_data['self']['id'])->row_array();
        }

        $this->load->view('common/layout', $this->_data);
    }

    //动态加载会员身份选项
    public function ajax_load_options_status()
    {
        $data = array(
            array('value'=>'ok', 'text'=>'可用'),
            array('value'=>'used', 'text'=>'被使用'),
            array('value'=>'banned', 'text'=>'禁用'),
        );

        $this->output->set_output(json_encode($data));
    }

    //动态读取用户名
    public function ajax_get_username()
    {
        $uid = intval($this->input->post('uid'));
        $member = $this->m_member->select('email, realname')->find($uid)->row_array();
        if(!empty($member))
        {
            $this->output->set_output($member['realname'] ? $member['realname'] : $member['email']);
        }
        else
        {
            $this->output->set_output('数据不存在');
        }
    }
    
    //卡列表表格单击修改
    public function ajax_edit_prepaid_card()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');

        $rules['id'] = array('name'=>'pk', 'title'=>'编号', 'rule'=>'required|is_natural_no_zero|callback__check_id');
        $rules['cardnum'] = array('name'=>'value', 'title'=>'卡号', 'rule'=>'trim|required');
        $rules['balance'] = array('name'=>'value', 'title'=>'面额', 'rule'=>'trim|required|numeric');
        $rules['remark'] = array('name'=>'value', 'title'=>'备注', 'rule'=>'trim|required');

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
                    $response['success'] = $this->m_card->modify($data);

                    //记录日志----------------------
                    $log['uid'] = $this->session->userdata('uid');
                    $log['operate'] = 'modify card #'.$data['id'].'\'s '.$this->input->post('name').' to '.$this->input->post('value');
                    $log['status'] = $response['success'];
                    $log['debug_info'] = TRUE;
                    $this->m_log->create($log);
                    //记录日志----------------------
                }
                catch(Exception $e)
                {
                    $response['msg'] = $e->getMessage();
                }

                if(! $response['success'] && !$response['msg'])
                {
                    $response['msg'] = '更新失败';
                }
                else
                {
                    if($this->input->post('name') == 'balance')
                    {
                        $response['newValue'] = number_format($this->input->post('value'), 2);
                    }
                    else
                    {
                        $response['newValue'] = $this->input->post('value');
                    }
                }
            }

            $this->output->set_output(json_encode($response));
        }
    }

    //检查卡号是否存在
    public function _check_id($str)
    {
        if($this->m_card->find($str)->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__, '数据不存在.');
            return FALSE;
        }
    }

    //检查前缀是否允许
    public function _check_prefix($str)
    {
        if( in_array(strtoupper($str), array('CARD', 'GIFT')) && !$this->is_superman() )
        {
            $this->form_validation->set_message(__FUNCTION__, '请更换前缀，'.$str.'为系统内置类型.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //检查帐号余额是否足够
    public function _check_balance($str)
    {
        if($this->input->post('balance') % 10 > 0)
        {
            $this->form_validation->set_message(__FUNCTION__, '充值卡面额必须是10的整数倍数.');
            return FALSE;
        }
        elseif($this->input->post('balance') * $this->input->post('number') > $this->_data['self']['balance'])
        {
            $this->form_validation->set_message(__FUNCTION__, '帐户余额不足.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //检查用户名是否存在
    public function _check_username($str)
    {
        if( $this->m_member->where(array('realname'=>$str))->num_rows() < 1 )
        {
            $this->form_validation->set_message(__FUNCTION__, '用户['.$str.']不存在.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //检查充值卡状态
    public function _check_cardnum($str)
    {
        $card = $this->m_card->find(array('cardnum'=>$str))->row_array();

        if( empty($card) )
        {
            $this->form_validation->set_message(__FUNCTION__, '卡号['.$str.']不存在.');
            return FALSE;
        }
        elseif( $card['status'] != 'ok' )
        {
            switch($card['status'])
            {
                case 'used':
                    $this->form_validation->set_message(__FUNCTION__, '卡号['.$str.']已被使用.');
                    break;
                case 'banned':
                    $this->form_validation->set_message(__FUNCTION__, '卡号['.$str.']已被禁用.');
                    break;
            }
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
}

/* End of file Card.php */
/* Location: ./application/controllers/admincp/Card.php */