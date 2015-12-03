<?php
include_once("../../login/check.php");
$titulo="Salida de Productos";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="../../js/busqueda.js"></script>
<script language="javascript" type="text/javascript">
var linea=0
$(document).on("ready",function(){
	function aumentar(){
		$.post("aumentar.php",{l:linea},function(data){
			$("#marca").before(data);
			linea++;
		});
	}
	linea++;
	aumentar();
	$("#aumentar").click(function(e) {
		e.preventDefault();
        aumentar();
    });
    $(document).on("change",".codproducto",function(e){
        var rel=$(this).attr("rel")
        var maxi=$(".codproducto[rel="+rel+"]>option:selected").attr("rel-max")
        $(".cantidad[rel="+rel+"]").attr("max",maxi);
    });
});
</script>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Registro de Salida de Productos</h4>
    <div class="widgetcontent wc1">
        <form action="guardar.php" method="post">
            <table class="tabla table table-inverse table-bordered">
                <thead>
                    <tr>
                        <th>N</th>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>FECHA DE SALIDA</th>
                        <th>OBSERVACIÓN</th>
                    </tr>
                </thead>
                <tr id="marca">
                    <td colspan="2"><a href="#" class="btn btn-xs" id="aumentar">Aumentar</a></td>
                    <td colspan="3"><input type="submit" value="Guardar" class="btn btn-info"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include_once($folder."pie.php");?>