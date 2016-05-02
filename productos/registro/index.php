<?php
include_once("../../login/check.php");
$titulo="Nuevo Producto";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE PRODUCTO </h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="guardar.php">
                <input name="opcion" value="Nuevo" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">CÓDIGO</td>
                        <td><input type="text" name="codigo" id="codigo" class="input-large" autofocus required/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">NOMBRE</td>
                        <td><input type="text" name="nombre" id="nombre" class="input-large" required/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">UNIDAD</td>
                        <td><input type="text" name="unidad" id="unidad" class="input-large" required/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">TIEMPO DE PRODUCCIÓN</td>
                        <td><input type="text" name="tiempoproduccion" id="tiempoproduccion" class="input-large" required/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">DESCRIPCIÓN</td>
                        <td><input type="text" name="descripcion" id="descripcion" class="input-large" required/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="submit" name="guardar" value="GUARDAR" class="btn btn-primary" />
                        <input type="reset" name="limpiar" value="LIMPIAR" class="btn"/>
                        </td>
                    </tr>
                </table>
        </form>
    </div><!--widgetcontent-->
</div><!--widget--><!--widget-->
<?php include_once($folder."pie.php");?>