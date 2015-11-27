<?php
session_start();
@set_magic_quotes_runtime(0);
//header("Content-Type: text/html;charset=utf-8");
if(!empty($_POST)){
	include_once("../configuracion.php");
	include_once("../class/usuario.php");
	include_once("../class/logusuario.php");
	$usu=new usuario;
	$logusuario=new logusuario;
	
	$url=$_POST['u'];
	if(empty($directory) || $directory==""){
		$u=$url;	
		$direccion="..".$u;
	}else{
		$u=explode($directory,$_POST['u']);
		$direccion="../".$u[1];
	}
	
	if(isset($_POST['usuario'],$_POST['pass']) && $_POST['usuario']!="" && $_POST['pass']!=""){
		
		$usuario=($_POST['usuario']);
		$pass=$_POST['pass'];
		
//		$usuario=str_replace("ñ","n",$usuario);
		$usuarioAl=str_replace(array("ñ","Ñ"),array("n","N"),$usuario);
		$usuarioAl=strtolower($usuarioAl);
	
		$agente=$_SERVER['HTTP_USER_AGENT'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$lenguaje=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$referencia= $_SERVER['HTTP_REFERER'];
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		if(ereg('^[a-z]*[a-z]$',$usuario)){
			//Administrador 1 2 3 4
			$reg=$usu->loginUsuarios($usuario,$pass);
			$reg=array_shift($reg);
			$sw=1;
		}else{
			header("Location:./?u=".$url.'&error=1');		
		}

		$codUsuario=$reg['codusuarios'];
		
		if($sw){
			$Nivel=$reg['nivel'];
		}
		
		if($reg['Can']==1){
			$valuesLog=array(
				"codusuario"=>$codUsuario,
				"nivel"=>$Nivel,
				"url"=>"'$url'",
				"fechalog"=>"'$fecha'",
				"horalog"=>"'$hora'",
				"agente"=>"'$agente'",
				"ip"=>"'$ip'",
				"referencia"=>"'$referencia'",
				"lenguaje"=>"'$lenguaje'"
			);
			$logusuario->insertarRegistro($valuesLog,0);

			$_SESSION['CodUsuarioLog']=$codUsuario;
			$_SESSION['LoginSistema']=1;
			$_SESSION['Nivel']=$Nivel;
			header("Location:".$direccion);
		}
		else{
			header("Location:./?u=".$url.'&error=1');
		}
	}else{
		header("Location:./?u=".$url.'&incompleto=1');	
	}
}
?>
