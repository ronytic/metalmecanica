<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/usuario.php");
$usuario=new usuario;

extract($_POST);
  $usu=$usuario->mostrarTodoRegistro("nombre LIKE '$nombre%' and paterno LIKE '$paterno%' and nivel LIKE '$nivel' and nivel!=1","1","paterno,materno,nombre");
?>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>N</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Nombres</th>
            <th>C.I.</th>
            <th>Celular</th>
            <th>Nivel</th>
            <th>Cargo</th>
        </tr>
    </thead>
<?php foreach($usu as $u){$i++;
switch($u['nivel']){
    case 2:{$nivel="Administrador";}break;    
    case 3:{$nivel="Gerente";}break;    
    case 4:{$nivel="Productor";}break;    
    
}
  ?>
  <tr>
    <td class="der"><?php echo $i?></td>
    <td><?php echo $u['paterno']?></td>
    <td><?php echo $u['materno']?></td>
    <td><?php echo $u['nombre']?></td>
    <td><?php echo $u['ci']?></td>
    <td><?php echo $u['celular']?></td>
    <td><?php echo $nivel?></td>
    <td><?php echo $u['cargo'];?></td>
    <td width="15"><a href="modificar.php?codusuarios=<?php echo $u['codusuarios']?>" class="modificar"><i class="icon-pencil"></i></a>
    </td>
    <td width="15">
    <a href="eliminar.php" rel="<?php echo $u['codusuarios']?>" class=" eliminar"><span class="icon-trash"></span></a></td>
  </tr>
  <?php  
    }
?>    
</table>
