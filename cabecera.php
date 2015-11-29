</head>

<body>

<div class="mainwrapper">
    
    <div class="header">
        <div class="logo" style="margin:0px !important;padding:0px !important">
            <a href="<?php echo $folder?>"><img src="<?php echo $folder?>imagenes/general/LOGO_3.jpg" alt="" style="height:103px;"/></a>
        </div>
        <div class="headerinner">
            <!-- Inicio Modulo Usuario-->
            <ul class="headmenu">
                
                <li class="right">
                    
                        <div class="userloggedinfo">
                        <!--<img src="images/photos/thumb1.png" alt="" />-->
                            <div class="userinfo">
                                <h5><? echo $_SESSION['nombre_me']?> </h5>
                                <ul>
                                    <li><a href="<?php echo $folder?>login/logout.php">Salir</a></li>
                                </ul>
                            </div>
                       </div>

                </li>
            </ul>
           
           <!-- Fin Modulo Usuario-->
            <!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	
                <li class="nav-header">MENU</li>
                <?php
                include_once("class/menu.php");
                $menu=new menu;
                include_once("class/submenu.php");
                $submenu=new submenu;
                
                ?>
                
                <li class="dropdown"><a href="<?php echo $folder?>"><span class="iconfa-home"></span> Inicio</a></li>
                <?php foreach($menu->mostrar($_SESSION['Nivel'],"") as $m){?>
                <li class="dropdown"><a href="<?php echo $m['menu']?>"><span class="iconfa-pencil"></span> <?php echo $m['nombre']?></a>
                	<ul>
                        <?php foreach($submenu->mostrar($_SESSION['Nivel'],$m['codmenu']) as $sm){?>
                    	<li><a href="<?php echo $folder?><?php echo $m['url']?><?php echo $sm['url']?>"><?php echo $sm['nombre']?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <?php }?>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo $folder?>index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>METALDUGAR </li>
            
        </ul>
        
        <div class="pageheader">
                      <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>Sistema de Administración</h5>
                <h1><?php echo $titulo?></h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">