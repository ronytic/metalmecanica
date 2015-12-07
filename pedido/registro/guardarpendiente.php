<?php
include_once("../../login/check.php");

include_once("../../class/pedidotemporal.php");
$pedidotemporal=new pedidotemporal;
$dat=$pedidotemporal->mostrarTodoRegistro("",1,"");


include_once("../../class/pedidopendiente.php");
$pedidopendiente=new pedidopendiente;
include_once("../../class/pedidopendientedetalle.php");
$pedidopendientedetalle=new pedidopendientedetalle;
extract($_POST);
$valores=array("nombrecliente"=>"'$nombrecliente'",
                "cicliente"=>"'$cicliente'",
                "celularcliente"=>"'$celularcliente'",
                "fechaentregaestimada"=>"'$fechaentregaestimada'",
            );
$pedidopendiente->insertarRegistro($valores);
$codpedidopendiente=$pedidopendiente->ultimo();
foreach($dat as $d){$i++;
    $valores=array("codpedidopendiente"=>"'$codpedidopendiente'",
                "codproducto"=>"'".$d['codproducto']."'",
                "cantidad"=>"'".$d['cantidad']."'",
            );
    $pedidopendientedetalle->insertarRegistro($valores);
}
$pedidotemporal->vaciar();
/*

echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Mensaje de Confirmación</h4>
        <div class="widgetcontent wc1">
            <h5>Su PEDIDO PENDIENTE se Registro Correctamente</h5>
            <br>
            <a href="./" class="btn btn-primary">NUEVO</a>
            <a href="listarpendientes.php" class="btn btn-default">LISTAR PEDIDOS PENDIENTES</a>
        </div>
</div>
<?php include_once($folder."pie.php");?>