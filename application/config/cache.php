<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Cache settings
| -------------------------------------------------------------------------
|
| set a cache key prefix can seprate different projects while sharing a single
| cache engine
|
|*/

$config = array(
    'key_prefix' => substr(md5(SITENAME), 0, 8).'_',
    'adapter'    => 'memcached',
    'backup'     => 'file',
);
