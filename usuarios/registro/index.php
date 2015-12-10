<?php
include_once("../../login/check.php");
$folder="../../";

$nivel=array(2=>"Administrador","3"=>"Gerente","4"=>"Productor");

$titulo="Nuevo Usuario";
include_once($folder."cabecerahtml.php");

?>
<script language="javascript">

</script>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">Datos del Nuevo Usuario </h4>
        <div class="widgetcontent wc1">
        <form class="" method="post" action="guardar.php" enctype="multipart/form-data" autocomplete="off">
        <table class="table table-bordered">
            <tr>
                <td>Usuario:</td>
                <td><input type="text" class="form-control input-ls" name="usuario" autofocus size="50" autocomplete="off" value="" required></td>
                <td>Contraseña:</td>
                <td><input type="password" class="form-control input-ls" name="password"  size="50" required></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" class="form-control input-ls" name="nombre"  size="50" required></td>
                <td> Apellido Paterno:</td>
                <td><input type="text" class="form-control input-ls" name="paterno"  size="50" required></td>
            </tr>
            <tr>
                <td>Apellido Materno:</td>
                <td><input type="text" class="form-control input-ls" name="materno"  size="50"></td>
                <td> C.I.:</td>
                <td><input type="text" class="form-control input-ls" name="ci"  size="50"></td>
            </tr>
            <tr>
                <td>Dirección:</td>
                <td><input type="text" class="form-control input-ls" name="direccion"  size="50"></td>
                <td>Teléfono:</td>
                <td><input type="text" class="form-control input-ls" name="telefono"  size="50"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" class="form-control input-ls" name="email"  size="50"></td>
                <td>Celular:</td>
                <td><input type="text" class="form-control input-ls" name="celular"  size="50" required></td>
            </tr>
            <tr>
                <td>Cargo:</td>
                <td><input type="text" class="form-control input-ls" name="cargo"  size="50"></td>
                <td>Nivel de Usuario:</td>
                <td><select name="nivel"  class="form-control">
                   <?php foreach($nivel as $k=>$v){?>
                    <option value="<?php echo $k?>"><?php echo $v?></option>   
                   <?php }?>
                   </select>
               </td>
            </tr>
            <tr>
                <td>Observación:</td>
                <td><textarea class="form-control input-ls" name="obs" cols="50" rows="5"></textarea></td>
            </tr>
        </table>
       
        <input type="submit" value="Guardar" class="btn btn-info">
        </form>
    </div>
</div>

<?php include_once($folder."pie.php");?>