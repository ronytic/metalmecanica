<?php
include_once("../../login/check.php");
$titulo="Listar Stock de Salida de Productos";
include_once("../../class/producto.php");
$producto=new producto;
$prod=$producto->mostrarTodoRegistro("",1,"nombre,codigo");
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
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
                        <th>PRODUCTO</th>
                        <th>FECHA DE SALIDA</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tr>
                    <td><select name="codproducto" id="codproducto" class="input-xl" autofocus>
                            <option value="%">Todos</option>
                            <?php foreach($prod as $m){?>
                            <option value="<?php echo $m['codproducto']?>"><?php echo $m['nombre']?> - <?php echo $m['codigo']?> - <?php echo $m['unidad']?></option>
                            <?php }?>
                        </select></td>
                    <td><input type="date" name="fechasalida" value="<?php echo date("Y-m-d")?>" required></td>
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