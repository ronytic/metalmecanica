<?php
include_once("../../class/pedidotemporal.php");
$pedidotemporal=new pedidotemporal;
extract($_POST);
$dat=$pedidotemporal->mostrarTodoRegistro("",1,"");

include_once("../../class/producto.php");
$producto=new producto;

include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;

include_once("../../class/productomateriaprima.php");
$productomateriaprima=new productomateriaprima;

include_once("../../class/inventario.php");
$inventario=new inventario;
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="15">Nº</th><th width="50">Código</th><th>Producto</th><th width="25">Cant.</th><th width="50">Unidad</th><th width="50">Tiempo Produc</th><th colspan="4">Materia Prima</th></tr>
</thead>
<?php
$totales=array();
foreach($dat as $d){$i++;

$pro=$producto->mostrarTodoRegistro("codproducto=".$d['codproducto']);
$pro=array_shift($pro);

$promat=$productomateriaprima->mostrarTodoRegistro("codproducto=".$d['codproducto']);


?>
<tr class="default">
    <td class="der"><?php echo $i?></td>
    <td><?php echo $pro['codigo']?></td>
    <td><?php echo $pro['nombre']?></td>
    <td class="der"><?php echo $d['cantidad']?></td>
    <td><?php echo $pro['unidad']?></td>
    <td><?php echo $pro['tiempoproduccion']?></td>
    <td class="resaltar">Nombre</td>
    <td class="resaltar"  width="25">Cant.</td>
    <td class="resaltar" width="60">Unidad</td>
    <td class="resaltar" width="25">Total</td>
    <td width="15"><a href="eliminar.php" class="eliminarproducto" title="Eliminar" rel="<?php echo $d['codpedidotemporal']?>"><span class="icon-trash"></span></a></td>
</tr>
    <?php foreach($promat as $pm){
        $mp=$materiaprima->mostrarTodoRegistro("codmateriaprima=".$pm['codmateriaprima']);
        $mp=array_shift($mp);
        $totales[$pm['codmateriaprima']]['totales']+=$pm['cantidad']*$d['cantidad'];
        ?>
        <tr>
        <td colspan="6"></td>
        <td><?php echo $mp['nombre']?></td>
        <td class="der"><?php echo $pm['cantidad']?></td>
        <td><?php echo $mp['unidad']?></td>
        <td class="der resaltar"><?php echo $pm['cantidad']*$d['cantidad']?></td>
        <td></td>
        </tr>
    <?php }?>
<?php    
}
?>
</table>
<h2 class="subtitle">Total Materia Prima</h2>
<?php
/*
echo "<pre>";
print_r($totales);
echo "</pre>";*/
$i=0;
$anular='no';
?>
<table class="table table-bordered table-striped table-hover">
<thead>
<tr><th width="15">Nº</th><th width="50">Código</th><th>Producto</th><th>Unidad</th><th width="100">Total a Usar</th><th width="100">Stock Disponible</th></tr>
</thead>
<?php foreach($totales as $codmateriaprima=>$v){$i++;
 $mp=$materiaprima->mostrarTodoRegistro("codmateriaprima=".$codmateriaprima);
 $mp=array_shift($mp);
 $inv=$inventario->SumaTotal($codmateriaprima);
 $inv=array_shift($inv);
 $totalstock=(float)$inv['cantidadstocktotal'];
 $error=$v['totales']>$totalstock?'error':'correcto';
 
 if($anular=='no'){
     if($v['totales']>$totalstock){
        $anular='si';
     }   
 }
?>
<tr class="">
    <td class="der"><?php echo $i?></td>
    <td><?php echo $mp['codigo']?></td>
    <td><?php echo $mp['nombre']?></td>
    <td><?php echo $mp['unidad']?></td>
    <td class="der"><?php echo $v['totales']?></td>
    <td class="der <?php echo $error?>"><?php echo $totalstock?></td>
</tr>
<?php }?>
</table>
<form id="formulario" method="post">
<table class="tabla table-bordered">
    <thead>
        <tr>
            <th>Nombre Cliente</th>
            <th>C.I. Cliente</th>
            <th>Celular Cliente</th>
            <th>Fecha Estimada de Entrega</th>
            <th></th>
        </tr>
    </thead>
    <tr>
        <td><input type="text" name="nombrecliente"  class="input-medium" placeholder=""></td>
        <td><input type="text" name="cicliente"  class="input-small" maxlength="12"></td>
        <td><input type="text" name="celularcliente"  class="input-small" maxlength="12"></td>
        <td><input type="date" name="fechaentregaestimada"  class="input-medium" maxlength="12" required></td>
        <td><input type="button" class="btn btn-default" value="Guardar Pedido como Pendiente" id="pendiente">
            <input type="button" class="btn btn-primary" value="Realizar Pedido" id="pedido"></td>
    </tr>
</table>

</form>
<br>
<h2 class="subtitle">Nota: Cuando realiza clic en "Guardar Pedido como Pendiente" NO se descuenta del Inventario </h2>
<h2 class="subtitle">Nota: Cuando realiza clic en  "Realizar Pedido" SE DESCONTARA LA MATERIA PRIMA DE INVENTARIO </h2>