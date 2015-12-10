<?php
include_once("../../login/check.php");
$folder="../../";

$codusuarios=$_POST['codusuarios'];
include_once("../../class/usuario.php");
$usuario=new usuario;
$us=$usuario->eliminarRegistro("codusuarios=".$codusuarios);

?>