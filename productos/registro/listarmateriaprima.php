<?php
include_once("../../class/productomateriaprima.php");
$productomateriaprima=new productomateriaprima;
extract($_POST);
$dat=$productomateriaprima->mostrarTodoRegistro(" codproducto LIKE '$codproducto'",1,"");
include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Código</th><th>Nombre</th><th>Cantidad</th><th>Unidad</th></tr>
</thead>
<?php
foreach($dat as $d){$i++;
$et=$materiaprima->mostrarTodoRegistro("codmateriaprima=".$d['codmateriaprima']);
$et=array_shift($et);
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $et['codigo']?></td>
    <td><?php echo $et['nombre']?></td>
    <td class="der"><?php echo $d['cantidad']?></td>
    <td><?php echo $et['unidad']?></td>
    <td width="15"><a href="eliminar.php" class="eliminarmateriaprima" title="Eliminar" rel="<?php echo $d['codproductomateriaprima']?>"><span class="icon-trash"></span></a></td>
</tr>
<?php    
}
?>
</table>