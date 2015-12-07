<?php
include_once("bd.php");
class inventario extends bd{
	var $tabla="inventario";
    function SumaTotal($codmateriaprima){
        $this->campos=array("sum(cantidadstock) as cantidadstocktotal");
        return $this->getRecords("codmateriaprima=$codmateriaprima and activo=1");
    }
}
?>