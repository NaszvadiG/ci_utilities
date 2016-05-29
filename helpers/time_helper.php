<?php
/**
 * Created by Nicolas Ormeno.
 * User: normeno
 * Date: 25-03-2016
 * Time: 16:15
 */

if(!function_exists('datetime_change_format')) {
    /**
     * Change Datetime Format
     * @param $time
     * @return string
     */
    function datetime_change_format($time)
    {
        $new_format = new DateTime($time);
        return $new_format->format('Y-m-d H:i:s');
    }
}

if(!function_exists('chilean_datetime_change_format')) {
    /**
     * Change datetime to chilean format
     * @param $time
     * @return string
     */
    function chilean_datetime_change_format($time)
    {
        $new_format = new DateTime($time);
        return $new_format->format('d-m-Y H:i:s');
    }
}

if(!function_exists('date_change_format')) {
    /**
     * Change date format
     * @param $time
     * @return string
     */
    function date_change_format($time)
    {
        $new_format = new DateTime($time);
        return $new_format->format('d-m-Y');
    }
}

if(!function_exists('time_change_format')) {
    /**
     * Change time format
     * @param $time
     * @return string
     */
    function time_change_format($time)
    {
        $new_format = new DateTime($time);
        return $new_format->format('H:i:s');
    }
}

if(!function_exists('set_now')) {
    /**
     * Set now with format
     *
     * @param null $format
     * @return bool|string
     */
    function set_now($format = null)
    {
        switch ($format) {
            case 1:
                $response = date('m-d-Y H:i:s');
                break;
            case 2:
                $response = date('m-d-Y');
                break;
            case 3:
                $response = date('d-m-Y H:i:s');
                break;
            case 4:
                $response = date('d-m-Y');
                break;
            case 5:
                $response = date('Y-m-d H:i:s');
                break;
            case 6:
                $response = date('Y-m-d');
                break;
            default:
                $response = date('Y-m-d H:i:s');
                break;
        }

        return $response;
    }
}

if(!function_exists('calculate_diff'))
{
    /**
     * Calculate difference between a datetime and now
     *
     * @param $date
     * @return string
     */
    function calculate_diff($date)
    {
        $datetime1 = new DateTime($date);
        $datetime2 = new DateTime();

        $interval = $datetime1->diff($datetime2);

        switch($interval)
        {
            case ($interval->y > 1):
                return $interval->format('Hace %R%y años');
                break;
            case ($interval->y > 0 && $interval->y < 2):
                return $interval->format('Hace %R%y año');
                break;
            case ($interval->m > 1):
                return $interval->format('Hace %R%m meses');
                break;
            case ($interval->m > 0 && $interval->m < 2):
                return $interval->format('Hace %R%m mes');
                break;
            case ($interval->d > 1):
                return $interval->format('Hace %R%d días');
                break;
            case ($interval->d > 0 && $interval->d < 2):
                return $interval->format('Hace %R%d día');
                break;
            case ($interval->h > 1):
                return $interval->format('Hace %R%h horas');
                break;
            case ($interval->h > 0 && $interval->h < 2):
                return $interval->format('Hace %R%h hora');
                break;
            case ($interval->i > 1):
                return $interval->format('Hace %R%i minutos');
                break;
            case ($interval->i > 0 && $interval->i < 2):
                return $interval->format('Hace %R%i minuto');
                break;
            case ($interval->s > 1):
                return $interval->format('Hace %R%s segundos');
                break;
            case ($interval->s > 0 && $interval->s < 2):
                return $interval->format('Hace %R%s segundo');
                break;
        }
    }
}