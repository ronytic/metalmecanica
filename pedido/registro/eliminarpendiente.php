<?php
include_once("../../login/check.php");
$folder="../../";

$cod=$_POST['cod'];
include_once("../../class/pedidopendiente.php");
$pedidopendiente=new pedidopendiente;
$dat=$pedidopendiente->eliminarRegistro("codpedidopendiente=".$cod);

?>