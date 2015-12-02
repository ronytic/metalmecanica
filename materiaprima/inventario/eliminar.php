<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/inventario.php");
$inventario=new inventario;
$dat=$inventario->eliminarRegistro("codinventario=".$cod);

?>