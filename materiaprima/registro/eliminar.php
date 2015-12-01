<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$dat=$materiaprima->eliminarRegistro("codmateriaprima=".$cod);

?>