<?php
	session_start(); // iniciar
	include ('config.php');
	$usuario = trim(strip_tags(addslashes($_POST['usuario'])));
	$senha = trim(strip_tags(addslashes(sha1($_POST['senha']))));
	$ip = $_SERVER['REMOTE_ADDR'];
	$data = time();
	$ver = mysqli_fetch_array(mysqli_query($conexao, "SELECT * FROM gc_usuario WHERE email='$usuario' AND senha='$senha' AND status='ativo'"));
	$num = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM gc_usuario WHERE email='$usuario' AND senha='$senha' AND status='ativo'"));
	if($num > 0){
		$_SESSION["adm_id"] = $ver['id'];
		$_SESSION["adm_nome"] = $usuario;
		$_SESSION['login'] = "sim";
		$id = $_SESSION['adm_id'];
		echo ('deu');
	}else{
		unset ($_SESSION["adm_id"]);
		unset ($_SESSION["adm_nome"]);
		unset ($_SESSION['login']);	
		echo('ruim');
	}
	?>