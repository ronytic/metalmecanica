<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/pedido.php");
$pedido=new pedido;
$valores=array("nombrecliente"=>"'$nombrecliente'",
                "cicliente"=>"'$cicliente'",
                "celularcliente"=>"'$celularcliente'",
                "fechaentregaestimada"=>"'$fechaentregaestimada'",
                "fechaentregareal"=>"'$fechaentregareal'",
                "estado"=>"'$estado'",
                "detalle"=>"'$detalle'",
            );
$pedido->actualizarRegistro($valores,"codpedido=".$codpedido);

$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Mensaje de Confirmación</h4>
        <div class="widgetcontent wc1">
            <h5>Sus Datos del Pedido se Actualizaron Correctamente</h5>
            <br>
            <a href="verpedido.php?codpedido=<?php echo $codpedido?>" class="btn btn-primary">VOLVER AL PEDIDO</a>
            <a href="./" class="btn btn-">NUEVO PEDIDO</a>
            <a href="listar.php" class="btn btn-default">LISTAR</a>
        </div>
</div>
<?php include_once($folder."pie.php");?>