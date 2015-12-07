<?php
extract($_POST);
include_once("../../class/inventario.php");
$inventario=new inventario;
include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$fecha=$fecha!=""?$fecha:'%';
$inv=$inventario->mostrarTodoRegistro(" codmateriaprima LIKE '$codmateriaprima' and fecha LIKE '$fecha'",1,"");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Código</th><th>Nombre</th><th>Unidad</th><th>Cantidad Recargada</th><th>Cantidad en Stock</th><th>Fecha de Recarga</th></tr>
</thead>
<?php
foreach($inv as $in){$i++;
$cmp=$materiaprima->mostrarTodoRegistro(" codmateriaprima=".$in['codmateriaprima'],1,"nombre");
$cmp=array_shift($cmp);
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $cmp['codigo']?></td>
    <td><?php echo $cmp['nombre']?></td>
    <td><?php echo $cmp['unidad']?></td>
    <td><?php echo $in['cantidad']?></td>
    <td><?php echo $in['cantidadstock']?></td>
    <td><?php echo $in['fecha']?> - <?php echo $in['hora']?></td>
    <?php if($in['cantidad']==$in['cantidadstock']){?>    
    <td width="15"><a href="modificar.php?cod=<?php echo $in['codinventario']?>" class="" title="Modificar" rel="<?php echo $in['codinventario']?>"><i class="icon-pencil"></i></a></td>
    <td width="15"><a href="eliminar.php" class="eliminar" title="Eliminar" rel="<?php echo $in['codinventario']?>"><span class="icon-trash"></span></a></td>
    <?php }?>
</tr>
<?php    
}
?>
</table>