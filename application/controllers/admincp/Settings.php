<?php defined('BASEPATH') || exit('No direct script access allowed');

class Settings extends MY_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    //区域数据列表
    public function area()
    {
        $this->_data['template']['title'] = '区域列表';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>$this->_data['template']['title']);

        $posts = $this->input->post();
        if ( !empty($posts) )
        {
            //更新旧数据
            $update = array();
            $updated = 0;
            foreach($posts['area'] as $key=>$value)
            {
                $update[] = array('id'=>$key, 'name'=>$value);
            }
            if ( !empty($update) )
            {
                $updated = $this->m_area->update_batch($update, 'id');
            }

            //创建新数据
            $create = array();
            $created = 0;
            if ( isset($posts['newarea']) )
            {
                foreach($posts['newarea'] as $key=>$value)
                {
                    foreach($value as $val)
                    {
                        $create[] = array('parentid'=>$key, 'name'=>$val);
                    }
                }
                if ( !empty($create) )
                {
                    $created = $this->m_area->insert_batch($create);
                }
            }

            //清除缓存
            $this->m_area->clear_cache();

            //显示提示
            $this->load->view('common/message', array('message'=>"更新{$updated}条，创建{$created}条", 'uri'=>METHOD_URI));
        }

        //读取数据
        $this->_data['list'] = $this->m_area->get_tree();
        
//        dump($this->_data['list'],null,10);exit;
        //加载模板
        $this->load->view($this->_layout, $this->_data);
    }

}

/* End of file Settings.php */
/* Location: ./application/controllers/admincp/Settings.php */
