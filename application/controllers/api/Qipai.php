<?php defined('BASEPATH') || exit('No direct script access allowed');

class Qipai extends CI_Controller {
    
    public function check()
    {
        $action = $this->input->post('action', TRUE);
        switch($action)
        {
            case 'checkversion':
                $this->$action();
                break;
            case 'userlogin':
                $this->$action();
                break;
            case 'loadfile':
                $this->$action();
                break;
            case 'release':
                $this->$action();
                break;
            default:
                exit('la dao ba.');
        }
        echo 'asdfa';
//        print_r($this->input->post());
//        $systeminfotxt = substr($this->input->post('systeminfotxt', TRUE), 2);
//        $systeminfo = pack("H*", $systeminfotxt);
//        echo $systeminfo;
    }
    
    public function release()
    {
        $softid = $this->input->post('softid', TRUE);
        $username = $this->input->post('username', TRUE);
        $mcode = $this->input->post('mcode', TRUE);
        
        $stringran = $this->input->post('stringran');
//        echo '$stringran = ', $stringran, "\r\n";
        $stringcheck = $this->input->post('stringcheck');
//        echo '$stringcheck = ', $stringcheck, "\r\n";
        $string_join = $mcode . $softid . $stringran;
//        echo '$string_join = ', $string_join, "\r\n";
        $string_sign = '0x' . strtoupper(md5($string_join));
//        echo '$string_sign = ', $string_sign, "\r\n";
        $string_check = '0x' . strtoupper(md5(strrev($string_join . $string_sign . $username)));
//        echo '$string_join . $string_sign . $username = ', $string_join . $string_sign . $username, "\r\n";
//        echo 'strrev($string_join . $string_sign . $username) = ', strrev($string_join . $string_sign . $username), "\r\n";
//        echo '$string_check = ', $string_check, "\r\n";
        
        if($stringcheck != $string_check)
        {
            return;
        }
        
        $mcode = strtolower(substr($mcode, 2));
        $this->_setCookie('nowopr', 'release');
        $this->_setCookie('stringss', '0x' . strtoupper(md5(date("DdMYis", $this->input->server('REQUEST_TIME') - 28800))));
        
        $this->load->model('user');
        $user = $this->user->get_one($username);
        if($user)
        {
            //黑名单, 非绑机, 已过期
            if($user['baned'] == 'yes')
            {
                $result = '0x' . strtoupper(md5('release_baned'));      //62e3f1d9e20740ba2bd946ce57f2b4dc
            }
            elseif($user['mcode'] == '')
            {
                $result = '0x' . strtoupper(md5('release_nobind'));     //0a31f8eee9dd52db25d900c47a579df2
            }
            elseif($user['mcode'] != $mcode)
            {
                $result = '0x' . strtoupper(md5('release_failed'));     //546dd2dad9f5d171b2fd08bc27a1b777
            }
            elseif( $user['created'] + $user['expire'] < $this->input->server('REQUEST_TIME') )
            {
                $result = '0x' . strtoupper(md5('release_expired'));    //3b3ccedd40f192bb6011b9c3bad29764
            }
            else
            {
                $boolean = $this->user->release($username);
                if($boolean) $result = '0x' . strtoupper(md5('release_ok'));    //093e3177a007de5b7311f79010f592ea
                else $result = md5('error');
            }
        }
        else
        {
            $result = md5('error');  //e1976149f037ac5b0a25c2ded5a2e1fe
        }
        $this->_setCookie('result', $result);
    }
    
