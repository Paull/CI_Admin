<?php defined('BASEPATH') || exit('No direct script access allowed');

class Email extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->_model = 'm_email';
        $this->load->model($this->_model);
    }
    
	public function compose()
	{
        $this->_data['template']['title'] = '撰写邮件';
        
        $this->load->view($this->_layout, $this->_data);
	}
    
	public function inbox()
	{
        $this->_data['template']['title'] = '收件箱';
        
        $this->load->view($this->_layout, $this->_data);
	}
    
	public function sent()
	{
        $this->_data['template']['title'] = '已发件箱';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>$this->_data['template']['title']);
        $this->_data['template']['styles'][] = STATIC_URL.'styles/email-inbox.css';

        $this->_data['list'] = $this->{$this->_model}->get()->result_array();
        
        $this->load->view($this->_layout, $this->_data);
	}
    
	public function attachments()
	{
        $this->_data['template']['title'] = '附件管理';
        
        $this->load->view($this->_layout, $this->_data);
	}
    
}

/* End of file Email.php */
/* Location: ./application/controllers/admincp/Email.php */
