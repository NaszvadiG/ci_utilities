<?php

/**
 * Class Zipper
 * @author Nicolas Ormeno <ni.ormeno@gmail.com>
 * @version 1.0
 */
class Zipper
{
    public function __construct()
    {

    }

    /**
     * Create zip and add files
     *
     * If zip not exist, then create zip and add files
     *
     * @param $path string
     * @param $files array
     * @return bool
     */
    public function create($path, $files)
    {
        if(!file_exists($path) && !empty($files)) {
            $zip = \Comodojo\Zip\Zip::create($path);
            $zip->add($files);

            return true;
        }
        else {
            return false;
        }
    }


    /**
     * Add files to zip
     *
     * @param $path string
     * @param $files array
     * @throws \Comodojo\Exception\ZipException
     */
    public function add($path, $files)
    {
        $zip = \Comodojo\Zip\Zip::open($path);
        $zip->add($files);
    }
}