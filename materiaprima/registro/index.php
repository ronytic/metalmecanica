<?php
include_once("../../login/check.php");
$titulo="Nueva Materia Prima";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<script language="javascript">
$(document).on("ready",function(){
    $("#unidad").keypress(function (key) {
            window.console.log(key.charCode)
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
                return false;
        });
});
</script>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE MATERIA PRIMA </h4>
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
                        <td width="200" class="der">DESCRIPCIÓN</td>
                        <td><input type="text" name="descripcion" id="descripcion" class="input-large" required/></td>
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