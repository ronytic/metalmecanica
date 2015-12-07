<?php
include_once("../../class/pedidopendiente.php");
$pedidopendiente=new pedidopendiente;
extract($_POST);
$fechaentregaestimada=$fechaentregaestimada!=""?$fechaentregaestimada:'%';
$dat=$pedidopendiente->mostrarTodoRegistro(" nombrecliente LIKE '$nombrecliente%' and cicliente LIKE '$cicliente%' and fechaentregaestimada LIKE '$fechaentregaestimada'",1,"fecha,hora,nombrecliente,cicliente");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Nombre Cliente</th><th>C.I. Cliente</th><th>Celular Cliente</th><th>Fecha Estimada de Entrega</th></tr>
</thead>
<?php
foreach($dat as $d){$i++;

?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $d['nombrecliente']?></td>
    <td><?php echo $d['cicliente']?></td>
    <td><?php echo $d['celularcliente']?></td>
    <td><?php echo $d['fechaentregaestimada']?></td>
    <td width="15"><a href="verpendiente.php?codpedidopendiente=<?php echo $d['codpedidopendiente']?>" class="" title="Ver" rel="<?php echo $d['codpedidopendiente']?>"><i class="icon-check"></i></a></td>
    <td width="15"><a href="eliminar.php" class="eliminar" title="Eliminar" rel="<?php echo $d['codpedidopendiente']?>"><span class="icon-trash"></span></a></td>
</tr>
<?php    
}
?>
</table>