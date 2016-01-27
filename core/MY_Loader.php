<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    var $ci;

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();
    }

    /**
     * Layout Loader
     *
     * Loads "layout" files used as templates.
     *
     * @param	string	$view	View name
     * @param	array	$vars	An associative array of data
     *				to be extracted for use in the view
     * @param	bool	$return	Whether to return the view output
     *				or leave it to the Output class
     * @return	object|string
     */
    public function layout($view, $vars = array(), $return = FALSE)
    {
        $this->set_view_path('layouts/');

        return $this->_ci_load(
            array(
                '_ci_view' => $view,
                '_ci_vars' => $this->_ci_object_to_array($vars),
                '_ci_return' => $return
            )
        );
    }

    /**
     * Views Loader
     *
     * Loads "view" files
     *
     * @param	string	$view	View name
     * @param	array	$vars	An associative array of data
     *				to be extracted for use in the view
     * @param	bool	$return	Whether to return the view output
     *				or leave it to the Output class
     * @return	object|string
     */
    public function view($view, $vars = array(), $return = FALSE)
    {
        $this->set_view_path(strtolower($this->ci->router->fetch_class()) . '/');

        return $this->_ci_load(
            array(
                '_ci_view' => $view,
                '_ci_vars' => $this->_ci_object_to_array($vars),
                '_ci_return' => $return
            )
        );
    }

    /**
     * Reroute the default views
     */
    public function set_view_path($path = null)
    {
        if(is_null($path))
            $path = FCPATH . 'public/views/';
        else
            $path = FCPATH . 'public/views/' . $path;

        $this->_ci_view_paths = array(
            $path => TRUE
        );
    }
}
