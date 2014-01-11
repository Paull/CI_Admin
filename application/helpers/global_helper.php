<?php defined('BASEPATH') || exit('No direct script access allowed');

//相关language必须提前加载
function load_options($field, $identity='')
{
    $data = array();
    switch($field)
    {
        case 'member_identity':
            switch($identity)
            {
                case 'superman':
                    $data = array(
                        array('value'=>'user', 'text'=>lang('user')),
                        array('value'=>'agent', 'text'=>lang('agent')),
                        array('value'=>'superman', 'text'=>lang('superman')),
                    );
                    break;
                case 'agent':
                    $data = array(
                        array('value'=>'user', 'text'=>lang('user')),
                        array('value'=>'agent', 'text'=>lang('agent')),
                    );
                    break;
                default:
                    $data = array(
                        array('value'=>'user', 'text'=>lang('user')),
                    );
                    break;
            }
            break;
        case 'member_status':
            $data = array(
                array('value'=>'-1.suspend', 'text'=>lang('-1.suspend')),
                array('value'=>'0.standby', 'text'=>lang('0.standby')),
                array('value'=>'1.email_confirmed', 'text'=>lang('1.email_confirmed')),
                array('value'=>'2.admin_confirmed', 'text'=>lang('2.admin_confirmed')),
                array('value'=>'9.active', 'text'=>lang('9.active')),
            );
            break;
        default:
            $data = array('value'=>'', 'text'=>'无选项');
    }
    return $data;
}

function cutstr($string, $length, $dot = '...') {
	if(strlen($string) <= $length) {
		return $string;
	}

	$pre = chr(1);
	$end = chr(1);
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), $string);

	$strcut = '';
	
  $n = $tn = $noc = 0;
  while($n < strlen($string)) {

    $t = ord($string[$n]);
    if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
      $tn = 1; $n++; $noc++;
    } elseif(194 <= $t && $t <= 223) {
      $tn = 2; $n += 2; $noc += 2;
    } elseif(224 <= $t && $t <= 239) {
      $tn = 3; $n += 3; $noc += 2;
    } elseif(240 <= $t && $t <= 247) {
      $tn = 4; $n += 4; $noc += 2;
    } elseif(248 <= $t && $t <= 251) {
      $tn = 5; $n += 5; $noc += 2;
    } elseif($t == 252 || $t == 253) {
      $tn = 6; $n += 6; $noc += 2;
    } else {
      $n++;
    }

    if($noc >= $length) {
      break;
    }

  }
  if($noc > $length) {
    $n -= $tn;
  }

  $strcut = substr($string, 0, $n);

	$strcut = str_replace(array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);

	$pos = strrpos($strcut, chr(1));
	if($pos !== false) {
		$strcut = substr($strcut,0,$pos);
	}
	return $strcut.$dot;
}

//生成菜单
function load_menu($menus)
{
    $menu_array = array();
    foreach( $menus as $group=>$group_menu )
    {
        $menu_array[$group] = "<section class=\"menu\"><div class=\"accordion\" id=\"accordion\">";
        foreach($group_menu as $uri=>$menu)
        {
            $menu_array[$group] .= "<div class=\"accordion-group\"><div class=\"accordion-heading\">";
            if ( isset($menu['children']) )
            {
                $menu_array[$group] .= "<a class=\"accordion-toggle\" href=\"javascript:void(0);\" data-toggle=\"collapse\" data-target=\"#{$uri}\">";
            }
            else
            {
                $menu_array[$group] .= "<a class=\"accordion-toggle\" href=\"".site_url($uri)."\">";
            }
            if ( isset($menu['icon']) )
            {
                $menu_array[$group] .= "<img src=\"".STATIC_URL."images/icons/stuttgart-icon-pack/32x32/{$menu['icon']}\" alt=\"{$menu['title']}\">";
            }
            $menu_array[$group] .= "<span>{$menu['title']}</span>";
            if ( isset($menu['badge']) )
            {
                $menu_array[$group] .= "<span class=\"badge\">{$menu['badge']}</span>";
            }
            if ( isset($menu['children']) )
            {
                $menu_array[$group] .= "<span class=\"arrow\"></span>";
            }
            $menu_array[$group] .= "</a></div>";
            if ( isset($menu['children']) )
            {
                $menu_array[$group] .= load_sub_menu($menu['children'], $uri);
            }
            $menu_array[$group] .= "</div>";
        }
        $menu_array[$group] .= "</div></section>";
    }

    return $menu_array;
}

