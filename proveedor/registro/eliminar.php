<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$dat=$proveedor->eliminarRegistro("codproveedor=".$cod);

?>