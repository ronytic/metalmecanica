<?php
include_once("../../../login/check.php");
$folder="../../";

$cod=$_GET['cpo'];
$codpedidodetalle=$_GET['codpedidodetalle'];
$codpedido=$_GET['codpedido'];
$codproducto=$_GET['codproducto'];
include_once("../../../class/pedidoobservacion.php");
$pedidoobservacion=new pedidoobservacion;
$dat=$pedidoobservacion->eliminarRegistro("codpedidoobservacion=".$cod);
header("Location:../controlproduccion.php?cpd=$codpedidodetalle&cpe=$codpedido&cpro=$codproducto#observacion");
?>