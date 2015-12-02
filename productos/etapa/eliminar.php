<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/etapa.php");
$etapa=new etapa;
$dat=$etapa->eliminarRegistro("codetapa=".$cod);

?>