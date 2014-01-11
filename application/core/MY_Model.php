<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected $_table;

    function __construct()
    {
        parent::__construct();
    }

    // --------------------------------------------------------------------

    /**
     * From
     *
     * Generates the FROM portion of the query
     *
     * @param   mixed   $from   can be a string or array
     * @return  CI_DB_query_builder
     */
    public function from($from)
    {
        $this->db->from($from);
        return $this;
    }

    function select($select = '*', $escape = NULL)
    {
        $this->db->select($select, $escape);
        return $this;
    }
    function select_max($select = '', $alias = '')
    {
        $this->db->select_max($select, $alias);
        return $this;
    }
    function select_min($select = '', $alias = '')
    {
        $this->db->select_min($select, $alias);
        return $this;
    }
    function select_avg($select = '', $alias = '')
    {
        $this->db->select_avg($select, $alias);
        return $this;
    }
    function select_sum($select = '', $alias = '')
    {
        $this->db->select_sum($select, $alias);
        return $this;
    }

    function limit($value, $offset = '')
    {
        $this->db->limit($value, $offset);
        return $this;
    }

    function order_by($column, $type='')
    {
        if($type) $this->db->order_by($column, $type);
        else $this->db->order_by($column);
        return $this;
    }

    function like($field, $match = '', $side = 'both')
    {
        $this->db->like($field, $match, $side);
        return $this;
    }
    function not_like($field, $match = '', $side = 'both')
    {
        $this->db->not_like($field, $match, $side);
        return $this;
    }
    function or_like($field, $match = '', $side = 'both')
    {
        $this->db->or_like($field, $match, $side);
        return $this;
    }
    function or_not_like($field, $match = '', $side = 'both')
    {
        $this->db->or_not_like($field, $match, $side);
        return $this;
    }
    
    function where($key, $value = NULL, $escape = TRUE)
    {
        $this->db->where($key, $value, $escape);
        return $this;
    }
    function or_where($key, $value = NULL, $escape = TRUE)
    {
        $this->db->or_where($key, $value, $escape);
        return $this;
    }
    function where_in($key = NULL, $values = NULL)
    {
        $this->db->where_in($key, $values);
        return $this;
    }
    function or_where_in($key = NULL, $values = NULL)
    {
        $this->db->or_where_in($key, $values);
        return $this;
    }
    function where_not_in($key = NULL, $values = NULL)
    {
        $this->db->where_not_in($key, $values);
        return $this;
    }
    function or_where_not_in($key = NULL, $values = NULL)
    {
        $this->db->or_where_not_in($key, $values);
        return $this;
    }

    function join($table, $cond, $type = '')
    {
        $this->db->join($table, $cond, $type);
        return $this;
    }

    public function set($key, $value = '', $escape = NULL)
    {
        $this->db->set($key, $value, $escape);
        return $this;
    }

    // --------------------------------------------------------------------

    /**
     * Get
     *
     * Compiles the select statement based on the other functions called
     * and runs the query
     *
     * @param   string  the limit clause
     * @param   string  the offset clause
     * @return  object
     */
    public function get($limit = NULL, $offset = NULL)
    {
        return $this->db->get($this->_table, $limit, $offset);
    }

    // --------------------------------------------------------------------

    /**
     * Get_Where
     *
     * Allows the where clause, limit and offset to be added directly
     *
     * @param   string  $where
     * @param   int $limit
     * @param   int $offset
     * @return  object
     */
    public function get_where($where = NULL, $limit = NULL, $offset = NULL)
    {
        return $this->db->get_where($this->_table, $where, $limit, $offset);
    }

    // --------------------------------------------------------------------

    /**
     * Insert
     *
     * Compiles an insert string and runs the query
     *
     * @param   array   an associative array of insert values
     * @param   bool    $escape Whether to escape values and identifiers
     * @return  object
     */
    public function insert($set = NULL, $escape = NULL)
    {
        $this->db->insert($this->_table, $set, $escape);
        $insert_id = $this->db->insert_id();

        //记录操作日志----------------------
        //$log['operate']    = "insert {$this->_table}";
        //$log['status']     = $insert_id > 0;
        //$log['debug_info'] = array('insert_id'=>$insert_id);
        //$this->m_log->create($log);
        //记录操作日志----------------------

        return $insert_id;
    }

    // --------------------------------------------------------------------

    /**
     * Insert_Batch
     *
     * Compiles batch insert strings and runs the queries
     *
     * @param   array   $set    An associative array of insert values
     * @param   bool    $escape Whether to escape values and identifiers
     * @return  int Number of rows inserted or FALSE on failure
     */
    public function insert_batch($set = NULL, $escape = NULL)
    {
        return $this->db->insert_batch($this->_table, $set, $escape);
    }

    // --------------------------------------------------------------------

    /**
     * UPDATE
     *
     * Compiles an update string and runs the query.
     *
     * @param   array   $set    An associative array of update values
     * @param   mixed   $where
     * @param   int $limit
     * @return  object
     */
    public function update($set = NULL, $where = NULL, $limit = NULL)
    {
        $this->db->update($this->_table, $set, $where, $limit);
        $affected_rows = $this->db->affected_rows();

        //记录操作日志----------------------
        //$log['operate']    = "update {$this->_table}";
        //$log['status']     = $affected_rows > 0;
        //$log['debug_info'] = array('affected_rows'=>$affected_rows);
        //$this->m_log->create($log);
        //记录操作日志----------------------

        return $affected_rows;
    }

    // --------------------------------------------------------------------

    /**
     * Update_Batch
     *
     * Compiles an update string and runs the query
     *
     * @param   array   an associative array of update values
     * @param   string  the where key
     * @return  int number of rows affected or FALSE on failure
     */
    public function update_batch($set = NULL, $index = NULL)
    {
        return $this->db->update_batch($this->_table, $set, $index);
    }

    // --------------------------------------------------------------------

    /**
     * Replace
     *
     * Compiles an replace into string and runs the query
     *
     * @param   string  the table to replace data into
     * @param   array   an associative array of insert values
     * @return  object
     */
    public function replace($set = NULL)
    {
        $this->db->replace($this->_table, $set);
        $affected_rows = $this->db->affected_rows();

        //记录操作日志----------------------
        //$log['operate']    = "replace {$this->_table}";
        //$log['status']     = $affected_rows > 0;
        //$log['debug_info'] = array('affected_rows'=>$affected_rows);
        //$this->m_log->create($log);
        //记录操作日志----------------------

        return $affected_rows;
    }

	// --------------------------------------------------------------------

	/**
	 * Delete
	 *
	 * Compiles a delete string and runs the query
	 *
	 * @param	mixed	the where clause
	 * @param	mixed	the limit clause
	 * @param	bool
	 * @return	mixed
	 */
	public function delete($where = '', $limit = NULL, $reset_data = TRUE)
	{
        $this->db->delete($this->_table, $where, $limit, $reset_data);
        $deleted = $this->db->affected_rows();

        //记录操作日志----------------------
        $log['method']  = 'referer';
        $log['operate'] = "delete from {$this->_table}";
        $log['status']  = $deleted > 0;
        $log['debug_info'] = array('where'=>$where, 'limit'=>$limit, $reset_data=>$reset_data);
        $this->m_log->create($log);
        //记录操作日志----------------------

        return $deleted;
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
