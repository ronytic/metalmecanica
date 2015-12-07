<?php
include_once("../../login/check.php");
$titulo="Listar Pedidos";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/busqueda.js"></script>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(document).on("click",".eliminar",function(e){
        e.preventDefault();    
        if(confirm("¿Esta seguro que desea Eliminar Registro?\n Esto no revertira el Inventario de la Materia Prima")){
            var cod=$(this).attr("rel");
            $.post("eliminarpedido.php",{'cod':cod},function(data){
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
        <form action="buscarpedidos.php" method="post" class="formulario">
            <table class="tabla table-inverse table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Cliente</th>
                        <th>C.I. Cliente</th>
                        <th>Fecha Entrega Estimada</th>
                        <th>Fecha Entrega Real</th>
                        <td>Estado del Pedido</td>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tr>
                    <td><input type="text" name="nombrecliente"  class="input-medium" placeholder=""></td>
                    <td><input type="text" name="cicliente"  class="input-small" maxlength="12"></td>
                    <td><input type="date" name="fechaentregaestimada"  class="input-medium" ></td>
                    <td><input type="date" name="fechaentregareal"  class="input-medium" ></td>
                    <td><select class="input-medium" name="estado"><option value="0">Producción</option><option value="1">Concluido</option><option value="%">Todos</option></select></td>
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