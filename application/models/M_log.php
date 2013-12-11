<?php defined('BASEPATH') || exit('No direct script access allowed');

class M_log extends MY_Model {

    function __construct()
    {
        parent::__construct();
        $this->_table = 'log';
    }
    
    //插入数据
    //插入事件由自已操作产生则不需指定UID，操作他人或互动操作均需指定UID
    function create($data)
    {
        $data['created'] = $this->input->server('REQUEST_TIME');

        if ( !isset($data['uid']) )
        {
            $data['uid'] = $this->session->userdata('uid');
        }

        if ( !isset($data['method']) )
        {
            $data['method'] = $this->uri->uri_string;
        }
        elseif ( $data['method'] == 'referer' )
        {
            $data['method'] = str_replace(array('http://'.$_SERVER['SERVER_NAME'].BASEURL, URL_SUFFIX), array('',''), $this->input->server('HTTP_REFERER'));
        }

        if ( !isset($data['status']) )
        {
            $data['status'] = TRUE;
        }

        if ( !isset($data['ip_address']) )
        {
            $data['ip_address'] = $this->input->ip_address();
        }

        if ( isset($data['debug_info']) && $data['debug_info'] )
        {
            if( $data['debug_info'] === TRUE )
            {
                $data['debug_info'] = json_encode(array('post'=>$this->input->post(), 'session'=>$this->session->all_userdata()));
            }
            else
            {
                $data['debug_info'] = json_encode(array('post'=>$this->input->post(), 'session'=>$this->session->all_userdata(), 'data'=>$data['debug_info']));
            }
        }

        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

}

/* End of file M_log.php */
/* Location: ./application/models/M_log.php */
