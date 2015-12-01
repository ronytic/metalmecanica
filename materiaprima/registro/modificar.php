<?php
include_once("../../login/check.php");
$cod=$_GET['cod'];
include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$dat=$materiaprima->mostrarTodoRegistro(" codmateriaprima='$cod'",1,"");
$dat=array_shift($dat);
$titulo="Modificar Materia Prima";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE MATERIA PRIMA </h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="actualizar.php">
                <input name="codmateriaprima" value="<?php echo $cod?>" type="hidden">
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
<?php include_once($folder."pie.php");?>