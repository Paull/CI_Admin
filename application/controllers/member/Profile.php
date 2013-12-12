<?php defined('BASEPATH') || exit('No direct script access allowed');

class Profile extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->language('member');
    }
    
    //个人资料
    public function index()
    {
        //定义三种头像规格
        $format['_big.png']    = array('width'=>200, 'height'=>200);
        $format['_middle.png'] = array('width'=>120, 'height'=>120);
        $format['_small.png']  = array('width'=>48, 'height'=>48);

        $action = $this->input->post('action') ? $this->input->post('action') : 'profile';

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="label label-important">', '</span>');
        switch($action)
        {
            case 'profile':
                $this->form_validation->set_rules('email',    lang('email'),    'required|valid_email');
                $this->form_validation->set_rules('realname', lang('realname'), 'required|min_length[2]|max_length[10]');
                break;
            case 'password':
                $this->form_validation->set_rules('old_password', lang('old_password'),         'required|min_length[6]|callback__check_password_modify');
                $this->form_validation->set_rules('password1',    lang('new_password'),         'required|min_length[6]');
                $this->form_validation->set_rules('password2',    lang('new_password_confirm'), 'required|min_length[6]|matches[password1]');
                break;
        }

        $this->_data['template']['title'] = lang('profile');
        $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>$this->_data['template']['title']);

        if ($this->form_validation->run() == FALSE)
        {
            $this->_data['template']['styles'][] = BASEURL.'assets/plugins/bootstrap.fileupload/bootstrap-fileupload.min.css';
            $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/bootstrap.fileupload/bootstrap-fileupload.min.js';

            $this->_data['template']['javascript'] .= "$('#tabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
}).filter(\"[href='#{$action}']\").tab('show');\n";

            $this->load->view($this->_layout, $this->_data);
        }
        else
        {
            if($action == 'profile')
            {
                //有头像上传
                if($_FILES['avatar']['name'] != '' && $_FILES['avatar']['size'] > 0)
                {
                    $config['upload_path'] = TMP_PATH;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2048';   //单位是KB
                    $config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('avatar'))
                    {   //上传失败
                        $this->output->set_output($this->upload->display_errors());
                    } 
                    else
                    {   //上传成功
                        $upload_data = $this->upload->data();

                        //确认是否是图像文件
                        if($upload_data['is_image'])
                        {
                            $this->load->helper('thumbnail');

                            //生成头像
                            foreach($format as $key=>$value)
                            {
                                $cropped = resizeThumbnailImage($upload_data['full_path'], $upload_data['image_width'], $upload_data['image_height'], 0, 0, $value['width'], $value['height']);
                                $filename = AVATAR_PATH . $upload_data['raw_name'] . $key;
                                ImagePng($cropped, $filename);
                                ImageDestroy($cropped);
                            }
                            //删除裁剪前的照片
                            @unlink($upload_data['full_path']);
                            //生成更新需要的数据
                            $data['avatar'] = $upload_data['raw_name'];
                        }
                    }
                }

                //准备更新数据
                $data['id'] = $this->_data['self']['id'];
                $data['email'] = $this->input->post('email');
                $data['realname'] = $this->input->post('realname');
                //更新数据
                if($this->m_member->modify($data))
                {
                    //上传成功则删除旧的头像图片
                    if(isset($data['avatar']) && $this->_data['self']['avatar'] != 'noavatar')
                    {
                        foreach($format as $key=>$value)
                        {
                            @unlink(AVATAR_PATH . $this->_data['self']['avatar'] . $key);
                        }
                    }
                    //成功提示
                    $this->load->view('common/message', array('message'=>"个人资料修改成功", 'url'=>site_url(CLASS_URI)));
                }
                else
                {
                    $this->load->view('common/message', array('message'=>"个人资料修改失败", 'url'=>site_url(CLASS_URI)));
                }
            }
            elseif($action == 'password')
            {
                //准备更新数据
                $data['id'] = $this->_data['self']['id'];
                $data['salt'] = $this->_data['self']['salt'];
                $data['old_password'] = $this->input->post('old_password');
                $data['password'] = $this->input->post('password1');
                //更新数据
                if($this->m_member->modify($data))
                {
                    //成功提示
                    $this->load->view('common/message', array('message'=>"密码修改成功", 'url'=>site_url(CLASS_URI)));
                }
                else
                {
                    $this->load->view('common/message', array('message'=>"密码修改失败", 'url'=>site_url(CLASS_URI)));
                }
            }
        }
    }

    //修改密码时验证老密码
    public function _check_password_modify($str)
    {
        $member = $this->m_member->where('id', $this->_data['self']['id'])->get()->row_array();
        
        //检查帐号是否存在
        if(empty($member))
        {
            $this->form_validation->set_message(__FUNCTION__, 'Account do not exist.');
            return FALSE;
        }
        //检查密码
        elseif(! $this->m_member->validate_password($str, $member))
        {
            $this->form_validation->set_message(__FUNCTION__, '%s错误.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
}

/* End of file Profile.php */
/* Location: ./application/controllers/member/Profile.php */
