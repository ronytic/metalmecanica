<?php
include_once("../../class/pedido.php");
$pedido=new pedido;
include_once("../../class/pedidodetalle.php");
$pedidodetalle=new pedidodetalle;
extract($_POST);
$fechaentregaestimada=$fechaentregaestimada!=""?$fechaentregaestimada:'%';
$fechaentregareal=$fechaentregareal!=""?$fechaentregareal:'%';
$dat=$pedido->mostrarTodoRegistro(" nombrecliente LIKE '$nombrecliente%' and cicliente LIKE '$cicliente%' and fechaentregaestimada LIKE '$fechaentregaestimada' and fechaentregareal LIKE '$fechaentregareal' and estado LIKE '$estado'",1,"fecha,hora,nombrecliente,cicliente");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="20">Nº</th><th>Nombre Cliente</th><th>C.I. Cliente</th><th>Celular Cliente</th><th width="110">Fecha Estimada de Entrega</th><th width="110">Fecha de Entrega Real</th><th>Estado</th><th width="70">Cant. de Productos</th></tr>
</thead>
<?php
foreach($dat as $d){$i++;
$pd=$pedidodetalle->mostrarTodoRegistro("codpedido=".$d['codpedido'],1,"");
$cantidadProductos=count($pd);
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $d['nombrecliente']?></td>
    <td><?php echo $d['cicliente']?></td>
    <td><?php echo $d['celularcliente']?></td>
    <td><?php echo $d['fechaentregaestimada']?></td>
    <td><?php echo $d['fechaentregareal']?></td>
    <td><?php echo $d['estado']?'Concluido':'Producción'?></td>
    <td class="der"><?php echo $cantidadProductos?></td>
    <td width="15"><a href="verpedido.php?codpedido=<?php echo $d['codpedido']?>" class="btn btn-default" title="Ver" rel="<?php echo $d['codpedido']?>">Ver Pedido</a></td>
    <td width="15"><a href="eliminar.php" class="eliminar" title="Eliminar" rel="<?php echo $d['codpedido']?>"><span class="icon-trash"></span></a></td>
</tr>
<?php    
}
?>
</table>