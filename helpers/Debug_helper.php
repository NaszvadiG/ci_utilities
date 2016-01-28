<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('debug_bar'))
{
    function debug_bar()
    {
        $ci =& get_instance();

        $ci->load->add_package_path(APPPATH.'third_party/codeigniter-debugbar');
        $ci->load->library('console');
        $ci->output->enable_profiler(TRUE);
    }
}