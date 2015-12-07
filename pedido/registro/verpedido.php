<?php
include_once("../../login/check.php");

include_once("../../class/pedido.php");
$pedido=new pedido;
$p=$pedido->mostrarTodoRegistro("codpedido=".$_GET['codpedido'],1,"");
$p=array_shift($p);
                
include_once("../../class/pedidodetalle.php");
$pedidodetalle=new pedidodetalle;
$dat=$pedidodetalle->mostrarTodoRegistro("codpedido=".$_GET['codpedido'],1,"");

include_once("../../class/producto.php");
$producto=new producto;
$pro=$producto->mostrarTodoRegistro("",1,"nombre,codigo,unidad");


include_once("../../class/productomateriaprima.php");
$productomateriaprima=new productomateriaprima;

include_once("../../class/etapa.php");
$etapa=new etapa;
$eta=$etapa->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$mat=$materiaprima->mostrarTodoRegistro("",1,"nombre");

$titulo="Ver Pedido";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>

<?php include_once($folder."cabecera.php");?>
<div class="row-fluid">
    <div class="span12">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Registro </h4>
            <div class="widgetcontent wc1">
                <form id="formulario" method="post" action="actualizar.php">
                <input type="hidden" name="codpedido" value="<?php echo $_GET['codpedido']?>">
                <table class="tabla table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre Cliente</th>
                            <th>C.I. Cliente</th>
                            <th>Celular Cliente</th>
                            <th>Fecha Estimada de Entrega</th>
                            <th>Fecha Estimada de Entrega Real</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><input type="text" name="nombrecliente"  class="input-medium" placeholder="" value="<?php echo $p['nombrecliente']?>"></td>
                        <td><input type="text" name="cicliente"  class="input-small" maxlength="12" value="<?php echo $p['cicliente']?>"></td>
                        <td><input type="text" name="celularcliente"  class="input-small" maxlength="12" value="<?php echo $p['celularcliente']?>"></td>
                        <td><input type="date" name="fechaentregaestimada"  class="input-medium" required value="<?php echo $p['fechaentregaestimada']?>"></td>
                        <td><input type="date" name="fechaentregareal"  class="input-medium"  value=""></td>
                        <td><select class="input-small" name="estado"><option value="0" <?php echo $p['estado']=="0"?'selected="selected"':''?>>Producción</option><option value="1" <?php echo $p['estado']=="1"?'selected="selected"':''?>>Concluido</option></select></td>
                    </tr>
                    <tr>
                        <td colspan="56">
                            <input type="submit" class="btn btn-primary" value="Modificar Datos" id="pedido">
                            <a href="listar.php" class="btn">Listar Pedidos</a>
                        </td>
                    </tr>
                </table>
                </form>
                <br>
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
                    <td width="15"></td>
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
                <h2 class="subtitle">Total Materia Prima Utilizada</h2>
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
                <tr><th width="15">Nº</th><th width="50">Código</th><th>Producto</th><th>Unidad</th><th width="100">Total a Usar</th></tr>
                </thead>
                <?php foreach($totales as $codmateriaprima=>$v){$i++;
                 $mp=$materiaprima->mostrarTodoRegistro("codmateriaprima=".$codmateriaprima);
                 $mp=array_shift($mp);

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
                </tr>
                <?php }?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>