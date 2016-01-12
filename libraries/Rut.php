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
	
	protected $ci;

	public function __construct($params = array())
    {
        $this->ci =& get_instance();
        $this->_rut = $params['rut'];

        $this->clear($this->_rut);
        $this->separate($this->_rut);
        $this->validate($this->_rut);
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

    public function validate()
    {
    	$rutProcess = $this->clear;

    	// Obtener DV
    	$getDv = $this->separate[1];
    	
    	// Función obtenida de:
    	// http://users.dcc.uchile.cl/~mortega/microcodigos/validarrut/php.php
    	$s=1;for($m=0;$rutProcess!=0;$rutProcess/=10)$s=($s+$rutProcess%10*(9-$m++%6))%11;
    	$dvValidated = chr($s?$s+47:75);

    	// Validar
    	if($getDv == $dvValidated)
    		$this->validate = true;
    	else
    		$this->validate = false;
    	
		return $this;
    }
}