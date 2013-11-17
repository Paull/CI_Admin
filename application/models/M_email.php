<?php defined('BASEPATH') || exit('No direct script access allowed');

class M_email extends MY_Model {

    function __construct()
    {
        parent::__construct();
        $this->_table = 'email';
    }
    
    //查询数据
    function find($params=array())
    {
        if(is_array($params))
        {
            if(!empty($params))
            {
                $this->db->where($params);
            }
        }
        elseif(intval($params) == $params)
        {
            $this->db->where('id', $params);
        }
        return $this->db->get($this->_table);
    }

    //删除数据
    function delete($where = '', $limit = NULL, $reset_data = TRUE)
    {
        if(intval($where) == $where)
        {
            $this->db->where('id', $where);
            $where = '';
        }
        $this->db->delete($this->_table, $where, $limit, $reset_data);
        return $this->db->affected_rows();
    }

    function num_rows()
    {
        return $this->db->get($this->_table)->num_rows();
    }
    
    function get_page($page=0, $per_page=10)
    {
        $this->db->limit($per_page, $page);
        return $this->db->get($this->_table);
    }
    
    //插入或更新数据
    function modify($data)
    {
        if(isset($data['id']) && intval($data['id']) > 0)
        {
            $id = intval($data['id']);
            unset($data['id']);
            return $this->edit($id, $data);
        }
        else
        {
            return $this->create($data);
        }
    }
    
    //插入数据
    function create($data)
    {
        $data['created']     = $this->input->server('REQUEST_TIME');

        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    
    //更新数据
    function edit($id, $data)
    {
        $this->db->where('id', $id);

        $this->db->update($this->_table, $data);
        return $this->db->affected_rows();
    }
    
    //发送注册邮箱验证邮件
    public function send_verfy_mail($member, $immediately = TRUE)
    {
        //准备邮件内容
        $data['uid'] = $member['id'];
        $data['email'] = $member['email'];
        $data['url'] = 'http://'.$_SERVER['SERVER_NAME'].base_url('verify').'/'.$member['id'].'/'.substr(md5($member['email'] . '0'), 3, 25);
        $data['subject'] = 'Confirm Your Account';
        $data['message'] = $this->load->view('email/email_verify', $data, TRUE);

// echo $data['message'];exit;

        //准备发送邮件
        $this->load->library('email');
        $this->email->from('no-reply@'.SITEDOMAIN);
        $this->email->to($member['email']); 
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);

        //发送邮件
        if($immediately){
            $data['status'] = @$this->email->send(FALSE);
            $data['errcode'] = $this->email->print_debugger(array('headers'));
        }

        unset($data['url']);
        return $this->modify($data);
    }

    //发送密码重置邮件
    public function send_password_reset_mail($member, $immediately = TRUE)
    {
        //准备邮件内容
        $data['uid'] = $member['id'];
        $data['email'] = $member['email'];
        $data['url'] = 'http://'.$_SERVER['SERVER_NAME'].base_url('reset').'/'.$member['id'].'/'.substr(md5($member['password'] . $member['login_count']), 2, 10);
        $data['subject'] = 'Password Reset Request';
        $data['message'] = $this->load->view('email/password_reset', $data, TRUE);

// echo $data['message'];exit;

        //准备发送邮件
        $this->load->library('email');
        $this->email->from('no-reply@'.SITEDOMAIN);
        $this->email->to($member['email']); 
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);

        //发送邮件
        if($immediately){
            $data['status'] = @$this->email->send(FALSE);
            $data['errcode'] = $this->email->print_debugger(array('headers'));
        }

        unset($data['url']);
        return $this->modify($data);
    }

    //发送密码重置邮件
    public function send_password_reset_notice($member, $immediately = TRUE)
    {
        //准备邮件内容
        $data['uid'] = $member['id'];
        $data['email'] = $member['email'];
        $data['url'] = 'http://help.'.SITEDOMAIN;
        $data['subject'] = 'Your Password Has Been Changed';
        $data['message'] = $this->load->view('email/password_changed', $data, TRUE);

// echo $data['message'];exit;

        //准备发送邮件
        $this->load->library('email');
        $this->email->from('no-reply@'.SITEDOMAIN);
        $this->email->to($member['email']); 
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);

        //发送邮件
        if($immediately){
            $data['status'] = @$this->email->send(FALSE);
            $data['errcode'] = $this->email->print_debugger(array('headers'));
        }

        unset($data['url']);
        return $this->modify($data);
    }

}

/* End of file M_email.php */
/* Location: ./application/models/M_email.php */
