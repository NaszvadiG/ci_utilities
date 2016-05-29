<?php
/**
 * Created by Nicolas Ormeno.
 * User: Normeno
 * Date: 10-03-2016
 * Time: 11:45
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('gc_general'))
{
    /**
     * Load General Options
     *
     * @param $table
     * @param $subject
     * @param null $where
     * @param null $order
     * @param null $not_null
     * @return grocery_CRUD_extended
     */
    function gc_general($table, $subject, $where = null, $order = null, $not_null = null)
    {
        $gc = new grocery_CRUD_extended();

        (!is_null($where)) ? $gc->where($where['where'], $where['value']) : '';
        (!is_null($order)) ? $gc->order_by($order['value'], $order['order']) : '';
        (!is_null($not_null)) ? $gc->where("$not_null IS NOT NULL", null, false) : '';

        $gc
            ->set_theme('bootstrap')
            ->set_table($table)
            ->set_subject($subject)
            ->set_language("spanish")
            ->unset_jquery()
            ->unset_bootstrap();

        return $gc;
    }
}

if(!function_exists('gc_display'))
{
    /**
     * Display option
     *
     * @param $gc
     * @param $arr
     * @return string
     */
    function gc_display($gc, $arr)
    {
        $resp 	=	'';

        foreach($arr as $key => $value){
            $resp = $gc->display_as($key, $value);
        }
        return $resp;
    }
}

if(!function_exists('gc_js'))
{
    /**
     * Load Javascript
     *
     * @param $js_files
     * @return array
     */
    function gc_js($js_files)
    {
        $start      =   '<script type="text/javascript" src="';
        $end        =   '"></script>';
        $resp       =   [];

        foreach($js_files as $file) {
            $file = $start.$file.$end;
            array_push($resp, $file);
        }

        return $resp;
    }
}

if(!function_exists('gc_css'))
{
    /**
     * Load CSS
     *
     * @param $css_files
     * @return array
     */
    function gc_css($css_files)
    {
        $resp       =   [];

        foreach($css_files as $file) {
            array_push($resp, link_tag($file));
        }

        return $resp;
    }
}