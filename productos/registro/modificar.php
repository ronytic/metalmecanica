<?php
include_once("../../login/check.php");
$cod=$_GET['cod'];
include_once("../../class/producto.php");
$producto=new producto;
$dat=$producto->mostrarTodoRegistro(" codproducto='$cod'",1,"");
$dat=array_shift($dat);


include_once("../../class/etapa.php");
$etapa=new etapa;
$eta=$etapa->mostrarTodoRegistro("",1,"nombre");


$titulo="Modificar Producto";
$folder="../../";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="widgetbox box-inverse">
    <h4 class="widgettitle">REGISTRO DE PRODUCTO</h4>
        <div class="widgetcontent wc1">
            <form name="provedor" class="stdform" method="post" action="actualizar.php">
                <input name="codproducto" value="<?php echo $cod?>" type="hidden">
                <table class="table">
                    <tr>
                        <td width="200" class="der">CÓDIGO</td>
                        <td><input type="text" name="codigo" id="codigo" class="input-large" autofocus value="<?php echo $dat['codigo']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">NOMBRE</td>
                        <td><input type="text" name="nombre" id="nombre" class="input-large" value="<?php echo $dat['nombre']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">UNIDAD</td>
                        <td><input type="text" name="unidad" id="unidad" class="input-large" value="<?php echo $dat['unidad']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">TIEMPO DE PRODUCCIÓN</td>
                        <td><input type="text" name="tiempoproduccion" id="tiempoproduccion" class="input-large" value="<?php echo $dat['tiempoproduccion']?>"/></td>
                    </tr>
                    <tr>
                        <td width="200" class="der">DESCRIPCION</td>
                        <td><textarea cols="80" rows="5" name="descripcion" class="input-xxlarge" id="descripcion"><?php echo $dat['descripcion']?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="submit" name="guardar" value="GUARDAR" class="btn btn-primary"/>
                        <input type="reset" name="limpiar" value="LIMPIAR" class="btn"/>
                        </td>
                    </tr>
                </table>
        </form>
    </div><!--widgetcontent-->
</div><!--widget--><!--widget-->
<div class="row-fluid">
    <div class="span6">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Etapas </h4>
            <div class="widgetcontent wc1" id="respuestaformulario">
                Etapa:
                <select class="input-large" id="etapa">
                <?php foreach($eta as $et){?>
                <option value="<?php echo $et['codetapa']?>"><?php echo $et['nombre']?></option>
                <?php }?>
                </select>
                <a href="#" id="agregaretapa" class="btn btn-primary">Agregar</a>
                <div class="listadoetapas"></div>
            </div>
        </div>
    </div>
    <div class="span6">
        <div class="widgetbox box-inverse">
            <h4 class="widgettitle">Materia Prima </h4>
            <div class="widgetcontent wc1" id="respuestaformulario">
                Materia Prima:
                <select class="input-large" id="etapa">
                <?php foreach($mat as $n){?>
                <option value="<?php echo $et['codmateriaprima']?>"><?php echo $et['nombre']?></option>
                <?php }?>
                </select>
                <a href="#" id="agregaretapa" class="btn btn-primary">Agregar</a>
                <div class="listadoetapas"></div>   
            </div>
        </div>
    </div>
</div>
<?php include_once($folder."pie.php");?>