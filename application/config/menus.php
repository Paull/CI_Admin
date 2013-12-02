<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

return array(
    'superman' => array(
        'admincp/dashboard' => array(
            'title'    => '控制面板',
            'icon'     => 'home.png',
        ),
        'collapse-members'  => array(
            'title'    => '权限管理',
            'icon'     => 'customers.png',
            'children' => array(
                'admincp/member' => array(
                    'title'=> '会员列表',
                ),
                'admincp/member/modify' => array(
                    'title'=> '添加会员',
                ),
            ),
        ),
        'collapse-settings'  => array(
            'title'    => '系统设置',
            'icon'     => 'settings.png',
            'children' => array(
                'admincp/settings/area' => array(
                    'title'=> '区域设置',
                ),
            ),
        ),
    ),
    'agent' => array(
        'agency/dashboard'  => array(
            'title'    => '控制面板',
            'icon'     => 'home.png',
        ),
    ),
    'user' => array(
        'member/dashboard'  => array(
            'title'    => '控制面板',
            'icon'     => 'home.png',
        ),
    ),
);

/* End of file menus.php */
/* Location: ./application/config/menus.php */
