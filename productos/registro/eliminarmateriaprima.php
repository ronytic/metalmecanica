<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/productomateriaprima.php");
$productomateriaprima=new productomateriaprima;
$dat=$productomateriaprima->eliminarRegistro("codproductomateriaprima=".$cod);

?>