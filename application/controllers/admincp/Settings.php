<?php defined('BASEPATH') || exit('No direct script access allowed');

class Settings extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    //区域数据列表
    public function area($parentid=0)
    {
        $parentid = intval($parentid);

        $this->_data['template']['title'] = '区域列表';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>$this->_data['template']['title']);

        //读取数据
        $this->_data['list'] = $this->m_area->get_tree();
        
//        dump($this->_data['list'],null,10);exit;
        //加载模板
        $this->load->view($this->_layout, $this->_data);
    }

}

/* End of file Settings.php */
/* Location: ./application/controllers/admincp/Settings.php */
