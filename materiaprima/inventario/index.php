<?php
include_once("../../login/check.php");
$titulo="Nuevo Inventario de Materia Prima";
include_once("../../class/materiaprima.php");
$materiaprima=new materiaprima;
$mat=$materiaprima->mostrarTodoRegistro("",1,"nombre,codigo");
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE NUEVO INVENTARIO DE MATERIA PRIMA </h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="guardar.php">
                <input name="opcion" value="Nuevo" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">MATERIA PRIMA</td>
                        <td><select name="codmateriaprima" id="codmateriaprima" class="input-xl" autofocus required>
                            <?php foreach($mat as $m){?>
                            <option value="<?php echo $m['codmateriaprima']?>"><?php echo $m['nombre']?> - <?php echo $m['codigo']?> - <?php echo $m['unidad']?></option>
                            <?php }?>
                        </select></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">CANTIDAD</td>
                        <td><input type="number" name="cantidad" id="cantidad" class="input-large" required/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">OBSERVACIÓN</td>
                        <td><input type="text" name="observacion" id="observacion" class="input-large"required /></td>
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