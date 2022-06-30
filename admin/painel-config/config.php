<?php
	// config 
	$titulo = "GCpanel - Gerador de Conteudo v2.7";
	$siteURL = "localhost/etec";
	$siteA = "/";
	$siteB = "/";
	$PainelA = "gcpanel";
	// conexao db 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbdatabase = "etec";
 	$conexao = mysqli_connect($dbhost, $dbuser, $dbpassword) or die("<script>location.href=\"http://$siteURL/$PainelA/errodb.php\";</script>");
	
	mysqli_select_db($conexao, $dbdatabase) or die("<script>location.href=\"http://$siteURL/$PainelA/errodb.php\";</script>");

?>