    public function userlogin()
    {
        //Local $_STRING_RAN = Random(0, Random(0, 10000, 1), 1)
        $softid = $this->input->post('softid', TRUE);
        $stringran = $this->input->post('stringran');
        $username = $this->input->post('username', TRUE);
        $mcode = $this->input->post('mcode', TRUE);
        $stringcheck = $this->input->post('stringcheck');
        $systeminfotxt = substr($this->input->post('systeminfotxt'), 2);
        //$_STRING_JOIN = $_MCODE & $_SOFTID & $_STRING_RAN
        $string_join = $mcode . $softid . $stringran;
        //$_STRINGSIGN = _MD5($_STRING_JOIN)
        $string_sign = '0x' . strtoupper(md5($string_join));
        //stringcheck="& _MD5(_StringReverse($_STRING_JOIN & $_STRINGSIGN & $_USERNAME))
        //stringcheck=a"& _MD5(_StringReverse($_STRING_JOIN & $_STRINGSIGN & $_USERNAME))
        $string_check = '0x' . strtoupper(md5(strrev($string_join . $string_sign . $username)));
        
        if($stringcheck != $string_check)
        {
            return;
        }
        
        $this->_setCookie('nowopr', 'userlogin');
        $this->_setCookie('stringss', '0x' . strtoupper(md5(date("DdMYis", $this->input->server('REQUEST_TIME') - 28800))));
        $this->_setCookie('msgtimec', '0x' . strtoupper(md5($this->input->post('softid'))));
        
        $mcode = strtolower(substr($mcode, 2));
        
        //一系列判断和验证动作
        $this->load->model('m_card');
        $card = $this->m_card->get_one($username);
        
        if(empty($card))
        {
            $result = 'usernotexist';
            $this->_setCookie('result', md5($result));
            return;
        }
        
        //取得$user
        $this->load->model('user');
        
        if($card['used'] == 'no')
        {
            //注册到user表
            $data = array(
                'softid' => $card['softid'],
                'cardnum' => $card['cardnum'],
                'expire' => $card['seconds'],
                'mcode' => $mcode,
                'hardware' => $this->_bin2hex($systeminfotxt),
                'agentid' => $card['agentid'],
                'created' => $this->input->server('REQUEST_TIME'),
                'createip' => $this->input->ip_address(),
                'config' => $card['config']
            );
            
            $user = $this->user->create_user($data);
            
            if(empty($user))
            {
                $result = 'suspended';
//                $this->_setCookie('result', $result);
                $this->_setCookie('result', md5($result));
                return;
            }
            else
            {
                //卡号改成已使用
                $this->m_card->set_used($card['cardnum']);
            }
        }
        else
        {
            $user = $this->user->get_one($card['cardnum']);
            if(empty($user))
            {
                $result = 'suspended';
//                $this->_setCookie('result', $result);
                $this->_setCookie('result', md5($result));
                return;
            }
        }
        
        if($user['mcode'])
        {
          if($user['mcode'] != $mcode)
          {
              $result = 'mcodeerror';
              $this->_setCookie('result', md5($result));
              return;
          }
        }
        else
        {
          $this->user->rebind($user['cardnum'], $mcode, $this->_bin2hex($systeminfotxt));
        }
        
        if($user['baned'] == 'yes')
        {
            $result = 'userdisable';
            $this->_setCookie('result', md5($result));
            return;
        }
        if($user['softid'] != $softid)
        {
            $result = 'diffsoft';
            $this->_setCookie('result', md5($result));
            return;
        }
        if($this->input->server('REQUEST_TIME') - $user['created'] > $user['expire'])
        {
            $result = 'timeover';
            $this->_setCookie('result', md5($result));
            return;
        }
        else
        {
            $result = 'loginok';
            $this->_setCookie('result', md5($result));
            
            $this->user->login($user['cardnum']);
            
            $timeremain = ($user['expire'] + $user['created'] - $this->input->server('REQUEST_TIME')) * 2;
            $this->_setCookie('timeremain', $timeremain);
            
            $this->_setCookie('stringsign', '0x' . strtoupper(md5(strrev(md5($result) . $timeremain/2))));
            //Set-Cookie: runcode
        }
    }
    
