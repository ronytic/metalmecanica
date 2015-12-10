<?php
include_once("../../login/check.php");

include_once("../../class/inventario.php");
$inventario=new inventario;

include_once("../../class/inventariosalida.php");
$inventariosalida=new inventariosalida;

include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;

include_once("../../class/pedidotemporal.php");
$pedidotemporal=new pedidotemporal;
$dat=$pedidotemporal->mostrarTodoRegistro("",1,"");

include_once("../../class/productomateriaprima.php");
$productomateriaprima=new productomateriaprima;

include_once("../../class/pedido.php");
$pedido=new pedido;
include_once("../../class/pedidodetalle.php");
$pedidodetalle=new pedidodetalle;
extract($_POST);
$valores=array("nombrecliente"=>"'$nombrecliente'",
                "cicliente"=>"'$cicliente'",
                "celularcliente"=>"'$celularcliente'",
                "fechaentregaestimada"=>"'$fechaentregaestimada'",
            );
$pedido->insertarRegistro($valores);
$codpedido=$pedido->ultimo();
foreach($dat as $d){$i++;
    $valores=array("codpedido"=>"'$codpedido'",
                "codproducto"=>"'".$d['codproducto']."'",
                "cantidad"=>"'".$d['cantidad']."'",
            );
    $pedidodetalle->insertarRegistro($valores);
    $codpedidodetalle=$pedidodetalle->ultimo();
    $promatpri=$productomateriaprima->mostrarTodoRegistro("codproducto=".$d['codproducto'],1,"");
    
    foreach($promatpri as $pmp){
        $cantidadproducto=$d['cantidad']*$pmp['cantidad'];
        //echo $cantidadproducto;
        /*echo "<pre>";
        print_r($pmp);    
        echo "</pre>";*/
        /*Comienza a Descontar*/
        $inv=$inventario->SumaTotal($pmp['codmateriaprima']);
	    $inv=array_shift($inv);
        
        $totalproducto=$inv['cantidadstocktotal'];
        $cantidad=$cantidadproducto;
        $fechasalida=date("Y-m-d");
        
        if($totalproducto<$cantidad){
            $mensaje[]="No Existe en Inventario la Cantidad que Solicita<hr><strong><br>Nombre Producto: $nombreproducto<br>Cantidad de Inventario: $totalproducto<br>Cantidad de Solicitada: $cantidad</strong>";
        }else{
            $inventario->campos=array("*");
            foreach($inventario->mostrarTodoRegistro("codmateriaprima=".$pmp['codmateriaprima']." and cantidadstock>0",1,"fecha") as $inv){
                if((float)$cantidad<=(float)$inv['cantidadstock']){
                    //echo "Si";
                    $mensaje[]="La Salida del producto <b>".mb_strtoupper($nombreproducto,"utf8")." </b>se registro correctamente";
                    
                    $cantidad=$inv['cantidadstock']-$cantidad;
                    $valores=array("cantidadstock"=>"$cantidad","fechasalida"=>"'$fechasalida'");
                    $inventario->actualizarRegistro($valores,"codinventario=".$inv["codinventario"]);
                    
                     $valores=array("codmateriaprima"=>"'".$pmp['codmateriaprima']."'",
                        "codproducto"=>"'".$d['codproducto']."'",
                        "codpedido"=>"'".$codpedido."'",
                        "codpedidodetalle"=>"'".$codpedidodetalle."'",
                        "cantidad"=>"'".$cantidadproducto."'",
                        "fechasalida"=>"'".$fechasalida."'",
                    );
                    /*echo "<pre>";
                    print_r($valores);    
                    echo "</pre>";*/
                    $inventariosalida->insertarRegistro($valores);
                    break;	
                }else{
                    $cantidad=$cantidad-$inv['cantidadstock'];
                    $valores=array("cantidadstock"=>0,"fechasalida"=>"'$fechasalida'");
                    $inventario->actualizarRegistro($valores,"codinventario=".$inv["codinventario"]);
                }
            }
        }
        /*Fin de Descontar Inventario*/
    }
    
}
$pedidotemporal->vaciar();

include_once("../../class/pedidopendiente.php");
$pedidopendiente=new pedidopendiente;
$dat=$pedidopendiente->eliminarRegistro("codpedidopendiente=".$codpedidopendiente);


/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
//exit();
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Mensaje de Confirmación</h4>
        <div class="widgetcontent wc1">
            <h5>Su PEDIDO se Registro Correctamente</h5>
            <br>
            <a href="./" class="btn btn-primary">NUEVO PEDIDO</a>
            <a href="listar.php" class="btn btn-default">LISTAR PEDIDOS</a>
        </div>
</div>
<?php include_once($folder."pie.php");?>