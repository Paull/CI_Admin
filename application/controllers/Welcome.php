<?php defined('BASEPATH') || exit('No direct script access allowed');

class Welcome extends MY_Controller {

    function __construct()
    {
        parent::__construct();

        $this->_layout = 'welcome/layout';

        $this->load->model('m_email');
        $this->load->language('welcome');
        $this->load->library('user_agent');

        //如果有输入用户名，则保存到cookie中
        if($this->input->post('username'))
        {
            $cookie = array(
                'name' => 'username',
                'value' => $this->input->post('username'),
                'expire' => '86500'
            );
            $this->input->set_cookie($cookie);
        }

        $this->_data['username'] = $this->input->cookie('username');

        //不兼容的浏览器，低版本禁止访问
        if($this->agent->browser() == 'Internet Explorer' && in_array($this->agent->version(), array('6.0', '7.0', '8.0')))
        {
            show_error(lang('low_version_ie'), 403, 'Forbidden');
        }
        else
        {
            //不兼容的浏览器，非Chrome给于提示
            if($this->agent->browser() != 'Chrome')
            {
                $this->_data['template']['scripts'][] = STATIC_URL.'plugins/jquery.gritter/jquery.gritter.min.js';
                $this->_data['template']['javascript'] .= "
jQuery.gritter.add({
title: '".lang('imcompatible_browser_title')."',
text: '".lang('imcompatible_browser_text')."'
});
jQuery.gritter.add({
text: '".lang('browser_recommend_1_text')."',
image: '".lang('browser_recommend_1_image')."',
sticky: true,
class_name: 'gritter-light'
});
jQuery.gritter.add({
text: '".lang('browser_recommend_2_text')."',
image: '".lang('browser_recommend_2_image')."',
class_name: 'gritter-light'
});\n";
            }
        }
    }

    //默认首页
    public function index()
    {
        //修正不带www的网址
        if( substr_count($_SERVER['SERVER_NAME'], '.') == 1 )
        {
            redirect($_SERVER['REQUEST_SCHEME'].'://www.'.$_SERVER['SERVER_NAME']);
        }
        
        //自动跳转
        if($this->_data['self']['identity'])
        {
            $uris = array_keys($this->_data['menu']);
            redirect($uris[0]);
        }
        else
        {
            //跳转到登录界面
            redirect('login');
        }
    }
    
    //会员登录
    public function login()
    {
        $this->_data['template']['title'] = lang('sign_in');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="alert alert-error">', '</p>');
        $this->form_validation->set_rules('username', lang('username_or_email_label'), 'required|callback__check_username');
        $this->form_validation->set_rules('password', lang('password'), 'required|min_length[6]');

        //如果没有提交东西或验证失败，直接显示登录页面
        if ($this->form_validation->run() == FALSE)
        {
            $this->_data['template']['javascript'] .= "jQuery(\"input[value='']:eq(0)\").focus();";

            $this->load->view($this->_layout, $this->_data);
        }
        else
        {
            $member = $this->m_member->or_where('username', $this->input->post('username'))->or_where('email', $this->input->post('username'))->get()->row_array();

            if(!empty($member))
            {
                //登录成功，生成SESSION、COOKIE
                $this->m_member->auth_in($member);

                //跳转到会员面板
                redirect('index');
            }
        }
    }

    //会员注册
    public function signup()
    {
        $this->_data['template']['title'] = lang('sign_up');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="alert alert-error">', '</p>');
        $this->form_validation->set_rules('username',  'Username', 'required|min_length[3]|max_length[10]|is_unique[member.username]');
        $this->form_validation->set_rules('email',     'Email', 'required|valid_email|is_unique[member.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|min_length[6]|matches[password1]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->_data['template']['javascript'] .= "jQuery(\"input[value='']:eq(0)\").focus();";

            $this->load->view($this->_layout, $this->_data);
        }
        else
        {
            $data['username'] = $this->input->post('username');
            $data['email']    =  $this->input->post('email');
            $data['password'] = $this->input->post('password1');

            //插入数据库
            $this->_data['uid'] = $this->m_member->create($data);

            //发送验证邮件
            $email_needed = array('id'=>$this->_data['uid'], 'email'=>$data['email']);
            $this->m_email->send_verfy_mail($email_needed);

            // 发送邮件通知管理员
            // $this->m_email->send_notify_mail($data);

            $this->load->view($this->_layout, $this->_data);
        }
    }
    
