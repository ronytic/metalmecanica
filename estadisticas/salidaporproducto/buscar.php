<?php
include_once("../../login/check.php");
$codproducto=$_POST['codproducto'];
$anio=$_POST['anio'];
//$anio=2015;
include_once("../../class/pedidodetalle.php");
$pedidodetalle=new pedidodetalle;
include_once("../../class/producto.php");
$producto=new producto;
$prod=$producto->mostrarTodoRegistro("codproducto LIKE '$codproducto'");
$valores=array();
foreach($prod as $p){
    $datos=array();
    for($mes=1;$mes<=12;$mes++){
        $pedidodetalle->campos=array("codproducto, SUM(cantidad) as cantidad");
        $peddet=$pedidodetalle->getRecords("YEAR( fecha ) =  '$anio' AND MONTH( fecha ) =  '$mes' and activo=1 and codproducto=".$p['codproducto'],"","codproducto");
        $peddet=array_shift($peddet);
        $datos[$mes]=(int)$peddet['cantidad'];
    }
    $valores[$p['nombre']]=implode(",",$datos);
}
/*echo "<pre>";
print_r($valores);
echo "</pre>";*/
?>
<div id="container"></div>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Estadística Específica de Salida de Productos',
            x: -20 //center
        },
        subtitle: {
            text: 'Año: <?php echo $anio?>, <?php echo $codproducto=="%"?'Producto: Todos':''?>',
            x: -20
        },
        xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
        },
        yAxis: {
            title: {
                text: 'Cantidad de  Salida'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [
        <?php foreach($valores as $k=>$v){?>
        {
            name: '<?php echo  $k?>',
            data: [<?php echo $v?>]
        }, 
        <?php }?>
        ]
    });
});
</script>