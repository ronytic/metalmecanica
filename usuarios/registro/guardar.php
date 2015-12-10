<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/usuario.php");
$usu=new usuario;
//print_r($_POST);
if(!empty($_POST)){
extract($_POST);

$valores=array("usuario"=>"'$usuario'",
                "password"=>"MD5('$password')",
                "nombre"=>"'$nombre'",
                "paterno"=>"'$paterno'",
                "materno"=>"'$materno'",
                "ci"=>"'$ci'",
                "direccion"=>"'$direccion'",
                "telefono"=>"'$telefono'",
                "email"=>"'$email'",
                "celular"=>"'$celular'",
                "cargo"=>"'$cargo'",
                "nivel"=>"'$nivel'",
                "obs"=>"'$obs'",
                );

/*echo "<pre>";
print_r($valores);
echo "</pre>";*/
$usu->insertarRegistro($valores);
$titulo="Usuarios";
}
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Mensaje de Confirmación</h4>
        <div class="widgetcontent wc1">
            <h5>Su Usuario se Registro Correctamente</h5>
            <br>
            <a href="./" class="btn btn-primary">NUEVO USUARIO</a>
            <a href="listar.php" class="btn btn-default">LISTAR</a>
        </div>
</div>
<?php include_once($folder."pie.php");?>