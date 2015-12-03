<?php
include_once("../../login/check.php");
include_once("../../class/productomateriaprima.php");
extract($_POST);
$productomateriaprima=new productomateriaprima;
$valores=array("codproducto"=>"'$codproducto'",
                "codmateriaprima"=>"'$codmateriaprima'",
                "cantidad"=>"'$cantidad'",
            );
$productomateriaprima->insertarRegistro($valores);
?>