<?php
include_once("../../login/check.php");
$cod=$_GET['cod'];
include_once("../../class/inventario.php");
$inventario=new inventario;
$dat=$inventario->mostrarTodoRegistro(" codinventario='$cod'",1,"");
$dat=array_shift($dat);

include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$mat=$materiaprima->mostrarTodoRegistro("",1,"nombre,codigo");

$titulo="Modificar Inventario de Materia Prima";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE NUEVO INVENTARIO DE MATERIA PRIMA </h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="actualizar.php">
                <input name="codinventario" value="<?php echo $cod?>" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">MATERIA PRIMA</td>
                        <td><select name="codmateriaprima" id="codmateriaprima" class="input-xl" autofocus>
                            <?php foreach($mat as $m){?>
                            <option value="<?php echo $m['codmateriaprima']?>" <?php echo $m['codmateriaprima']==$dat['codmateriaprima']?'selected="selected"':''?>><?php echo $m['nombre']?> - <?php echo $m['codigo']?> - <?php echo $m['unidad']?></option>
                            <?php }?>
                        </select></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">CANTIDAD</td>
                        <td><input type="text" name="cantidad" id="cantidad" class="input-large" value="<?php echo $dat['cantidad']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">OBSERVACIÓN</td>
                        <td><textarea cols="80" rows="5" name="observacion" class="input-xxlarge" id="observacion"><?php echo $dat['observacion']?></textarea></td>
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