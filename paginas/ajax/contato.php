<?php
	$dbhost = "mysql427.umbler.com";
	$dbuser = "site_etec";
	$dbpassword = "jhsf200699";
	$dbdatabase = "etec";
	$conexao = mysqli_connect($dbhost, $dbuser, $dbpassword) or die("<script>location.href=\"http://$siteURL/$PainelA/errodb.php\";</script>");
	mysqli_select_db($conexao, $dbdatabase) or die("<script>location.href=\"http://$siteURL/$PainelA/errodb.php\";</script>");
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
$data = date('d-m-Y H:i:s');
if(empty($nome)){
	echo 'A variável está vazia';
}else{


	mysqli_query($conexao,"INSERT INTO contato (nome, email, assunto, texto, data) VALUES ('$nome','$email','$assunto','$mensagem','$data')");

}
?>