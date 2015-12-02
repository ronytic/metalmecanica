<?php
include_once("../../login/check.php");
$titulo="Nueva Etapa";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE ETAPA </h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="guardar.php">
                <input name="opcion" value="Nuevo" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">CÓDIGO DE LA ETAPA</td>
                        <td><input type="text" name="codigo" id="codigo" class="input-large" autofocus/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">NOMBRE DE LA ETAPA</td>
                        <td><input type="text" name="nombre" id="nombre" class="input-large" /></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">DESCRIPCIÓN</td>
                        <td><input type="text" name="descripcion" id="descripcion" class="input-large" /></td>
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