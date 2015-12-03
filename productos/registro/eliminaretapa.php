<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/productoetapa.php");
$productoetapa=new productoetapa;
$dat=$productoetapa->eliminarRegistro("codproductoetapa=".$cod);

?>