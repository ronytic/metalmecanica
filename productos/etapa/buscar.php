<?php
include_once("../../class/etapa.php");
$etapa=new etapa;
extract($_POST);
$dat=$etapa->mostrarTodoRegistro(" codigo LIKE '$codigo%' and nombre LIKE '$nombre%'",1,"nombre");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Código</th><th>Nombre</th><th>Descripción</th></tr>
</thead>
<?php
foreach($dat as $d){$i++;

?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $d['codigo']?></td>
    <td><?php echo $d['nombre']?></td>
    <td><?php echo $d['descripcion']?></td>
    <td width="15"><a href="modificar.php?cod=<?php echo $d['codetapa']?>" class="" title="Modificar" rel="<?php echo $d['codetapa']?>"><i class="icon-pencil"></i></a></td>
    <td width="15"><a href="eliminar.php" class="eliminar" title="Eliminar" rel="<?php echo $d['codetapa']?>"><span class="icon-trash"></span></a></td>
</tr>
<?php    
}
?>
</table>