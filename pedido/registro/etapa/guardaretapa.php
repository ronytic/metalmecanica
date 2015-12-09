<?php
include_once("../../../login/check.php");
extract($_POST);
include_once("../../../class/pedidoetapa.php");
$pedidoetapa=new pedidoetapa;
$valores=array("codproducto"=>"'$codproducto'",
                "codpedido"=>"'$codpedido'",
                "codpedidodetalle"=>"'$codpedidodetalle'",
                "codetapa"=>"'$codetapa'",
            );
$pedidoetapa->insertarRegistro($valores);
$folder="../../";
header("Location:../controlproduccion.php?cpd=$codpedidodetalle&cpe=$codpedido&cpro=$codproducto#etapa");
?>