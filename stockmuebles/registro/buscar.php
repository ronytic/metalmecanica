<?php
extract($_POST);
include_once("../../class/stock.php");
$stock=new stock;
$inventariostock=$stock->mostrarTodoRegistro(" codproducto LIKE '$codproducto' ",1,"");

include_once("../../class/producto.php");
$producto=new producto;
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Código</th><th>Nombre</th><th>Unidad</th><th>Cantidad Recargada</th><th>Cantidad en Stock</th><th>Fecha de Recarga</th></tr>
</thead>
<?php
foreach($inventariostock as $st){$i++;
$pro=$producto->mostrarTodoRegistro(" codproducto=".$st['codproducto'],1,"nombre");
$pro=array_shift($pro);
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $pro['codigo']?></td>
    <td><?php echo $pro['nombre']?></td>
    <td><?php echo $pro['unidad']?></td>
    <td><?php echo $st['cantidad']?></td>
    <td><?php echo $st['cantidadstock']?></td>
    <td><?php echo $st['fecha']?> - <?php echo $st['hora']?></td>
    <?php if($st['cantidad']==$st['cantidadstock']){?>    
    <td width="15"><a href="modificar.php?cod=<?php echo $st['codstock']?>" class="" title="Modificar" rel="<?php echo $st['codstock']?>"><i class="icon-pencil"></i></a></td>
    <td width="15"><a href="eliminar.php" class="eliminar" title="Eliminar" rel="<?php echo $st['codstock']?>"><span class="icon-trash"></span></a></td>
    <?php }?>
</tr>
<?php    
}
?>
</table>