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
    <link href="<?php echo $folder?>css/core/assets/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="<?php echo $folder?>css/core/assets/beyond.min.css" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/assets/demo.min.css" rel="stylesheet" />
    <link href="<?php echo $folder?>css/core/assets/animate.min.css" rel="stylesheet" />
    <link id="beyond-link" href="<?php echo $folder?>/css/core/assets/orange.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

</head>
<!--Head Ends-->
<!--Body-->
<body>
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">Acceso al Sistema</div>
            <div class="loginbox-social">
                <img src="../imagenes/logo/logo.jpg" width="250" class="img-thumbnail">
            </div>
            <?php
                if(isset($_GET['incompleto'])){
                ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Porfavor llene todos los datos necesarios para poder acceder
                </div>
                <?php
                }
                if(isset($_GET['error'])){
                ?>
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    Los Datos Introducidos son incorrectos Intente Nuevamente
                </div>
                <?php
                }
                ?>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or"> &copy; </div>
            </div>
            <form action="login.php" method="post" id="login">
            <input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
            <div class="loginbox-textbox">
           
                <input type="text" class="form-control" placeholder="Usuario" name="usuario" id="usuario" autofocus/>
            </div>
            <div class="loginbox-textbox">
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" id="pass"/>
            </div>
            <div class="loginbox-submit">
                <input type="submit" class="btn btn-primary btn-block" value="Ingresar">
            </div>
            </form>
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="<?php echo $folder?>js/core/jquery.min.js"></script>
    <script src="<?php echo $folder?>js/core/bootstrap.min.js"></script>
    <script src="<?php echo $folder?>js/core/plugins/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts
    <script src="<?php echo $folder?>js/core/assets/beyond.min.js"></script>-->

    <!--Google Analytics::Demo Only-->
    
</body>

</html>