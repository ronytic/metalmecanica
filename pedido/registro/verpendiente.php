<?php
include_once("../../login/check.php");
include_once("../../class/pedidotemporal.php");
$pedidotemporal=new pedidotemporal;

include_once("../../class/pedidopendientedetalle.php");
$pedidopendientedetalle=new pedidopendientedetalle;

$dat=$pedidopendientedetalle->mostrarTodoRegistro("codpedidopendiente=".$_GET['codpedidopendiente'],1,"");

foreach($dat as $d){$i++;
    $valores=array(
                "codproducto"=>"'".$d['codproducto']."'",
                "cantidad"=>"'".$d['cantidad']."'",
            );
    $pedidotemporal->insertarRegistro($valores);
}
header("Location:index.php?codpedidopendiente=".$_GET['codpedidopendiente']);
?>