<?php
include_once("../../login/check.php");
$cod=$_GET['cod'];
include_once("../../class/producto.php");
$producto=new producto;
$dat=$producto->mostrarTodoRegistro(" codproducto='$cod'",1,"");
$dat=array_shift($dat);


include_once("../../class/etapa.php");
$etapa=new etapa;
$eta=$etapa->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$mat=$materiaprima->mostrarTodoRegistro("",1,"nombre");

$titulo="Modificar Producto";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript">
$(document).on("ready",function(){
    $("#agregaretapa").click(function(e) {
        e.preventDefault();
        var codproducto=$("[name=codproducto]").val();
        var codetapa=$("#codetapa").val();
        $.post("agregaretapa.php",{codetapa:codetapa,"codproducto":codproducto},function(){
        listaretapas();    
        });
    });
    $(document).on("click",".eliminaretapa",function(e){
        e.preventDefault();
        if(confirm("¿Esta seguro que desea Eliminar Registro?")){
            var cod=$(this).attr("rel");
            $.post("eliminaretapa.php",{'cod':cod},function(data){
                 listaretapas(); 
            });
        }
 
    })
    $("#agregarmateriaprima").click(function(e) {
        e.preventDefault();
        
        var codproducto=$("[name=codproducto]").val();
        var codmateriaprima=$("#codmateriaprima").val();
        var cantidadmateriaprima=$("#cantidadmateriaprima").val();
        $.post("agregarmateriaprima.php",{"codmateriaprima":codmateriaprima,"codproducto":codproducto,"cantidad":cantidadmateriaprima},function(){
            listarmateriaprima();    
        });
    });
    $(document).on("click",".eliminarmateriaprima",function(e){
        e.preventDefault();
        if(confirm("¿Esta seguro que desea Eliminar Registro?")){
            var cod=$(this).attr("rel");
            $.post("eliminarmateriaprima.php",{'cod':cod},function(data){
                 listarmateriaprima(); 
            });
        }
 
    })
    listaretapas();
    listarmateriaprima(); 
});
function listaretapas(){
    var codproducto=$("[name=codproducto]").val();
    $.post("listaretapas.php",{'codproducto':codproducto},function(data){
        $(".listadoetapas").html(data)
    });
}
function listarmateriaprima(){
    var codproducto=$("[name=codproducto]").val();
    $.post("listarmateriaprima.php",{'codproducto':codproducto},function(data){
        $(".listadomateriaprima").html(data)
    });
}
</script>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE PRODUCTO</h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="actualizar.php">
                <input name="codproducto" value="<?php echo $cod?>" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">CÓDIGO</td>
                        <td><input type="text" name="codigo" id="codigo" class="input-large" autofocus value="<?php echo $dat['codigo']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">NOMBRE</td>
                        <td><input type="text" name="nombre" id="nombre" class="input-large" value="<?php echo $dat['nombre']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">UNIDAD</td>
                        <td><input type="text" name="unidad" id="unidad" class="input-large" value="<?php echo $dat['unidad']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">TIEMPO DE PRODUCCIÓN</td>
                        <td><input type="text" name="tiempoproduccion" id="tiempoproduccion" class="input-large" value="<?php echo $dat['tiempoproduccion']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">DESCRIPCION</td>
                        <td><textarea cols="80" rows="5" name="descripcion" class="input-xxlarge" id="descripcion"><?php echo $dat['descripcion']?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="submit" name="guardar" value="GUARDAR" class="btn btn-primary"/>
                        <input type="reset" name="limpiar" value="LIMPIAR" class="btn"/>
                        </td>
                    </tr>
                </table>
        </form>
    </div><!--widgetcontent-->
</div><!--widget--><!--widget-->
<div class="row-fluid">
    <div class="span6">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Etapas </h4>
            <div class="widgetcontent wc1" id="respuestaformulario">
                Etapa:
                <select class="input-large" id="codetapa">
                <?php foreach($eta as $et){?>
                <option value="<?php echo $et['codetapa']?>"><?php echo $et['nombre']?> - <?php echo $et['codigo']?></option>
                <?php }?>
                </select>
                <a href="#" id="agregaretapa" class="btn btn-primary">Agregar</a>
                <div class="listadoetapas"></div>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Materia Prima </h4>
            <div class="widgetcontent wc1" id="respuestaformulario">
                <table class="tabla">
                    <tr><th>Materia Prima</th><th>Cantidad</th></tr>
                    <tr>
                        <td>
                        <select class="input-large" id="codmateriaprima">
                        <?php foreach($mat as $m){?>
                        <option value="<?php echo $m['codmateriaprima']?>"><?php echo $m['nombre']?> - Cod:<?php echo $m['codigo']?>, Unidad:<?php echo $m['unidad']?></option>
                        <?php }?>
                        </select>
                        </td>
                        <td>
                        <input type="number" value="0" min="0" id="cantidadmateriaprima"  class="input-small der">
                        </td>
                        <td><a href="#" id="agregarmateriaprima" class="btn btn-primary">Agregar</a></td>
                    </tr>
                </table>
                <div class="listadomateriaprima"></div>   
            </div>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>