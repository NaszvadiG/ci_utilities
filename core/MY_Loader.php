<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    var $ci;

    public function __construct()
    {
        parent::__construct();
        $this->ci =& get_instance();

        $this->set_view_path();
    }

    /**
     * Reroute the default views
     */
    public function set_view_path()
    {
        $path = FCPATH . 'public/views/frontend/' . strtolower($this->ci->router->fetch_class()) . '/';
        $this->_ci_view_paths = array(
            $path => TRUE
        );
    }
}