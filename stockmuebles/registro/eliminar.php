<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/stock.php");
$stock=new stock;
$dat=$stock->eliminarRegistro("codstock=".$cod);

?>