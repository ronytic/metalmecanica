<?php
include_once("../../login/check.php");
include_once("../../class/pedidotemporal.php");
extract($_POST);
$pedidotemporal=new pedidotemporal;
$valores=array("codproducto"=>"'$codproducto'",
                "cantidad"=>"'$cantidad'",
            );
$pedidotemporal->insertarRegistro($valores);
?>