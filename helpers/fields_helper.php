<?php
/**
 * Created by PhpStorm.
 * User: niorm
 * Date: 17-04-2016
 * Time: 16:29
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('field_to_status'))
{
    /**
     * Convert field to enabled or disabled value
     *
     * @param $field
     * @param null $name
     * @return string
     */
    function field_to_status($field, $name = null)
    {
        // Verify if get a array or field
        if(!is_array($field) && !empty($name))
        {
            $name   =   ucwords($name);
        }
        else
        {
            $name   =   ucwords($field[0]);
            $field  =   $field[1];
        }

        $field  =   ($field || $field == 1) ? 'Enabled' : 'Disabled';

        return "<p><strong>$name:</strong> $field</p>";
    }
}

if(!function_exists('field_to_custom'))
{
    /**
     * Convert field to custom type
     *
     * @param $field
     * @param null $name
     * @param $custom
     * @return string
     */
    function field_to_custom($field, $name = null, $custom)
    {
        // Verify if get a array or field
        if(!is_array($field) && !empty($name))
        {
            $name   =   ucwords($name);
        }
        else
        {
            $name   =   ucwords($field[0]);
            $field  =   $field[1];
        }

        if (array_key_exists($field, $custom)) {
            $field = $custom[$field];
        }

        return "<p><strong>$name:</strong> $field</p>";
    }
}

if(!function_exists('field_to_string'))
{
    /**
     * Convert field to srting
     *
     * @param $field
     * @param null $name
     * @param bool $datetime
     * @return string
     */
    function field_to_string($field, $name = null, $datetime = true)
    {
        $ci =& get_instance();
        $ci->load->helper('time_helper');

        // Verify if get a array or field
        if(!is_array($field) && !empty($name))
        {
            $name   =   ucwords($name);
        }
        else
        {
            $name   =   ucwords($field[0]);
            $field  =   $field[1];
        }

        // Validate datetime
        if(strtotime($field))
        {
            if($datetime)
                $field  =   chilean_datetime_change_format($field);
            else
                $field  =   date_change_format($field);
        }

        if(empty($field))
            $field = 'Sin información';

        return "<p><strong>$name:</strong> $field</p>";
    }
}

if(!function_exists('field_to_anchor'))
{
    /**
     * Convert string to link
     *
     * @param $field
     * @param null $name
     * @param bool $datetime
     * @param null $href
     * @return string
     */
    function field_to_anchor($field, $name = null, $datetime = true, $href)
    {
        $ci =& get_instance();
        $ci->load->helper('time_helper');

        // Verify if get a array or field
        if(!is_array($field) && !empty($name))
        {
            $name   =   ucwords($name);
        }
        else
        {
            $name   =   ucwords($field[0]);
            $field  =   $field[1];
        }

        // Validate datetime
        if(strtotime($field))
        {
            if($datetime)
                $field  =   chilean_datetime_change_format($field);
            else
                $field  =   date_change_format($field);
        }

        if(empty($field))
            $field = 'Sin información';

        return "<p><strong>$name:</strong> <a href='$href'>$field</a></p>";
    }
}

if(!function_exists('field_to_unchanged'))
{
    /**
     * Don't change field type
     *
     * @param $field
     * @param null $name
     * @param bool $datetime
     * @return string
     */
    function field_to_unchanged($field, $name = null, $datetime = true)
    {
        return "<p><strong>$name:</strong> $field</p>";
    }
}

/**
 * Change text to image
 *
 * @param $row
 * @param $value
 * @param $path
 * @return string
 */
if(!function_exists('field_to_image'))
{
    /**
     * Convert field to image, permit fancybox
     *
     * @param $field
     * @param null $path
     * @return string
     */
    function field_to_image($field, $path = null)
    {
        if(empty($field))
        {
            $image = base_url('public/images/no_image.png');
            return "<a href='$image' class='fancybox thumbnail'><img src='$image' width='100px' alt=''/></a>";
        }

        if (strpos($field, 'facebook') !== false)
        {
            $image = $field;
        }
        elseif (strpos($field, 'jpg') !== false || strpos($field, 'jpeg') !== false || strpos($field, 'png') !== false)
        {
            if(!is_null($path))
            {
                $image  =   base_url($path . $field);
            }
            else
            {
                $image  =   $field;
            }
        }
        else
        {
            $image = base_url('public/images/no_image.png');
        }

        return "<a href='$image' class='fancybox thumbnail'><img src='$image' width='100px' alt=''/></a>";
    }
}

if(!function_exists('field_to_yes_or_not'))
{
    /**
     * Convert field to yes or not radio button
     * @param $field
     * @param null $name
     * @return string
     */
    function field_to_yes_or_not($field, $name = null)
    {
        // Verify if get a array or field
        if(!is_array($field) && !empty($name))
        {
            $name   =   ucwords($name);
        }
        else
        {
            $name   =   ucwords($field[0]);
            $field  =   $field[1];
        }

        if ($field === false || $field === 0 || $field === '0' || $field === null)
        {
            $field  =   'No';
        }
        else
        {
            $field  =   'Si';
        }

        return "<p><strong>$name:</strong> $field</p>";
    }
}