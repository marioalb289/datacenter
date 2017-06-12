<?php 	

/**
* Clase con funciones de validacion
*/

class Validate
{
	public function numero($cadena){
		$regex = "/^[0-9]+$/i";
		if (!preg_match($regex, $cadena))
		    return false;
		else
			return true;
	}

	public function alfa($cadena){
		$regex = "/^[a-zA-Z Ññ áéíóú ÁÉÍÓÚ ]+$/i";
		if (!preg_match($regex, $cadena))
		    return false;
		else
			return true;
	}	

	public function alfanumerico($cadena){
		$regex = "/^[a-zA-Z Ññ áéíóú ÁÉÍÓÚ 0-9]+$/i";
		if (!preg_match($regex, $cadena))
		    return false;
		else
			return true;
	}

	public function cadena($cadena){
		$regex = "/^((([a-zA-Z Ññ áéíóú ÁÉÍÓÚ 0-9- .,() \/ ])+)? ?([a-zA-Z Ññ áéíóú ÁÉÍÓÚ 0-9- .,() \/]))+$/i";
		if (!preg_match($regex, $cadena))
		    return false;
		else
			return true;
	}

	public function fecha($date){
		$d = DateTime::createFromFormat('Y-m-d', $date);
	    return $d && $d->format('Y-m-d') === $date;
	}
}

?>