//加载子菜单
function load_sub_menu($menus, $menu_id)
{
    $tmpstr = "<ul id=\"{$menu_id}\" class=\"accordion-body nav nav-list collapse\">";
    foreach($menus as $uri=>$menu){
        if (isset($menu['children'])){
            $tmpstr .= "<li><a href=\"javascript:void(0);\" data-toggle=\"sub-menu-collapse\" data-target=\"#{$uri}\"><span>{$menu['title']}</span><span class=\"arrow\"></span></a></li>";
            $tmpstr .= load_sub_menu($menu['children'], $uri);
        }
        else $tmpstr .= "<li><a href=\"".site_url($uri)."\">{$menu['title']}</a></li>";
    }
    $tmpstr .= "</ul>";
    return $tmpstr;
}

function time_past($time, $now = NULL) {
    if($time == 0){
        $str = '无';
    }else{
        if($now == NULL) $now = time();
        $fee=$now - $time;
        switch($fee)
        {
            case 0:
                $str = '刚刚';
                break;
            case $fee > 31536000:
                $str = floor($fee/31536000) . '年前';
                break;
            case $fee > 2592000:
                $str = floor($fee/2592000) . '月前';
                break;
            case $fee > 86400:
                $str = floor($fee/86400) . '天前';
                break;
            case $fee > 3600:
                $str = floor($fee/3600) . '小时前';
                break;
            case $fee > 60:
                $str = floor($fee/60) . '分前';
                break;
            default:
                $str = $fee . '秒前';
        }
    }
    return $str;
}

function time_left($time, $now = NULL){
    if($now == NULL) $now = time();
    $fee = $time - $now;
    switch($fee)
    {
        case $fee > 31536000:
            $str = floor($fee/31536000) . '年';
            break;
        case $fee > 2592000:
            $str = floor($fee/2592000) . '月';
            break;
        case $fee > 86400:
            $str = floor($fee/86400) . '天';
            break;
        case $fee > 3600:
            $str = floor($fee/3600) . '小时';
            break;
        case $fee > 60:
            $str = floor($fee/60) . '分';
            break;
        default:
            $str = $fee . '秒';
    }
    return $str;
}

function time_diff($time1, $time2 = NULL){
    if($time2 == NULL) $time2 = time();
    if($time1 == $time2) $str = '0秒';
    elseif($time1 > $time2) $str = time_left($time1, $time2);
    elseif($time1 < $time2) $str = time_past($time1, $time2);
    else $str = '未知时间';
    return $str;
}

