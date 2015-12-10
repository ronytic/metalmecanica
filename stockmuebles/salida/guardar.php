<?php
include_once("../../login/check.php");
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
include_once("../../class/stocksalida.php");
$stocksalida=new stocksalida;
include_once("../../class/stock.php");
$stock=new stock;
include_once("../../class/producto.php");
$producto=new producto;
extract($_POST);
foreach($p as $r){
    /*echo "<pre>";
    print_r($r);
    echo "</pre>";
    echo "<hr>";*/
    $codproducto=$r['codproducto'];
    
    $pr=array_shift($producto->mostrarTodoRegistro("codproducto=".$codproducto));
	$nombreproducto=$pr['nombre'];
    
    $inv=$stock->sumarTotalProducto($r['codproducto']);
	$inv=array_shift($inv);
    
    
	$totalproducto=$inv['cantidadtotalstock'];
    $cantidad=$r['cantidad'];
    $fechasalida=$r['fechasalida'];
    
    if($totalproducto<$cantidad){
		$mensaje[]="No Existe en Inventario la Cantidad que Solicita<hr><strong><br>Nombre Producto: $nombreproducto<br>Cantidad de Inventario: $totalproducto<br>Cantidad de Solicitada: $cantidad</strong>";
	}else{
        $stock->campos=array("*");
		foreach($stock->mostrarTodoRegistro("codproducto=$codproducto and cantidadstock>0",1,"fecha") as $inv){
            if((float)$cantidad<=(float)$inv['cantidadstock']){
				$mensaje[]="La Salida del producto <b>".mb_strtoupper($nombreproducto,"utf8")." </b>se registro correctamente";
				
				$cantidad=$inv['cantidadstock']-$cantidad;
				$valores=array("cantidadstock"=>"$cantidad","fechasalida"=>"'$fechasalida'");
				$stock->actualizarRegistro($valores,"codstock=".$inv["codstock"]);
				
				 $valores=array("codproducto"=>"'".$r['codproducto']."'",
                    "cantidad"=>"'".$r['cantidad']."'",
                    "fechasalida"=>"'".$r['fechasalida']."'",
                    "observacion"=>"'".$r['observacion']."'",
                );
                $stocksalida->insertarRegistro($valores);
				break;	
			}else{
				$cantidad=$cantidad-$inv['cantidadstock'];
				$valores=array("cantidadstock"=>0,"fechasalida"=>"'$fechasalida'");
				$stock->actualizarRegistro($valores,"codstock=".$inv["codstock"]);
			}
		}
	}
}
/*echo "<pre>";
print_r($mensaje);
echo "</pre>";*/
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Mensaje de Confirmación</h4>
        <div class="widgetcontent wc1">
            <?php foreach($mensaje as $m){?>
            <h5><?php echo $m?></h5>
            <?php }?>
            <br>
            <a href="./" class="btn btn-primary">NUEVO</a>
            <a href="listar.php" class="btn btn-default">LISTAR</a>
        </div>
</div>
<?php include_once($folder."pie.php");?>