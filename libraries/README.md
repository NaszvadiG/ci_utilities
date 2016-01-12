# Libraries

## Rut ##

Library to facilitate working with the Chilean rut, allows:

 - Clean (erase points and screenplay)
 - Validate if dv is correct.
 - Separate rut string, returns an array, position 0 is the rut, in position 1 is dv.

**use**

    $params = ['rut' => '16.893.255-3'];
    $this->load->library('rut', $params);
    var_dump($this->rut);

rut obtained from [here](http://joaquinnunez.cl/jQueryRutPlugin/generador-de-ruts-chilenos-validos.html)