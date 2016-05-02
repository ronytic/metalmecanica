<?php
include_once("../../login/check.php");
$cod=$_GET['cod'];
include_once("../../class/stock.php");
$stock=new stock;
$dat=$stock->mostrarTodoRegistro(" codstock='$cod'",1,"");
$dat=array_shift($dat);

include_once("../../class/producto.php");
$producto=new producto;
$prod=$producto->mostrarTodoRegistro("",1,"nombre,codigo");

$titulo="Modificar Stock";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE STOCK </h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="actualizar.php">
                <input name="codstock" value="<?php echo $cod?>" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">PRODUCTO</td>
                        <td><select name="codproducto" id="codproducto" class="input-xl" autofocus required>
                            <?php foreach($prod as $p){?>
                            <option value="<?php echo $p['codproducto']?>" <?php echo $p['codproducto']==$dat['codproducto']?'selected="selected"':''?>><?php echo $p['nombre']?> - <?php echo $p['codigo']?> - <?php echo $p['unidad']?></option>
                            <?php }?>
                        </select></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">CANTIDAD A RECARGAR</td>
                        <td><input type="number" name="cantidad" id="cantidad" class="input-large" value="<?php echo $dat['cantidad']?>" required/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">OBSERVACIÓN</td>
                        <td><textarea cols="80" rows="5" name="observacion" class="input-xxlarge" id="observacion" required><?php echo $dat['observacion']?></textarea></td>
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