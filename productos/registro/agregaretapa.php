<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/productoetapa.php");
$productoetapa=new productoetapa;
$valores=array("codproducto"=>"'$codproducto'",
                "codetapa"=>"'$codetapa'",
            );
$productoetapa->insertarRegistro($valores);
?>