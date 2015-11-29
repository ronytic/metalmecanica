<?php
include_once("bd.php");
class menu extends bd{
	var $tabla="menu";
	function mostrar($Nivel,$Posicion=""){
		$this->campos=array('codmenu','nombre','url','submenu');
		switch($Nivel){
			case "1":{return $this->getRecords(" superadmin=1 and activo=1 ","orden");}break;
			case "2":{return $this->getRecords(" administrador=1 and activo=1 ","orden");}break;
			case "3":{return $this->getRecords(" recepcionista=1 and activo=1","orden");}break;
			case "4":{return $this->getRecords(" encargado=1 and activo=1","orden");}break;
		}
	}
}
?>