<?php defined('BASEPATH') || exit('No direct script access allowed');

class Finance extends MY_Controller {

    function __construct()
    {
        parent::__construct();

        //加载本控制器常用模块
        //$this->load->model('m_finance');
        //m_finance已被加入autoload
    }

    //财务明细
    public function index($uid=0)
    {
        $uid = intval($uid);
        $this->load->library('pagination');

        $this->_data['template']['title'] = '财务明细';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>CLASS_URI, 'title'=>$this->_data['template']['title']);

        $this->_data['template']['styles'][] = BASEURL.'assets/plugins/jquery.footable/footable.core.css';
        $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/jquery.footable/footable.min.js';
        $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/jquery.footable/footable.filter.min.js';
        $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/jquery.footable/footable.sort.min.js';
        $this->_data['template']['scripts'][] = BASEURL.'assets/plugins/jquery.footable/footable.paginate.min.js';

        if( $uid > 0 )
        {
            $this->_data['uid'] = $uid;
            $this->_data['lists'] = $this->m_finance->find(array('id'=>$this->_data['uid']))->result_array();
        }
        else
        {
            $this->_data['lists'] = $this->m_finance->find()->result_array();
        }

        $this->_data['template']['javascript'] .= "
$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

$('#footable').footable();

$('.clear-filter').click(function (e) {
    e.preventDefault();
    $('table.demo').trigger('footable_clear_filter');
    $('.filter-status').val('');
});

$('.filter-status').change(function (e) {
    e.preventDefault();
    var filter = $(this).val();
    $('#filter').val($(this).text());
    $('table.demo').trigger('footable_filter', {filter: filter});
});
\n";
        
        //加载模板
        $this->load->view('common/layout', $this->_data);
    }
    
}

/* End of file Finance.php */
/* Location: ./application/controllers/admincp/Finance.php */