<?php defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    //后台控制面板
	public function index()
	{
        $this->_data['template']['title'] = '控制面板';
        
        $this->load->view($this->_layout, $this->_data);
	}
    
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admincp/Dashboard.php */