    public function checkversion()
    {
        $soft_version = $this->config->item('soft_version');
        $client_version = $this->input->post('v', TRUE);
        $softid = $this->input->post('softid');
        $current_version = $soft_version[$softid];
        
        $this->_setCookie('nowopr', 'checkversion');
        $this->_setCookie('stringss', '0x' . strtoupper(md5(date("DdMYis", $this->input->server('REQUEST_TIME') - 28800))));
        $msg = "当前服务器端版本v{$current_version}";
        $this->_setCookie('msg', '0x' . strtoupper(array_pop(unpack("H*", $msg))));
        
        if($client_version == $current_version)
        {
            $this->_setCookie('result', '0x' . strtoupper(md5('notneedupdate')));
        }
        else
        {
            $file_path = 'update/' . $current_version . '.exe';
            $update_file_url = 'http://wuzisoft.com/' . $file_path;
            $this->_setCookie('result', '0x' . strtoupper(md5('needupdate')));
            $this->_setCookie('url', urlencode($update_file_url));
            $this->_setCookie('hash', '0x' .strtoupper(md5_file($file_path)));
            
            echo $update_file_url;
            exit;
        }
    }
    
    public function create_card()
    {
        $this->load->model('m_card');
        $count = $this->input->get("num", TRUE);
        if(!$count) $count =1;
        
        for($i=0;$i<$count;$i++)
        {
            $data = array();
            $data['softid'] = '89ppc';
            $data['cardnum'] = "TEST" . date("mdH") . rand(100000,999999);
            $data['seconds'] = 10800;
            $data['used'] = 0;
            $data['agentid'] = 1;
            $data['agentname'] = 'Paull';
            $data['creator'] = 'Paull';
            $data['created'] = $this->input->server('REQUEST_TIME');
            
            print_r($data);
            $newdata = $this->m_card->create_card($data);
            print_r($newdata);
        }
    }
    
    public function loadfile()
    {
        $softid = $this->input->post('softid', TRUE);
        $stringran = $this->input->post('stringran');
        $username = $this->input->post('username', TRUE);
        
        $mcode = $this->input->post('mcode', TRUE);
        $stringcheck = $this->input->post('stringcheck');
        $string_join = $mcode . $softid . $stringran;
        $string_sign = '0x' . strtoupper(md5($string_join));
        $string_check = '0x' . strtoupper(md5(strrev($string_join . $string_sign)));
        
        if($stringcheck != $string_check)
        {
            return;
        }
        
        $mcode = strtolower(substr($mcode, 2));
        
        $this->load->model('user');
        $user = $this->user->get_one($username);
        
        if(empty($user))
        {
            return;
        }
        
        if($user['mcode'] != $mcode)
        {
            return;
        }
        if($user['softid'] != $softid)
        {
            return;
        }
        
        $this->_setCookie('nowopr', 'loadfile');
        $this->_setCookie('stringss', '0x' . strtoupper(md5(date("DdMYis", $this->input->server('REQUEST_TIME') - 28800))));
        
        $this->load->model('configure');
        $config = $this->configure->get_by_id($user['config']);
        
        $content = $this->_hex2bin($config->fullconfig);
        echo '0x' . strtoupper($content);
        exit;
    }
    
    private function _setCookie($key, $value, $domain=NULL, $path=NULL, $expires=NULL)
    {
        Header("Set-Cookie: {$key}={$value}", FALSE);
        
//        $cookie['name'] = $key;
//        $cookie['value'] = $value;
//        if($domain != NULL) $cookie['domain'] = $domain;
//        if($path != NULL) $cookie['path'] = $path;
//        if($expires != NULL) $cookie['expires'] = gmstrftime("%A, %d-%b-%Y %H:%M:%S GMT",$this->input->server('REQUEST_TIME')+$expires);
//        $this->input->set_cookie($cookie);
    }
    
    private function _bin2hex($str)
    {
        return pack("H*", $str);
    }
    
    private function _hex2bin($str)
    {
        return array_pop(unpack("H*", $str));
    }
}

/* End of file Qipai.php */
/* Location: ./application/controllers/api/Qipai.php */