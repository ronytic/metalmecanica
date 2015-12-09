<?php
include_once("../../../login/check.php");
extract($_POST);
include_once("../../../class/pedidoobservacion.php");
$pedidoobservacion=new pedidoobservacion;
$valores=array("codproducto"=>"'$codproducto'",
                "codpedido"=>"'$codpedido'",
                "codpedidodetalle"=>"'$codpedidodetalle'",
                "Observacion"=>"'$Observacion'",
            );
$pedidoobservacion->insertarRegistro($valores);
$folder="../../";
header("Location:../controlproduccion.php?cpd=$codpedidodetalle&cpe=$codpedido&cpro=$codproducto#etapa");
?>