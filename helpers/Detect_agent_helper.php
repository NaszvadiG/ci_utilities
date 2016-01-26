<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('detect_agent'))
{
    /**
     * Return user agent information
     *
     * Using the native library Codeigniter "user agent"
     * all possible information is obtained to return it in one operation
     *
     * @return array
     *
     * @author Nicolas Ormeno <ni.ormeno@gmail.com>
     * @version 1.0
     */
    function detect_agent()
    {
        $ci =& get_instance();
        $ci->load->library('user_agent');

        $response = [];

        $response['agent']      = ($ci->agent->agent_string()) ? $ci->agent->agent_string() : false;
        $response['mobile']     = ($ci->agent->is_mobile()) ? $ci->agent->mobile() : false;
        $response['robot']      = ($ci->agent->is_robot()) ? $ci->agent->robot() : false;
        $response['browser']    = ($ci->agent->is_browser()) ? [$ci->agent->browser(), $ci->agent->version()] : false;
        $response['referrer']   = ($ci->agent->is_referral()) ? $ci->agent->is_referral() : false;
        $response['platform']   = ($ci->agent->platform()) ? $ci->agent->platform() : false;
        $response['languages']  = ($ci->agent->languages()) ? $ci->agent->languages() : false;
        $response['charsets']   = ($ci->agent->charsets()) ? $ci->agent->charsets() : false;

        return $response;
    }
}