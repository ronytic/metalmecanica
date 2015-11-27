<?php
session_start();
$dir=dirname(__FILE__).DIRECTORY_SEPARATOR."../";
define("RAIZ",$dir);
include_once(RAIZ."configuracion.php");
if(!(isset($_SESSION["LoginSistema"]) && $_SESSION['LoginSistema']==1)){
	include_once(RAIZ."funciones/url.php");
	header("Location:".url_base().$directory."login/?u=".$_SERVER['PHP_SELF']);
}else{
	include_once(RAIZ."funciones/funciones.php");	
}
?>