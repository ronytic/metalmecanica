<?php
include_once("../../../login/check.php");
$folder="../../";

$cod=$_GET['cpe'];
$codpedidodetalle=$_GET['codpedidodetalle'];
$codpedido=$_GET['codpedido'];
$codproducto=$_GET['codproducto'];
include_once("../../../class/pedidoetapa.php");
$pedidoetapa=new pedidoetapa;
$dat=$pedidoetapa->eliminarRegistro("codpedidoetapa=".$cod);
header("Location:../controlproduccion.php?cpd=$codpedidodetalle&cpe=$codpedido&cpro=$codproducto#etapa");
?>