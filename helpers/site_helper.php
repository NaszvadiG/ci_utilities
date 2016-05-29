<?php
/**
 * Created by Nicolas Ormeno.
 * User: normeno
 * Date: 25-03-2016
 * Time: 16:13
 */

if(!function_exists('is_admin'))
{
    /**
     * Check if url contain admin or backend
     * and return admin or client
     *
     * @return string
     */
    function is_admin()
    {
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (strpos($url,'admin') !== false || strpos($url,'backend') !== false)
            return 'admin';
        else
            return 'client';
    }
}

if(!function_exists('is_ajax'))
{
    /**
     * Check if call is ajax
     */
    function is_ajax()
    {
        $ci =& get_instance();

        if(!$ci->input->is_ajax_request()){
            show_404();
        }
    }
}