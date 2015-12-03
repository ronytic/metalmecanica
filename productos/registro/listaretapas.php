<?php
include_once("../../class/productoetapa.php");
$productoetapa=new productoetapa;
extract($_POST);
$dat=$productoetapa->mostrarTodoRegistro(" codproducto LIKE '$codproducto'",1,"");
include_once("../../class/etapa.php");
$etapa=new etapa;
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="50">Nº</th><th>Código</th><th>Nombre</th></tr>
</thead>
<?php
foreach($dat as $d){$i++;
$et=$etapa->mostrarTodoRegistro("codetapa=".$d['codetapa']);
$et=array_shift($et);
?>
<tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $et['codigo']?></td>
    <td><?php echo $et['nombre']?></td>
    <td width="15"><a href="eliminar.php" class="eliminaretapa" title="Eliminar" rel="<?php echo $d['codproductoetapa']?>"><span class="icon-trash"></span></a></td>
</tr>
<?php    
}
?>
</table>