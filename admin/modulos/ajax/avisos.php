<?php
	header("Content-type: application/json; charset=UTF-8");
	ob_start();
	session_start();
	// by: João Fernandes
	$dbhost = "mysql367.umbler.com";
	$dbuser = "site_doiscoelhos";
	$dbpassword = "jhsf200699";
	$dbdatabase = "site_doiscoelhos";
 	$conexao = mysqli_connect($dbhost, $dbuser, $dbpassword) or die("<script>location.href=\"http://$siteURL/$PainelA/errodb.php\";</script>");
	
	mysqli_select_db($conexao, $dbdatabase, $conexao) or die("<script>location.href=\"http://$siteURL/$PainelA/errodb.php\";</script>");
	$ver = mysqli_query($conexao, "SELECT * FROM gc_avisos WHERE status='ativo' ORDER BY id DESC LIMIT 10");
	$i = 0;
	while($olhar = mysqli_fetch_array($conexao,$ver)):
	$dados[$i]['0'] = $olhar['id'];
	$dados[$i]['1'] = $olhar['criador'];
	$dados[$i]['2'] = $olhar['titulo'];
	$dados[$i]['3'] = $olhar['texto'];
	$i++;
	endwhile;
	$encoda = json_encode($dados);
	echo $encoda;
	
	?>
	