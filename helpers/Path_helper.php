<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('css_url'))
{
    /**
     * Create default path for css
     *
     * @return string
     *
     * @author Nicolas Ormeno <ni.ormeno@gmail.com>
     * @version 1.0
     */
    function css_url($file, $path = null)
    {
        $ci =& get_instance();
        $ci->load->helper('url');

        if(is_null($path))
            return base_url('public/css/'.$file);
        else
            return base_url($path);
    }
}

if (!function_exists('js_url'))
{
    /**
     * Create default path for js
     *
     * @return string
     *
     * @author Nicolas Ormeno <ni.ormeno@gmail.com>
     * @version 1.0
     */
    function js_url($path = null)
    {
        $ci =& get_instance();
        $ci->load->helper('url');

        if(is_null($path))
            return base_url('public/js/'.$file);
        else
            return base_url($path);
    }
}

if (!function_exists('img_url'))
{
    /**
     * Create default path for img
     *
     * @return string
     *
     * @author Nicolas Ormeno <ni.ormeno@gmail.com>
     * @version 1.0
     */
    function img_url($path = null)
    {
        $ci =& get_instance();
        $ci->load->helper('url');

        if(is_null($path))
            return base_url('public/img/'.$file);
        else
            return base_url($path);
    }
}
