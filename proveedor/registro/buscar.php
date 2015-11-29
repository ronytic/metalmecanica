<?php
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
extract($_POST);
$dat=$proveedor->mostrarTodoRegistro(" nombreempresa LIKE '$nombreempresa%' and materiaprima LIKE '$materiaprima%'",1,"nombreempresa");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Nombre Empresa</th><th>Dirección</th><th>Teléfono</th><th>Materia Prima</th></tr>
</thead>
<?php
foreach($dat as $d){$i++;

?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $d['nombreempresa']?></td>
    <td><?php echo $d['direccion']?></td>
    <td><?php echo $d['telefono']?></td>
    <td><?php echo $d['materiaprima']?></td>
    <td width="15"><a href="modificar.php?cod=<?php echo $d['codproveedor']?>" class="" title="Modificar" rel="<?php echo $d['codproveedor']?>"><i class="icon-pencil"></i></a></td>
    <td width="15"><a href="eliminar.php" class="eliminar" title="Eliminar" rel="<?php echo $d['codproveedor']?>"><span class="icon-trash"></span></a></td>
</tr>
<?php    
}
?>
</table>