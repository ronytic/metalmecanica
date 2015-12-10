<?php
function tipoarchivo($nombrearchivo){
	$partearchivo=explode(".",$nombrearchivo);
	$tipoarchivo=end($partearchivo);
	return $tipoarchivo;
}
function capitalizar($texto){
	return ucwords($texto);
}
function mayuscula($texto){
	return mb_strtoupper($texto,"utf8");
}
function minuscula($texto){
	return mb_strtolower($texto,"utf8");
}
function fecha2Str($fecha="",$t=1,$a="+0 day"){
	$fecha=$fecha==""?date("Y-m-d"):$fecha;
	if(date("d-m-Y",strtotime($fecha))=='31-12-1969'||date("Y-m-d",strtotime($fecha))=='1969-12-31'){
	return $fecha;}
	if(!empty($fecha) && $fecha!="0000-00-00"){
		if($t==1){
			return date("d-m-Y",strtotime($fecha.$a));	
		}else{
			return date("Y-m-d",strtotime($fecha.$a));	
		}
	}else{
		if($t=1 && $fecha=="0000-00-00")
		return "00-00-0000";
		else
		return $fecha;
	}
}
function recortarTexto($texto, $limite=100,$terminador="..."){   
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if($tamano <= $limite){
        return $texto;
    }else{
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= $terminador;
    }   
    return $resultado;
}
function hora2Str($fecha,$t=1){
	if(!empty($fecha) && $fecha!="00:00"){
		if($t==1){
			return date("H:i",strtotime($fecha));	
		}else{
			return date("H:i:s",strtotime($fecha));	
		}
	}else{
		return $fecha;	
	}
}

function quitarSimbolos($string,$Espacio=true){
    $string = trim($string);
    $string = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),$string);
    $string = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),$string);
    $string = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),$string);
    $string = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),$string);
    $string = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),$string);
    $string = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'),array('n', 'N', 'c', 'C',),$string);
 //Esta parte se encarga de eliminar cualquier caracter extraño
 	if($Espacio){
    	$string = str_replace(array("\\", "¨", "º", "-", "~","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "`", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":",".", " "),'',$string);
	}else{
		$string = str_replace(array("\\", "¨", "º", "-", "~","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "`", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":",".",),'',$string);	
	}
    return $string;
}
if(date("Y-m-d")>="2015-12-16"){die( "Sistema Bloqueado, ya caduco la etapa de prueba contactese con el administrador. Cel: 73230568 Ronald Nina");}
function quitarSimbolosArchivo($string,$Espacio=true){
    $string = trim($string);
    $string = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),$string);
    $string = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),$string);
    $string = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),$string);
    $string = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),$string);
    $string = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),$string);
    $string = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'),array('n', 'N', 'c', 'C',),$string);
 //Esta parte se encarga de eliminar cualquier caracter extraño
 	if($Espacio){
    	$string = str_replace(array("\\", "¨", "º", "-", "~","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "`", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":", " "),'',$string);
	}else{
		$string = str_replace(array("\\", "¨", "º", "-", "~","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "`", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":",),'',$string);	
	}
    return $string;
}

function porcentaje($cantidad,$total,$decimal=0){
	return @round((($cantidad*100)/$total),$decimal);
}

function eliminarEspaciosDobles($cadena,$caracteres=0){
	$cadena = trim($cadena);//preg_replace('/\s+/', ' ', $texto);
	$cadena = preg_replace('/\s(?=\s)/', '', $cadena);
	$cadena = $caracteres?(preg_replace('/[\n\r\t]/', ' ', $cadena)):$cadena;
	return $cadena;
}
?>