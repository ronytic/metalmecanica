<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/pedido.php");
$pedido=new pedido;
$dat=$pedido->eliminarRegistro("codpedido=".$cod);

?>