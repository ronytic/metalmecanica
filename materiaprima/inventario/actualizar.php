<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/inventario.php");
$inventario=new inventario;
$valores=array("codmateriaprima"=>"'$codmateriaprima'",
                "cantidad"=>"'$cantidad'",
                "cantidadstock"=>"'$cantidad'",
                "observacion"=>"'$observacion'",
            );
$inventario->actualizarRegistro($valores,"codinventario=".$codinventario);

$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Mensaje de Confirmación</h4>
        <div class="widgetcontent wc1">
            <h5>Sus Datos se Registraron Correctamente</h5>
            <br>
            <a href="./" class="btn btn-primary">NUEVO</a>
            <a href="listar.php" class="btn btn-default">LISTAR</a>
        </div>
</div>
<?php include_once($folder."pie.php");?>