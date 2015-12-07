<?php
include_once("../../login/check.php");

include_once("../../class/pedidotemporal.php");
$pedidotemporal=new pedidotemporal;
$dat=$pedidotemporal->mostrarTodoRegistro("",1,"");


include_once("../../class/pedido.php");
$pedido=new pedido;
include_once("../../class/pedidodetalle.php");
$pedidodetalle=new pedidodetalle;
extract($_POST);
$valores=array("nombrecliente"=>"'$nombrecliente'",
                "cicliente"=>"'$cicliente'",
                "celularcliente"=>"'$celularcliente'",
                "fechaentregaestimada"=>"'$fechaentregaestimada'",
            );
$pedido->insertarRegistro($valores);
$codpedido=$pedido->ultimo();
foreach($dat as $d){$i++;
    $valores=array("codpedido"=>"'$codpedido'",
                "codproducto"=>"'".$d['codproducto']."'",
                "cantidad"=>"'".$d['cantidad']."'",
            );
    $pedidodetalle->insertarRegistro($valores);
}
$pedidotemporal->vaciar();

include_once("../../class/pedidopendiente.php");
$pedidopendiente=new pedidopendiente;
$dat=$pedidopendiente->eliminarRegistro("codpedidopendiente=".$codpedidopendiente);


/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Mensaje de Confirmación</h4>
        <div class="widgetcontent wc1">
            <h5>Su PEDIDO se Registro Correctamente</h5>
            <br>
            <a href="./" class="btn btn-primary">NUEVO</a>
            <a href="listar.php" class="btn btn-default">LISTAR PEDIDOS</a>
        </div>
</div>
<?php include_once($folder."pie.php");?>