<?php defined('BASEPATH') || exit('No direct script access allowed');

class M_area extends MY_Model {

    function __construct()
    {
        parent::__construct();
        $this->_table = 'area';
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
        $deleted = $this->db->affected_rows();

        //记录操作日志----------------------
        $log['uid'] = $this->session->userdata('uid');
        $log['method'] = 'referer';
        $log['operate'] = 'delete area #'.$uid;
        $log['status'] = $deleted > 0;
        $this->m_log->create($log);
        //记录操作日志----------------------

        return $deleted;
    }

    //生成新行的默认赋值
    public function new_row()
    {
        return array(
                'parentid'=>0,
                'name'=>'',
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
        $this->db->insert($this->_table, $data);
        $insert_id = $this->db->insert_id();

        //记录操作日志----------------------
        $log['uid']        = $this->session->userdata('uid');
        $log['operate']    = 'create area';
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

        $this->db->update($this->_table, $data);
        $affected_rows = $this->db->affected_rows();

        //记录操作日志----------------------
        $log['uid']        = $this->session->userdata('uid');
        $log['operate']    = 'edit area';
        $log['status']     = $affected_rows > 0;
        $log['debug_info'] = array('affected_rows'=>$affected_rows);
        $this->m_log->create($log);
        //记录操作日志----------------------

        return $affected_rows;
    }
    
}

/* End of file M_area.php */
/* Location: ./application/models/M_area.php */
