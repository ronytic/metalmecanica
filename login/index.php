<?php
$folder="../";
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Acceso al Sistema</title>

    <meta name="description" content="Sistema Desarrollado por Ronald Nina Layme Cel: 73230568">
		<meta name="author" content="Sistema Desarrollado por Ronald Nina Layme Cel: 73230568">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?php echo $folder?>imagenes/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="<?php echo $folder?>css/core/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/font-awesome.min.css" rel="stylesheet" />
    <!--Beyond styles-->
    <link id="beyond-link" href="<?php echo $folder?>css/core/style.default.css" rel="stylesheet" />
    <link id="beyond-link" href="<?php echo $folder?>css/core/style.navyblue.css" rel="stylesheet" />
    
    <link href="<?php echo $folder?>css/core/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body{
            background-image:url(../imagenes/fondos/<?php echo rand(1,4)?>.jpg);background-size:cover    
        }
        input[type=text],input[type=password]{
            border:#71B8EE solid 1px;    
        }
        input[type=text]:hover,input[type=password]:hover{
            border:#71B8EE solid 1px;    
        }
        input[type=text]:focus,input[type=password]:focus{
            border:#71B8EE solid 1px;    
        }
        .widgetcontent{
            text-align:center;   

        }
        .widgetcontent .logo{
            padding:5px;
        }
        .widgetcontent .logo img{
            border-radius:10px;
        }
        
    </style>
</head>
<!--Head Ends-->
<!--Body-->
<body style="">
   
<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="widgetbox box-info">
            <h2 class="widgettitle">Acceso al Sistema</h2>
            <div class="widgetcontent">
            <div class="logo animate0 bounceIn"><img src="../imagenes/general/LOGO_3.jpg" alt="" /></div>
            <form action="login.php" method="post" id="login">
                 <input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                <?php
                if(isset($_GET['incompleto'])){
                ?>
                <div class="inputwrapper animate1 bounceIn">
                    <div class="alert alert-error">Ingrese los Datos</div>
                </div>
                <?php }?>
                <?php if(isset($_GET['error'])){
                ?>
                <div class="inputwrapper animate1 bounceIn">
                    <div class="alert alert-warning">Datos Incorrectos</div>
                </div>
                <?php }?>
                <div class="inputwrapper animate1 bounceIn">
                    <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario" class="input-small"/>
                </div>
                <div class="inputwrapper animate2 bounceIn">
                    <input type="password" name="pass" id="pass" placeholder="Ingrese su contraseña" />
                </div>
                <div class="inputwrapper animate3 bounceIn">
                    <input type="submit" value="INGRESAR" class="btn btn-info">
                </div>
                
            </form>
            </div>
        </div>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; <?php echo date('Y'); ?>. MetalDugar.</p>
</div>


    <!--Basic Scripts-->
    <script src="<?php echo $folder?>js/core/jquery-1.9.1.min.js"></script>
    <script src="<?php echo $folder?>js/core/bootstrap.min.js"></script>

    <!--Beyond Scripts
    <script src="<?php echo $folder?>js/core/assets/beyond.min.js"></script>-->

    <!--Google Analytics::Demo Only-->
    
</body>

</html>