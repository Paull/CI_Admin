<?php defined('BASEPATH') || exit('No direct script access allowed');

class M_member extends MY_Model {

    function __construct()
    {
        parent::__construct();
        $this->_table = 'member';
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

    //删除数据byPK
    function destroy($uid)
    {
        $this->db->where('id', $uid);
        $this->db->delete($this->_table);

        $deleted = $this->db->affected_rows();

        //如果删除会员成功，则同时删除该会员所有相关数据
        if($deleted > 0)
        {
            $children = array('log', 'email');
            //按条件批量删除多表
            $this->db->delete($children, array('uid'=>$uid));
        }

        //记录操作日志----------------------
        $log['uid'] = $this->session->userdata('uid');
        $log['method'] = 'referer';
        $log['operate'] = 'destroy member #'.$uid;
        $log['status'] = $deleted > 0;
        $this->m_log->create($log);
        //记录操作日志----------------------

        return $deleted;
    }

    //生成新行的默认赋值
    public function new_row()
    {
        return array(
                'username'=>'',
                'email'   =>'',
                'realname'=>'',
                'password'=>'',
                'areaid'  =>0,
                'identity'=>'user',
                'areaid'  =>0,
                'status'  =>'0.standby',
            );
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
    function modify($data, $ignore = FALSE)
    {
        if(isset($data['id']) && intval($data['id']) > 0)
        {
            $id = intval($data['id']);
            unset($data['id']);
            return $this->edit($id, $data, $ignore);
        }
        else
        {
            return $this->create($data, $ignore);
        }
    }
    
    //插入数据
    function create($data, $ignore = FALSE)
    {
        $data['salt']     = $this->_generate_salt();
        $data['password'] = $this->_hash_password($data['password'], $data['salt']);
        $data['reg_ip']   = $this->input->ip_address();
        $data['reg_time'] = $this->input->server('REQUEST_TIME');

        $this->db->insert($this->_table, $data);
        $insert_id = $this->db->insert_id();

        //记录操作日志----------------------
        $log['operate']    = 'create member';
        $log['status']     = $insert_id > 0;
        $log['debug_info'] = array('insert_id'=>$insert_id);
        $this->m_log->create($log);
        //记录操作日志----------------------

        return $insert_id;
    }
    
    //更新数据
    function edit($id, $data, $ignore = FALSE)
    {
        $this->db->where('id', $id);

        //非管理员帐号
        if(! $ignore && $this->session->userdata('identity') != 'superman')
        {
            //增加Email判断条件
            $this->db->where('email', $this->session->userdata('email'));
        }

        //修改密码需提供用户老密码和加密钥匙
        if(isset($data['salt']) && isset($data['password']) && isset($data['old_password']))
        {
            if($data['password'] != $data['old_password'])
            {
                unset($data['old_password']);
                $data['password'] = $this->_hash_password($data['password'], $data['salt']);
            }
            else
            {
                unset($data['old_password']);
                unset($data['password']);
                unset($data['salt']);
                if(empty($data))
                {
                    return FALSE;
                }
            }
        }
        //不允许把密码修改为空值，大多是误操作
        elseif(isset($data['password']) && empty($data['password']))
        {
            unset($data['password']);
        }

        $this->db->update($this->_table, $data);
        $affected_rows = $this->db->affected_rows();

        //记录操作日志----------------------
        $log['operate']    = 'edit member';
        $log['status']     = $affected_rows > 0;
        $log['debug_info'] = array('affected_rows'=>$affected_rows);
        $this->m_log->create($log);
        //记录操作日志----------------------

        return $affected_rows;
    }
    
    //生成session并更新登录数据
    public function auth_in($data)
    {
        $session = array(
            'uid' => $data['id'],
            'email' => $data['email'],
            'realname' => $data['realname'],
            'identity' => $data['identity'],
            'areaid' => $data['areaid'],
        );

        $this->session->set_userdata($session);

        //记录操作日志----------------------
        $log['uid']        = $data['id'];
        $log['operate']    = 'login';
        $log['status']     = TRUE;
        $log['debug_info'] = TRUE;
        $this->m_log->create($log);
        //记录操作日志----------------------

        $this->db->where('id', $data['id']);

        $update['login_ip'] = $this->input->ip_address();
        $update['login_time'] = $this->input->server('REQUEST_TIME');
        $update['login_count'] = $data['login_count'] + 1;

        return $this->db->update($this->_table, $update);
    }

    //注销用户登陆信息
    public function logout($uid=0)
    {
        $uid = intval($uid);
        
        $this->session->sess_destroy();

        //记录操作日志----------------------
        $log['uid']     = $uid;
        $log['method']  = 'referer';
        $log['operate'] = 'logout';
        $log['status']  = TRUE;
        $this->m_log->create($log);
        //记录操作日志----------------------
    }

    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    function validate_password($password, $row)
    {
        return $this->_hash_password($password, $row['salt']) === $row['password'];
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    protected function _hash_password($password, $salt)
    {
        return md5($salt.md5($password).$salt);
    }

    /**
     * Generates a salt that can be used to generate a password hash.
     * @return string the salt
     */
    protected function _generate_salt()
    {
        return substr(uniqid(rand()), -6);
    }

}

/* End of file M_member.php */
/* Location: ./application/models/M_member.php */
