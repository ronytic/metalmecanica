<?php
include_once("../../login/check.php");


include_once("../../class/producto.php");
$producto=new producto;
$pro=$producto->mostrarTodoRegistro("",1,"nombre,codigo,unidad");


include_once("../../class/etapa.php");
$etapa=new etapa;
$eta=$etapa->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$mat=$materiaprima->mostrarTodoRegistro("",1,"nombre");

$titulo="Nuevo Pedido";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript">
$(document).on("ready",function(){
    $("#agregarproducto").click(function(e) {
        e.preventDefault();
        
        var codproducto=$("[name=codproducto]").val();
        var cantidadproducto=$("#cantidadproducto").val();
        $.post("agregarproducto.php",{"codproducto":codproducto,"cantidad":cantidadproducto},function(){
            listarproductos();    
        });
    });
    $(document).on("click",".eliminarproducto",function(e){
        e.preventDefault();
        if(confirm("¿Esta seguro que desea Eliminar Registro?")){
            var cod=$(this).attr("rel");
            $.post("eliminarproducto.php",{'cod':cod},function(data){
                 listarproductos(); 
            });
        }
 
    })
    $(document).on("click","#pendiente",function(e){
        e.preventDefault();
        if(confirm("¿ESTA SEGURO DE GUARDAR ESTE PEDIDO COMO PENDIENTE?\n")){
            $("#formulario").attr("action","pendiente.php").submit();
        }
    }) 
    $(document).on("click","#pedido",function(e){
        e.preventDefault();
        if(confirm("¿ESTA SEGURO DE REALIZAR ESTE PEDIDO?\n SE DESCONTARA LA MATERIA PRIMA DE INVENTARIO")){
            $("#formulario").attr("action","pedido.php").submit();
        }
    })  
    listarproductos(); 
});
function listarproductos(){
    var codproducto=$("[name=codproducto]").val();
    $.post("listarproductos.php",{},function(data){
        $(".listadoproductos").html(data)
    });
}
</script>
<?php include_once($folder."cabecera.php");?>
<div class="row-fluid">
    <div class="span12">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Registro </h4>
            <div class="widgetcontent wc1">
                <table class="tabla">
                    <tr><th>Producto</th><th>Cantidad</th></tr>
                    <tr>
                        <td>
                        <select class="input-xxlarge" id="codproducto" name="codproducto">
                        <?php foreach($pro as $p){?>
                        <option value="<?php echo $p['codproducto']?>"><?php echo $p['nombre']?> - Cod:<?php echo $p['codigo']?>, Unidad:<?php echo $p['unidad']?></option>
                        <?php }?>
                        </select>
                        </td>
                        <td>
                        <input type="number" value="0" min="0" id="cantidadproducto"  class="input-small der">
                        </td>
                        <td><a href="#" id="agregarproducto" class="btn btn-primary">Agregar</a></td>
                    </tr>
                </table>
                <div class="listadoproductos"></div>   
            </div>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>