<?php
include_once("../../login/check.php");
$titulo="Estadística General de Salida de Productos";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/core/highcharts.js"></script>  
<script language="javascript" type="text/javascript" src="../../js/core/exporting.js"></script>    
<script language="javascript" type="text/javascript" src="../../js/busqueda.js"></script>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(document).on("click",".eliminar",function(e){
        e.preventDefault();    
        if(confirm("¿Esta seguro que desea Eliminar Registro?")){
            var cod=$(this).attr("rel");
            $.post("eliminar.php",{'cod':cod},function(data){
                $(".formulario").submit();
            });
        }
    })
})
</script>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Criterio de Búsqueda</h4>
    <div class="widgetcontent wc1">
        <form action="buscar.php" method="post" class="formulario">
            <table class="tabla table-inverse table-bordered">
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Año</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tr>
                    <td><select name="mes" class="input-small der">
                    <?php for($i=1;$i<=12;$i++){
                    ?><option value="<?php echo $i?>" class="der"><?php echo $i?></option><?php    
                    }?>
                    </select></td>
                    <td><select name="anio" class="input-small der">
                    <?php for($i=2015;$i<=date("Y");$i++){
                    ?><option value="<?php echo $i?>" class="der"><?php echo $i?></option><?php    
                    }?>
                    </select></td>
                    <td><input type="submit" value="Buscar" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Datos </h4>
    <div class="widgetcontent wc1" id="respuestaformulario">
            
    </div>
</div>
<?php include_once($folder."pie.php");?>