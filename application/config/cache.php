<?php defined('BASEPATH') || exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource
 */

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

/* End of file cache.php */
/* Location: ./application/config/cache.php */
