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
                
                <li class="dropdown"><a href=""><span class="iconfa-pencil"></span> Forms</a>
                	<ul>
                    	<li><a href="forms.html">Form Styles</a></li>
                        <li><a href="wizards.html">Wizard Form</a></li>
                        <li><a href="wysiwyg.html">WYSIWYG</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="<?php echo $folder?>index.php"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li>INICIO</li>
            
        </ul>
        
        <div class="pageheader">
                      <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>All Features Summary</h5>
                <h1>MENU OPCIONES</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">