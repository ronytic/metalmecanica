<?php
include_once("../../login/check.php");
$cod=$_GET['cod'];
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$dat=$proveedor->mostrarTodoRegistro(" codproveedor='$cod'",1,"");
$dat=array_shift($dat);
$titulo="Modificar Proveedor";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE PROVEEDOR </h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="actualizar.php">
                <input name="codproveedor" value="<?php echo $cod?>" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">NOMBRE DE LA EMPRESA</td>
                        <td><input type="text" name="nombreempresa" id="nombreempresa" class="input-large" autofocus value="<?php echo $dat['nombreempresa']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">DIRECCION DE LA EMPRESA</td>
                        <td><input type="text" name="direccion" id="direccion" class="input-large" value="<?php echo $dat['direccion']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">EMAIL</td>
                        <td><input type="text" name="email" id="email" class="input-large" value="<?php echo $dat['email']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">TELEFONO</td>
                        <td><input type="text" name="telefono" id="telefono" class="input-large" value="<?php echo $dat['telefono']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">REFERENTE</td>
                        <td><input type="text" name="referente" id="referente" class="input-large" value="<?php echo $dat['referente']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">MATERIA PRIMA</td>
                        <td><input type="text" name="materiaprima" id="materiaprima" class="input-large" value="<?php echo $dat['materiaprima']?>"/></td>
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