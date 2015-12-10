<?php
include_once("../../login/check.php");
$folder="../../";
$nivel=array(2=>"Administrador","3"=>"Gerente","4"=>"Productor");


$titulo="Listado de Usuarios";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/busqueda.js"></script>
<script language="javascript">
$(document).on("ready",function(){
    $(document).on("click",".eliminar",function(e){
        e.preventDefault();
        if(confirm("¿Esta Seguro de Eliminar este usuario?")){
            var codusuarios=$(this).attr("rel")
            $.post("eliminar.php",{"codusuarios":codusuarios},function(data){
               $(".formulario").submit();
            });
        }
    }) 
    $(document).on("click",".modificar",function(e){
        if(!confirm("¿Desea Modificar este Usuario?")){
            e.preventDefault();
        }
    })   
})
</script>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Criterio de Búsqueda</h4>
    <div class="widgetcontent wc1">
        <form class="formulario" method="post" action="buscar.php">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Nivel de Usuario</th>
                    <th></th>
                </tr>
            </thead>
            <tr>
                <td>
                <label>

                    <input type="text" class="form-control input-ls" name="nombre" autofocus size="20">
                </label>
                </td>
                <td>
                <label>

                    <input type="text" class="form-control input-ls" name="paterno" autofocus size="20">
                </label>
                </td>
                <td>
                <select name="nivel"  class="form-control">
                <option value="%">Todos</option>
               <?php foreach($nivel as $k=>$v){?>
                <option value="<?php echo $k?>"><?php echo $v?></option>   
               <?php }?>
               </select>
                </td>
                <td><br>
                    <input type="submit" value="Buscar" class="btn btn-blue">
                </td>
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