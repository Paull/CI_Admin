<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH.'config/config.php');

define('SITENAME', 'CI_Admin');
define('SITEDOMAIN', substr_count($_SERVER['SERVER_NAME'], '.') > 1 ? substr($_SERVER['SERVER_NAME'], strrpos($_SERVER['SERVER_NAME'], '.', strrpos($_SERVER['SERVER_NAME'], '.')-strlen($_SERVER['SERVER_NAME'])-1)+1) : $_SERVER['SERVER_NAME']);

$config['base_url'] = '/';
define('BASEURL', $config['base_url']);
define('STATIC_URL', BASEURL.'assets'.DIRECTORY_SEPARATOR);
$config['index_page'] = '';
$config['url_suffix'] = '.html';
define('URL_SUFFIX', $config['url_suffix']);
$config['language'] = 'zh-CN';
$config['allow_get_array'] = FALSE;
$config['log_threshold'] = 4;
$config['encryption_key'] = md5(SITENAME);
$config['sess_cookie_name'] = '__'.substr($config['encryption_key'], 0, 5);
$config['sess_expiration'] = 259200; //259200 seconds equals to three days
$config['cookie_domain'] = '.'.SITEDOMAIN;
$config['cookie_httponly']  = TRUE;
$config['standardize_newlines'] = TRUE;
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'hash';
$config['csrf_cookie_name'] = '__'.substr($config['encryption_key'], 5, 5);
$config['csrf_regenerate'] = FALSE;
$config['compress_output'] = FALSE;
$config['minify_output'] = FALSE; //DEPRECATED?

/*
|--------------------------------------------------------------------------
| Upload Files Base Path And URL
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR',      'uploads');
define('UPLOAD_URL',      $config['base_url'].UPLOAD_DIR.'/');
define('UPLOAD_PATH',     FCPATH.UPLOAD_DIR.DIRECTORY_SEPARATOR);
define('AVATAR_URL',      UPLOAD_URL.'avatar/');
define('AVATAR_PATH',     UPLOAD_PATH.'avatar'.DIRECTORY_SEPARATOR);
define('TMP_URL',         UPLOAD_URL.'tmp/');
define('TMP_PATH',        UPLOAD_PATH.'tmp'.DIRECTORY_SEPARATOR);
define('ATTACHMENT_URL',  UPLOAD_URL.'attachment/');
define('ATTACHMENT_PATH', UPLOAD_PATH.'attachment'.DIRECTORY_SEPARATOR);
