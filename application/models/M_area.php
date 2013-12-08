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
    function destroy($id)
    {
        $list = $this->get_children($id, TRUE);
        $list = Helper_Array::toHashmap($list, 'id', 'name');
        $this->db->where_in(array_keys($list));
        $this->db->delete($this->_table);
        $deleted = $this->db->affected_rows();

        //记录操作日志----------------------
        $log['uid'] = $this->session->userdata('uid');
        $log['method'] = 'referer';
        $log['operate'] = 'destroied area #'.$id;
        $log['status'] = $deleted > 0;
        $log['debug_info'] = array('list'=>$list);
        $this->m_log->create($log);
        //记录操作日志----------------------

        $this->clear_cache();

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

        $this->clear_cache();

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

        $this->clear_cache();

        return $affected_rows;
    }

    //清除缓存
    public function clear_cache()
    {
        $this->cache->delete('area_hash_'.$this->session->userdata('areaid'));
        $this->cache->delete('area_tree_'.$this->session->userdata('areaid'));
        $this->cache->delete('area_group_'.$this->session->userdata('areaid'));
        $this->cache->delete('area_dropdown_'.$this->session->userdata('areaid'));
        return TRUE;
    }

    //取得所有相关城市
    public function get_children($place_id, $self_included=TRUE)
    {
        if ( $self_included )
        {
            $list = $this->find($place_id)->result_array();
        }
        else
        {
            $list = array();
        }
        $result = $this->where('parentid', $place_id)->find()->result_array();
        $list = array_merge($list, $result);

        foreach($result as $row)
        {
            $result = $this->get_children($row['id'], FALSE);
            $list = array_merge($list, $result);
        }

        return $list;
    }

    //取得城市ID对应城市名
    public function get_hash()
    {
        $list = $this->cache->get('area_hash_'.$this->session->userdata('areaid'));
        if ( $list === FALSE )
        {
            $list = $this->get_children($this->session->userdata('areaid'));
            $list = Helper_Array::toHashmap($list, 'id', 'name');
            $this->cache->save('area_hash_'.$this->session->userdata('areaid'), $list, CACHE_TIMEOUT);
        }
        return $list;
    }
    
    //取得城市数组
    public function get_tree()
    {
        $list = $this->cache->get('area_tree_'.$this->session->userdata('areaid'));
        if ( $list === FALSE )
        {
            $list = $this->get_children($this->session->userdata('areaid'));
            $list = Helper_Array::toTree($list, 'id', 'parentid', 'children');
            $list = $this->_toHashmap($list, 'id', 'children');
            $this->cache->save('area_tree_'.$this->session->userdata('areaid'), $list, CACHE_TIMEOUT);
        }
        return $list;
    }

    //取得城市子孙数组
    public function get_group()
    {
        $list = $this->cache->get('area_group_'.$this->session->userdata('areaid'));
        if ( $list === FALSE )
        {
            $list = $this->get_children($this->session->userdata('areaid'));
            $list = Helper_array::groupBy($list, 'parentid');
            foreach($list as $key=>$value)
            {
                $value = Helper_array::toHashmap($value, 'id', 'name');
                $list[$key] = $value;
            }
            $this->cache->save('area_group_'.$this->session->userdata('areaid'), $list, CACHE_TIMEOUT);
        }
        return $list;
    }

    //取得下拉列表键值
    //param @string return_type || value should be dict / array
    public function get_dropdown($type='dict')
    {
        $list = $this->cache->get('area_dropdown_'.$this->session->userdata('areaid'));
        if ( $list === FALSE )
        {
            $list = $this->get_children($this->session->userdata('areaid'));
            $list = Helper_Array::toTree($list, 'id', 'parentid', 'children');
            $list = $this->_toDropdown($list, $type);
            $this->cache->save('area_dropdown_'.$this->session->userdata('areaid'), $list, CACHE_TIMEOUT);
        }   
        return $list;
    }

    private function _toDropdown($data, $type, $depth=0)
    {
        $tmp = array();
        $prefix = array('', ' ├ ', ' │ ├ ', ' │ │ ├ ', ' │ │ │ ├ ');
        $prefix_last = array('', ' └ ', ' │ └ ', ' │ │ └ ', ' │ │ │ └ ');
        $i = 1;
        $max = count($data);
        foreach($data as $value)
        {
            if ( $i == $max )
            {
                if($type == 'array')
                {
                    $tmp[] = array('value'=>$value['id'], 'text'=>$prefix_last[$depth].$value['name']);
                }
                else
                {
                    $tmp[$value['id']] = $prefix_last[$depth].$value['name'];
                }
            }
            else
            {
                if($type == 'array')
                {
                    $tmp[] = array('value'=>$value['id'], 'text'=>$prefix[$depth].$value['name']);
                }
                else
                {
                    $tmp[$value['id']] = $prefix[$depth].$value['name'];
                }
            }
            if ( !empty($value['children']) )
            {
                $ret = $this->_toDropdown($value['children'], $type, $depth+1);
                if($type == 'array')
                {
                    //don't need keep array key
                    $tmp = array_merge($tmp, $ret);
                }
                else
                {
                    //array key to be kept
                    //array + array
                    $tmp = $tmp + $ret;
                }
            }
            $i++;
        }
        return $tmp;
    }

    //递增ToHashmap
    private function _toHashmap($data, $key_field, $recursive_node='children')
    {
        $data = Helper_Array::toHashmap($data, $key_field);
        foreach($data as $key=>$value)
        {
            unset($data[$key]['id']);
            unset($data[$key]['parentid']);
            if ( !empty($value[$recursive_node]) )
            {
                $data[$key][$recursive_node] = $this->_toHashmap($value[$recursive_node], $key_field);
            }
        }
        return $data;
    }

}

/* End of file M_area.php */
/* Location: ./application/models/M_area.php */
