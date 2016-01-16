<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr
{
    var $renderer;

    public $writer;

    public function __construct($config = null)
    {
        $this->renderer = new \BaconQrCode\Renderer\Image\Png();

        $this->set_default($config);
    }

    public function write($toWrite, $qrPath)
    {
        $writer = new \BaconQrCode\Writer($this->renderer);
        $writer->writeFile($toWrite, $qrPath);

        return $this;
    }

    private function set_default($config)
    {
        if(empty($config['width'])) {
            $this->renderer->setWidth(256);
        }

        if(empty($config['height'])) {
            $this->renderer->setHeight(256);
        }
    }
}