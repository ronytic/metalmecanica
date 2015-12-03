<?php
$l=$_POST['l'];
include_once("../../class/producto.php");
$producto=new producto;
$prod=$producto->mostrarTodoRegistro("",1,"nombre,codigo");
include_once("../../class/stock.php");
$stock=new stock;
?>
<tr>
    <td><?php echo $l?></td>
    <td>
        <select name="p[<?php echo $l?>][codproducto]" class="codproducto input-xl" rel="<?php echo $l?>">
            <option value="">Ninguno</option>
            <?php foreach($prod as $m){
                $stock->campos=array("sum(cantidadstock) as cantidadstock");
                $st=$stock->mostrarTodoRegistro("codproducto=".$m['codproducto'],1,"");
                $st=array_shift($st);
                $cantidad=$st['cantidadstock'];
                ?>
            <option value="<?php echo $m['codproducto']?>" rel-max="<?php echo $cantidad?>"><?php echo $m['nombre']?> - <?php echo $m['codigo']?> - <?php echo $m['unidad']?>, Cant: <?php echo $cantidad?></option>
            <?php }?>
        </select>
    </td>
    <td>
        <input type="number" name="p[<?php echo $l?>][cantidad]" value="0" min="0" class="input-medium der cantidad" rel="<?php echo $l?>">
    </td>
    <td>
        <input type="date" name="p[<?php echo $l?>][fechasalida]" value="<?php echo date("Y-m-d")?>" required class="input-medium">
    </td>
    <td>
        <input type="text" name="p[<?php echo $l?>][observacion]" class="input-medium">
    </td>
</tr>
