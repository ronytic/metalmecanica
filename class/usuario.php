<?php
include_once("bd.php");
class usuario extends bd{
	var $tabla="usuario";
	function mostrarDatos($CodUsuario){
		$this->campos=array("*");
		return $this->getRecords("codusuarios=$CodUsuario and activo=1");
	}
	function mostrarUsuarios($menos=""){
		$menos=$menos?"$menos and ":'';
		$this->campos=array("*");
		return $this->getRecords("$menos activo=1","paterno,materno,nombre");
	}
	function actualizarDatos($valores,$CodUsuario){
		return $this->updateRow($valores,"codusuarios=$CodUsuario");
	}
	
	function loginUsuarios($Usuario,$Password){
		$this->campos=array("count(*) as Can,codusuarios,nivel");	
		return $this->getRecords("usuario='$Usuario' and password=MD5('$Password') and Activo=1");
	}
}
?>