<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Clase para facilitar el trabajo con el rut chileno
 *
 * @author     Nicolas Ormeno
 * @version    1.0
 */
class Rut {

    public $_rut;
    public $clear;
    public $separate;
    public $validate;
    public $full_format;

    protected $ci;
    public function __construct($params = array())
    {
        $this->ci =& get_instance();
        $this->_rut = $params['rut'];
        $this->clear($this->_rut);
        $this->separate($this->_rut);
        $this->validate($this->_rut);
        $this->full_format($this->_rut);
    }
    /**
     * Limpiar rut eliminando puntos y guión
     * @return String Rut limpio
     */
    public function clear()
    {
        // Limpiar puntos
        $cleanRut = str_replace('.', '', $this->_rut);
        // Limpiar guión
        $cleanRut = str_replace('-', '', $cleanRut);
        $this->clear = $cleanRut;
        return $this;
    }
    /**
     * Separar string de rut y obtener dígito verificador
     * @return String Dígito verificador
     */
    public function separate($rut = null)
    {
        if(!is_null($rut))
            $rutProcess = $rut;
        else
            $rutProcess = $this->_rut;
        $separating = '';
        // Contiene guión
        if(strpos($rutProcess,'-')) {
            $separating = explode('-', $rutProcess);
        }
        // No contiene guión
        else {
            $run = substr_replace($rutProcess, '', -1);
            $dv = substr($rutProcess, -1);
            $separating[0] = $rutProcess;
            $separating[1] = $dv;
        }
        $this->separate = $separating;
        return $this;
    }

    /**
     * Validar que el rut sea o no correcto
     * @return $this
     */
    public function validate()
    {
        $r  =   $this->separate[0];
        $dv =   $this->separate[1];
        $s  =   1;

        // http://users.dcc.uchile.cl/~mortega/microcodigos/validarrut/php.php
        for($m=0; $r!=0; $r/=10)
            $s = ( $s + $r % 10 * (9-$m++%6) ) % 11;

        $validated_dv = (chr($s?$s+47:75));

        if($dv == $validated_dv)
            $this->validate = true;
        else
            $this->validate = false;

        return $this;
    }

    /**
     * Formatear Rut
     *
     * Genera formato de rut con puntos y guión
     *
     * @return mixed
     */
    public function full_format()
    {
        $validate = $this->validate();

        if(!$validate)
            return false;

        $rut = $this->separate[0];

        // http://snipplr.com/view/2068/php--formatear-con-puntos-rut/
        $format = number_format( $rut, 0, '', '.');

        $this->full_format = $format . '-' . $this->separate[1];

        return $this;
    }
}