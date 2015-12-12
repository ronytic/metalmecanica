<?php
include_once("../../login/check.php");
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$mes=12;
$anio=2015;
include_once("../../class/pedidodetalle.php");
$pedidodetalle=new pedidodetalle;
include_once("../../class/producto.php");
$producto=new producto;

$pedidodetalle->campos=array("codproducto, SUM(cantidad) as cantidad");
$peddet=$pedidodetalle->getRecords("YEAR( fecha ) =  '$anio' AND MONTH( fecha ) =  '$mes' and activo=1","","codproducto");
$valores=array();
foreach($peddet as $pd){
   $pro=$producto->mostrarTodoRegistro("codproducto=".$pd['codproducto']); 
   $pro=array_shift($pro);
   $valores[$pro['nombre']]=$pd['cantidad'];   
}
//print_r($valores);
?>
<div id="container"></div>
<script type="text/javascript">
$('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Estadística de Salida de Productos'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Cantidad',
                colorByPoint: true,
                data: [
                <?php foreach($valores as $k=>$v){?>
                {
                    name: '<?php echo $k?>',
                    y: <?php echo $v?>
                },
                <?php }?>
                ]
            }]
        });
</script>