<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/producto.php");
$producto=new producto;
$dat=$producto->eliminarRegistro("codproducto=".$cod);

?>