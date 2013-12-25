<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $_data = array();
    protected $_layout = 'common/layout';

    function __construct()
    {
        parent::__construct();

        define('CLASS_URI', strtolower($this->router->directory.$this->router->class));
        define('METHOD_URI', strtolower($this->router->directory.$this->router->class.'/'.$this->router->method));
        define('REFERER_URI', str_replace(array('http://'.$_SERVER['SERVER_NAME'].BASEURL, URL_SUFFIX), array('',''), $this->input->server('HTTP_REFERER')));

        //ajax不启用layout基础模版布局
        if ( $this->input->is_ajax_request() )
        {
            $this->_layout = METHOD_URI;
        }

        //读取$self
        if ( $this->session->userdata('uid') )
        {
            $this->_data['self'] = $this->m_member->where('id', $this->session->userdata('uid'))->get()->row_array();
        }
        else
        {
            $this->_data['self'] = NULL;
        }

        if ( CLASS_URI != 'welcome' && !isset($this->_data['self']['identity']) )
        {
            redirect('login');
        }

        if( ! $this->_has_perm() )
        {
            if($this->input->is_ajax_request())
            {
                exit;
            }
            else
            {
                show_error('Server refuses to respond to request.', 403, 'Forbidden');
            }
        }

        //模板通用配置
        $this->_data['template']['title'] = '';
        $this->_data['template']['breadcrumbs'][] = array('uri'=>$this->router->directory.'dashboard', 'title'=>'控制面板', 'icon'=>'icon-home');
        $this->_data['template']['styles'] = array();
        $this->_data['template']['scripts'] = array();
        $this->_data['template']['stylesheet'] = '';
        $this->_data['template']['javascript'] = '';
        $this->_data['template']['js_onready'] = '';
        $this->_data['template']['content'] = METHOD_URI;

        //已登陆用户加载通用数据
        if ( isset($this->_data['self']['identity']) )
        {
            //加载城市数组
            $this->_data['area_hash'] = $this->m_area->get_hash();
            $this->_data['area_tree'] = $this->m_area->get_tree();
            $this->_data['area_group'] = $this->m_area->get_group();
            $this->_data['children'] = $this->m_member->get_children($this->_data['self']['id']);

            //加载菜单数组
            $this->_data['menus'] = $this->cache->get('menus');
            if($this->_data['menus'] === FALSE)
            {
                if (defined('ENVIRONMENT') AND file_exists(APPPATH.'config/'.ENVIRONMENT.'/menus.php'))
                {
                    $this->_data['menus'] = include(APPPATH.'config/'.ENVIRONMENT.'/menus.php');
                }
                elseif (file_exists(APPPATH.'config/menus.php'))
                {
                    $this->_data['menus'] = include(APPPATH.'config/menus.php');
                }
                $this->cache->save('menus', $this->_data['menus'], CACHE_TIMEOUT);
            }
            //分配身份相关的菜单数组
            $this->_data['menu'] = $this->_data['menus'][$this->_data['self']['identity']];

            //加载菜单模版
            $this->_data['template']['menus'] = $this->cache->get('template_menus');
            if($this->_data['template']['menus'] === FALSE)
            {
                $this->_data['template']['menus'] = load_menu($this->_data['menus']);
                $this->cache->save('template_menus', $this->_data['template']['menus'], CACHE_TIMEOUT);
            }
            //分配身份相关的菜单模版
            $this->_data['template']['menu'] = $this->_data['template']['menus'][$this->_data['self']['identity']];

            $this->_data['autohide'] = $this->input->cookie('autohide') == 'true' ? 'true' : 'false';
            $this->_data['theme'] = $this->input->cookie('theme') ? $this->input->cookie('theme') : 'blue';

            if( $this->router->method == 'index' )
            {
                $this->_data['template']['javascript'] = "var PATHINFO = '".site_url(CLASS_URI)."';\n";
            }
            else
            {
                $this->_data['template']['javascript'] = "var PATHINFO = '".site_url(METHOD_URI)."';\n";
            }
            $this->_data['template']['javascript'] .= "var AVATAR_URL = '" . AVATAR_URL . "';\nvar uid = '" . $this->_data['self']['id'] . "';\nvar hash = '" . $this->security->get_csrf_hash() . "';\nvar avatar = '" . $this->_data['self']['avatar'] . "';\n";
        }

    }

    protected function _has_perm()
    {
        if ( $this->router->directory == '')
        {
            return TRUE;
        }

        if ( !isset($this->_data['self']['identity']) )
        {
            return FALSE;
        }

        $directory = strtolower($this->router->directory);

        $directories = array(
            'admincp/' => array('superman'),
            'agency/'  => array('superman', 'agent'),
            'member/'  => array('superman', 'agent', 'user'),
            'api/'     => array('superman', 'agent', 'user'),
        );

        if ( !isset($directories[$directory]) )
        {
            return FALSE;
        }

        if ( in_array($this->_data['self']['identity'], $directories[$directory]) )
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }
    
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
