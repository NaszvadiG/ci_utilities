<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer extends CI_Controller
{
    public	$ci_html;
    private $ci;
    private $senderName		=	'My Name';
    private $senderEmail	=	'me@domain.com';
    private $senderUser		=	'user@main.com';
    private $senderPass		=	'my_pass';
    private $senderHost		=	'my_email_host';
    private $senderPort     =   465;
    private $senderCrypt    =   'ssl';

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    /**
     * Send SMTP HTML email
     *
     * @param array $data
     * @return $this
     */
    public function smtp_html($data = array())
    {
        $this->ci->load->library('email');

        $config = $this->ci_config();
        $this->ci->email->initialize($config);

        $this->ci->email->from($this->senderEmail, $this->senderName);
        $this->ci->email->to($data['to']);
        $this->ci->email->subject($data['subject']);

        $message = $data['message'];
        $this->ci->email->message($message);

        if($this->ci->email->send()) {
            $this->ci_html['status']    =   true;
        } else {
            $this->ci_html['status']    =   false;
            $this->ci_html['debug']     =   $this->email->print_debugger();
        }

        return $this;
    }

    /**
     * Default SMTP Config
     * @return array
     */
    private function ci_config()
    {
        $config = array();

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $this->senderHost;
        $config['smtp_user'] = $this->senderUser;
        $config['smtp_pass'] = $this->senderPass;
        $config['smtp_port'] = $this->senderPort;
        $config['smtp_crypto'] = $this->senderCrypt;
        $config['mailtype'] = 'html';

        return $config;
    }
}
