<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/pedidotemporal.php");
$pedidotemporal=new pedidotemporal;
$pedidotemporal->vaciar();

?>