//IP反查地址
function convertip($ip) {
  $ip1num = 0;
  $ip2num = 0;
  $ipAddr1 ="";
  $ipAddr2 ="";
  $dat_path = BASEPATH . 'qqwry.dat';
  if(!preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/", $ip)) {
    return 'IP Address Error';
  }
  if(!$fd = @fopen($dat_path, 'rb')){
    return 'IP date file not exists or access denied';
  }
  $ip = explode('.', $ip);
  $ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];
  $DataBegin = fread($fd, 4);
  $DataEnd = fread($fd, 4);
  $ipbegin = implode('', unpack('L', $DataBegin));
  if($ipbegin < 0) $ipbegin += pow(2, 32);
    $ipend = implode('', unpack('L', $DataEnd));
  if($ipend < 0) $ipend += pow(2, 32);
    $ipAllNum = ($ipend - $ipbegin) / 7 + 1;
  $BeginNum = 0;
  $EndNum = $ipAllNum;
  while($ip1num>$ipNum || $ip2num<$ipNum) {
    $Middle= intval(($EndNum + $BeginNum) / 2);
    fseek($fd, $ipbegin + 7 * $Middle);
    $ipData1 = fread($fd, 4);
    if(strlen($ipData1) < 4) {
      fclose($fd);
      return 'System Error';
    }
    $ip1num = implode('', unpack('L', $ipData1));
    if($ip1num < 0) $ip1num += pow(2, 32);

    if($ip1num > $ipNum) {
      $EndNum = $Middle;
      continue;
    }
    $DataSeek = fread($fd, 3);
    if(strlen($DataSeek) < 3) {
      fclose($fd);
      return 'System Error';
    }
    $DataSeek = implode('', unpack('L', $DataSeek.chr(0)));
    fseek($fd, $DataSeek);
    $ipData2 = fread($fd, 4);
    if(strlen($ipData2) < 4) {
      fclose($fd);
      return 'System Error';
    }
    $ip2num = implode('', unpack('L', $ipData2));
    if($ip2num < 0) $ip2num += pow(2, 32);
      if($ip2num < $ipNum) {
        if($Middle == $BeginNum) {
          fclose($fd);
          return 'Unknown';
        }
        $BeginNum = $Middle;
      }
    }
    $ipFlag = fread($fd, 1);
    if($ipFlag == chr(1)) {
      $ipSeek = fread($fd, 3);
      if(strlen($ipSeek) < 3) {
        fclose($fd);
        return 'System Error';
      }
      $ipSeek = implode('', unpack('L', $ipSeek.chr(0)));
      fseek($fd, $ipSeek);
      $ipFlag = fread($fd, 1);
    }
    if($ipFlag == chr(2)) {
      $AddrSeek = fread($fd, 3);
      if(strlen($AddrSeek) < 3) {
      fclose($fd);
      return 'System Error';
    }
    $ipFlag = fread($fd, 1);
    if($ipFlag == chr(2)) {
      $AddrSeek2 = fread($fd, 3);
      if(strlen($AddrSeek2) < 3) {
        fclose($fd);
        return 'System Error';
      }
      $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
      fseek($fd, $AddrSeek2);
    } else {
      fseek($fd, -1, SEEK_CUR);
    }
    while(($char = fread($fd, 1)) != chr(0))
    $ipAddr2 .= $char;
    $AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));
    fseek($fd, $AddrSeek);
    while(($char = fread($fd, 1)) != chr(0))
    $ipAddr1 .= $char;
  } else {
    fseek($fd, -1, SEEK_CUR);
    while(($char = fread($fd, 1)) != chr(0))
    $ipAddr1 .= $char;
    $ipFlag = fread($fd, 1);
    if($ipFlag == chr(2)) {
      $AddrSeek2 = fread($fd, 3);
      if(strlen($AddrSeek2) < 3) {
        fclose($fd);
        return 'System Error';
      }
      $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
      fseek($fd, $AddrSeek2);
    } else {
      fseek($fd, -1, SEEK_CUR);
    }
    while(($char = fread($fd, 1)) != chr(0)){
      $ipAddr2 .= $char;
    }
  }
  fclose($fd);
  if(preg_match('/http/i', $ipAddr2)) {
    $ipAddr2 = '';
  }
  $ipaddr = "$ipAddr1 $ipAddr2";
  $ipaddr = preg_replace('/CZ88.NET/is', '', $ipaddr);
  $ipaddr = preg_replace('/^s*/is', '', $ipaddr);
  $ipaddr = preg_replace('/s*$/is', '', $ipaddr);
  if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {
    $ipaddr = 'Unknown';
  }
  if(strpos($ipaddr, 'IANA')) $ipaddr = strstr($ipaddr, 'IANA');
  return $ipaddr;
}
