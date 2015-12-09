<?php
include_once("../../login/check.php");

include_once("../../class/pedido.php");
$pedido=new pedido;
$p=$pedido->mostrarTodoRegistro("codpedido=".$_GET['cpe'],1,"");
$p=array_shift($p);
                
include_once("../../class/pedidodetalle.php");
$pedidodetalle=new pedidodetalle;
$dat=$pedidodetalle->mostrarTodoRegistro("codpedidodetalle=".$_GET['cpd'],1,"");
$dat=array_shift($dat);

include_once("../../class/producto.php");
$producto=new producto;
$pro=$producto->mostrarTodoRegistro("",1,"nombre,codigo,unidad");

$pro=$producto->mostrarTodoRegistro("codproducto=".$dat['codproducto']);
$pro=array_shift($pro);

include_once("../../class/productomateriaprima.php");
$productomateriaprima=new productomateriaprima;

include_once("../../class/productoetapa.php");
$productoetapa=new productoetapa;

include_once("../../class/pedidoetapa.php");
$pedidoetapa=new pedidoetapa;

include_once("../../class/etapa.php");
$etapa=new etapa;
$eta=$etapa->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$mat=$materiaprima->mostrarTodoRegistro("",1,"nombre");

$titulo="Ver Control de Producción";
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
                <input type="hidden" name="codpedido" value="<?php echo $_GET['cpe']?>">
                <table class="tabla table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre Cliente</th>
                            <th>C.I. Cliente</th>
                            <th>Celular Cliente</th>
                            <th>Fecha de Pedido</th>
                            <th>Fecha Estimada de Entrega</th>
                            <th>Fecha Estimada de Entrega Real</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><input type="text" name="nombrecliente"  class="input-medium" placeholder="" value="<?php echo $p['nombrecliente']?>"></td>
                        <td><input type="text" name="cicliente"  class="input-small" maxlength="12" value="<?php echo $p['cicliente']?>"></td>
                        <td><input type="text" name="celularcliente"  class="input-small" maxlength="12" value="<?php echo $p['celularcliente']?>"></td>
                        <td><?php echo fecha2Str($p['fecha'])?> <?php echo hora2Str($p['hora'])?></td>
                        <td><input type="date" name="fechaentregaestimada"  class="input-medium" required value="<?php echo $p['fechaentregaestimada']?>"></td>
                        <td><input type="date" name="fechaentregareal"  class="input-medium"  value=""></td>
                    </tr>
                    <tr>
                        <td>Estado<br>
                            <select class="input-medium" name="estado"><option value="0" <?php echo $p['estado']=="0"?'selected="selected"':''?>>Producción</option><option value="1" <?php echo $p['estado']=="1"?'selected="selected"':''?>>Concluido</option></select>
                        </td>
                        <td colspan="5">
                            Detalle
                            <br>
                            <textarea name="detalle" cols="850" style="width:680px;height:100px"><?php echo $p['detalle']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="56">
                            <input type="submit" class="btn btn-primary" value="Modificar Datos" id="pedido">
                            <a href="verpedido.php?codpedido=<?php echo $_GET['cpe']?>" class="btn">Volver al Pedido</a>
                        </td>
                    </tr>
                </table>
                </form>
                <br>
                <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr><th width="15">Nº</th><th width="50">Código</th><th>Producto</th><th width="50">Cant.</th><th width="100">Unidad</th><th width="100">Tiempo Producción</th></tr>
                </thead>
                <tr>
                     <td class="der"><?php echo $i?></td>
                    <td><?php echo $pro['codigo']?></td>
                    <td><?php echo $pro['nombre']?></td>
                    <td class="der"><?php echo $dat['cantidad']?></td>
                    <td><?php echo $pro['unidad']?></td>
                    <td><?php echo $pro['tiempoproduccion']?></td>
                </tr>       
                </table>
                
                
                
                <?php
                $promat=$productomateriaprima->mostrarTodoRegistro("codproducto=".$dat['codproducto']);
                ?>
                <table class="table table-bordered table-striped table-hover tablanoancha enlinea">
                <thead>
                    <tr><th colspan="5">Materia Prima</th></tr>
                </thead>
                
                <tr class="default">
                    <td class="resaltar der" width="15">Nº</td>
                    <td class="resaltar">Nombre</td>
                    <td class="resaltar"  width="25">Cant.</td>
                    <td class="resaltar" width="60">Unidad</td>
                    <td class="resaltar" width="25">Total</td>
                    
                </tr>
                    <?php foreach($promat as $pm){$i++;
                        $mp=$materiaprima->mostrarTodoRegistro("codmateriaprima=".$pm['codmateriaprima']);
                        $mp=array_shift($mp);
                        $totales[$pm['codmateriaprima']]['totales']+=$pm['cantidad']*$d['cantidad'];
                        ?>
                        <tr>
                        <td class="der"><?php echo $i?></td>
                        <td><?php echo $mp['nombre']?></td>
                        <td class="der"><?php echo $pm['cantidad']?></td>
                        <td><?php echo $mp['unidad']?></td>
                        <td class="der resaltar"><?php echo $pm['cantidad']*$dat['cantidad']?></td>
                        </tr>
                    <?php }?>
                </table>
                <?php
                $proet=$productoetapa->mostrarTodoRegistro("codproducto=".$dat['codproducto']);
                $totaletapas=count($proet);
                $pedet=$pedidoetapa->mostrarTodoRegistro("codpedidodetalle=".$dat['codpedidodetalle']);
                $etapasrealizadas=count($pedet);
                $porcentaje=$etapasrealizadas*100/$totaletapas;
                $porcentaje=round($porcentaje,2);
                ?>
                <a name="etapa"></a>
                <table class="table table-bordered table-striped table-hover tablanoancha enlinea">
                <thead>
                    <tr><th colspan="3">Etapas</th></tr>
                </thead>
                    <tr>
                        <td class="resaltar der" colspan="3">
                        <div class="progress progress-striped active" style="margin-bottom:5px;">
                            <div class="bar" style="width: <?php echo $porcentaje?>%"></div>
                        </div>
                        Progreso: <?php echo $etapasrealizadas;?> de <?php echo $totaletapas?> (<?php echo $porcentaje?>%)
                        </td>
                    </tr>
                    <tr class="resaltar">
                        <td width="15">Nº</td><td>Etapa</td><td></td>
                    </tr>
                    <?php 
                    $i=0;
                    foreach($pedet as $pe){$i++;
                    $et=$etapa->mostrarTodoRegistro("codetapa=".$pe['codetapa'],1,"");
                    $et=array_shift($et);
                    ?>
                    <tr class="">
                        <td class="der"><?php echo $i;?></td>
                        <td><?php echo $et['codigo'];?>-<?php echo $et['nombre'];?></td>
                        <td><a href="etapa/eliminar.php?cpe=<?php echo $pe['codpedidoetapa']?>&codpedidodetalle=<?php echo $_GET['cpd']?>&codpedido=<?php echo $_GET['cpe']?>&codproducto=<?php echo $_GET['cpro']?>" class="eliminar" title="Eliminar" rel="<?php echo $pe['codpedidoetapa']?>"><span class="icon-trash"></span></a></td>
                    </tr>
                    <?php    
                    }?>
                    <tr>
                        <td colspan="3">
                        <form action="etapa/guardaretapa.php" method="post">
                        <input type="hidden" name="codproducto" value="<?php echo $_GET['cpro']?>">
                        <input type="hidden" name="codpedido" value="<?php echo $_GET['cpe']?>">
                        <input type="hidden" name="codpedidodetalle" value="<?php echo $_GET['cpd']?>">
                        Etapa:<br>
                        <select name="codetapa">
                            <?php foreach($proet as $proe){
                               $et=$etapa->mostrarTodoRegistro("codetapa=".$proe['codetapa'],1,"");
                    $et=array_shift($et);  
                                $veripedetapa=$pedidoetapa->mostrarTodoRegistro("codetapa=".$et['codetapa']." and codproducto=".$_GET['cpro']." and codpedidodetalle=".$_GET['cpd']." and codpedido=".$_GET['cpe']);
                                if(count($veripedetapa)==0){
                                ?>
                            <option value="<?php echo $et['codetapa']?>"><?php echo $et['codigo'];?>-<?php echo $et['nombre'];?></option>
                            <?php 
                                }
                                }?>
                        </select>     
                        <br>
                        <input type="submit" value="Guardar" class="btn btn-info">
                        </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>