    //找回密码
    public function iforget()
    {
        $this->_data['template']['title'] = lang('forget_password');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="alert alert-error">', '</p>');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__check_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->_data['template']['javascript'] .= "jQuery(\"input[value='']:eq(0)\").focus();";

            $this->load->view($this->_layout, $this->_data);
        }
        else
        {
            $this->_data['email'] = $this->input->post('email');
            $this->_data['member'] = $this->m_member->where(array('email'=>$this->_data['email']))->get()->row_array();

            //记录日志----------------------
            $log['uid'] = $this->_data['member']['id'];
            $log['operate'] = $this->_data['template']['title'];
            $log['status'] = 1;
            $log['debug_info'] = TRUE;
            $this->m_log->create($log);
            //记录日志----------------------

            //发送找回密码邮件
            $this->m_email->send_password_reset_mail($this->_data['member']);

            $this->load->view($this->_layout, $this->_data);
        }
    }
    
    public function logout()
    {
        $this->m_member->logout($this->session->userdata('uid'));
        $data = array(
                'message' => 'you\'ll be redirected to the login page',
                'url' => site_url('login'),
            );
        $this->load->view('common/message', $data);
    }

    //验证帐号
    public function verify()
    {
        $this->_data['template']['title'] = 'Account Email Verify';
        $uid = $this->uri->segment(2);
        $verify_code = $this->uri->segment(3);

        if(strlen($verify_code) != 25)
        {
            $this->load->view('common/message', array('message'=>"verify code invalid."));
            return;
        }

        $member = $this->m_member->select('id, email, login_count, status')->where('id', $uid)->get()->row_array();

        //记录日志----------------------
        $log['uid'] = isset($member['id']) ? $member['id'] : 0;
        $log['operate'] = $this->_data['template']['title'];
        $log['status'] = !empty($member) && $verify_code == substr(md5($member['email'].$member['login_count']), 3, 25);
        $log['debug_info'] = $member;
        $this->m_log->create($log);
        //记录日志----------------------

        if( !empty($member) && $verify_code == substr(md5($member['email'].$member['login_count']), 3, 25))
        {
            $data['id'] = $member['id'];
            if($member['status'] == '0.standby')
            {
                $data['status'] = '1.email_confirmed';
            }
            elseif($member['status'] == '2.admin_confirmed')
            {
                $data['status'] = '9.active';
            }
            elseif($member['status'] == '1.email_confirmed')
            {
                $this->load->view('common/message', array('message'=>"Your email address is already verified.", 'url'=>site_url('login')));
                return;
            }
            elseif($member['status'] == '9.active')
            {
                $this->load->view('common/message', array('message'=>"Your account is already actived.", 'url'=>site_url('login')));
                return;
            }

            if($this->m_member->modify($data, TRUE))
            {
                $this->load->view('common/message', array('message'=>"Verify successfully!\\nYou\'ll be redirected to the login page", 'url'=>site_url('login')));
                return;
            }
        }
        else
        {
            $this->load->view('common/message', array('message'=>"verify code invalid!"));
            return;
        }
    }

    //重置密码
    public function reset()
    {
        // $this->output->enable_profiler(TRUE);
        $this->_data['template']['title'] = 'Account Password Reset';
        $uid = $this->uri->segment(2);
        $verify_code = $this->uri->segment(3);

        if(strlen($verify_code) != 10)
        {
            $this->load->view('common/message', array('message'=>"reset link invalid."));
            return;
        }


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="alert alert-error">', '</p>');
        $this->form_validation->set_rules('password1', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|min_length[6]|matches[password1]');

        $member = $this->m_member->select('id, email, salt, password, login_count')->where('id', $uid)->get()->row_array();

        if( !empty($member) && $verify_code == substr(md5($member['password'] . $member['login_count']), 2, 10))
        {

            if ($this->form_validation->run() == FALSE)
            {
                $this->_data['template']['javascript'] = "jQuery(\"input[value='']:eq(0)\").focus();";

                $this->load->view($this->_layout, $this->_data);
            }
            else
            {
                $update['id'] = $member['id'];
                $update['salt'] = $member['salt'];
                $update['password'] = $this->input->post('password1', TRUE);
                $update['old_password'] = $member['password'];

                $this->_data['result'] = $this->m_member->modify($update, TRUE);

                //记录日志----------------------
                $log['uid'] = $member['id'];
                $log['operate'] = $this->_data['template']['title'];
                $log['status'] = $this->_data['result'];
                $log['debug_info'] = $member;
                $this->m_log->create($log);
                //记录日志----------------------

                //修改成功则发送提醒邮件
                if($this->_data['result'])
                {
                    $this->m_email->send_password_reset_notice($member);
                }

                $this->load->view($this->_layout, $this->_data);
            }

        }
        else
        {
            $this->load->view('common/message', array('message'=>"The reset link expired!"));
            return;
        }
    }

    //登录验证帐号及密码
    public function _check_username($str)
    {
        $member = $this->m_member->or_where('username', $str)->or_where('email', $str)->get()->row_array();
        
        //检查帐号是否存在
        if(empty($member))
        {
            $this->form_validation->set_message(__FUNCTION__, 'Account do not exist.');
            return FALSE;
        }
        //检查帐号是否禁用
        elseif($member['status'] != '9.active'){
            switch($member['status'])
            {
                case '0.standby':
                case '2.admin_confirmed':
                    $this->form_validation->set_message(__FUNCTION__, 'Email address unverified! Check your mailbox and click the active link first.');
                    break;
                case '1.email_confirmed':
                    $this->form_validation->set_message(__FUNCTION__, 'Your account is pending setup!');
                    break;
                case '-1.suspend':
                    $this->form_validation->set_message(__FUNCTION__, 'Your account is suspended!');
                    break;
            }
            return FALSE;
        }
        //检查密码
        elseif(! $this->m_member->validate_password($this->input->post('password'), $member))
        {
            $this->form_validation->set_message(__FUNCTION__, 'password error');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //找回密码验证邮箱
    public function _check_email($str)
    {
        $count = $this->m_member->where(array('email'=>$str))->get()->num_rows();
        
        //检查帐号是否存在
        if($count > 0)
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message(__FUNCTION__, 'Account do not exist.');
            return FALSE;
        }
    }
}

/* End of file Welcome.php */
/* Location: ./application/controllers/Welcome.php */
