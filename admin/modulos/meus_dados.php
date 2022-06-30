<?php

$eu = $_SESSION["adm_id"];
$sql = mysqli_query($conexao, "SELECT * FROM gc_usuario WHERE id='$eu'");
$item = mysqli_fetch_array($sql);
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
  $foto = $_FILES['imagem'];
        $sql1 = mysqli_query($conexao, "SELECT * FROM gc_usuario WHERE id='$id'");
        $exibe = mysqli_fetch_array($sql1);
        if($_POST){
        if(!empty($foto["name"])){
        // Verifica se o arquivo é uma imagem
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $error[1] = "Isso n&atilde;o &eacute; uma imagem.";
              }
        // Se não houver nenhum erro
        if(count($error) == 0) {
          preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
          $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
          $caminho_imagem = "uplouds/".$nome_imagem;
          move_uploaded_file($foto["tmp_name"], $caminho_imagem);
          echo "<script>alert('Seus Dados Foram Atualizados!');</script>";
           mysqli_query($conexao, "UPDATE gc_usuario SET usuario='$usuario', senha='$senha', status='ativo', imagem='$nome_imagem', email='$email', facebook='$facebook', instagram='$instagram' WHERE id='$eu'");
          header('Refresh:0');


    
        }else{
          foreach($error as $erro){
            echo $erro;
          }
        }
      }else{
        echo "<script>alert('Seus Dados Foram Atualizados!');</script>";
       mysqli_query($conexao, "UPDATE gc_usuario SET usuario='$usuario', senha='$senha', status='ativo', email='$email', facebook='$facebook', instagram='$instagram' WHERE id='$eu'");
        header('Refresh:0');

      }
    }
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Meus dados</div>
    <div id="conteudo">Nome:
    		<form>
			<input type="text" id="input_padrao" size="80px" name="usuario" value="<?php echo $item['usuario']; ?>">
            	<br />
            	E-mail:
            	<br>
				<input name="email" type="text" id="input_padrao" size="80px" value="<?php echo $item['email']; ?>" />
                <br />
            	Senha:
            	<br>
				<input name="senha" type="password" id="input_padrao" size="80px" value="<?php echo $item['senha']; ?>" />
          <br />

        Foto: (Perfil)<span style="font-size:11px;"></span><br>
    <a href="uplouds/<?php echo $item['imagem']; ?>" rel="shadowbox" onMouseOver="tooltip.show('Ampliar');" onMouseOut="tooltip.hide();"><img src="uplouds/<?php echo $item['imagem']; ?>" width="150" height="150"></a><br>
    <input type="file" name="imagem"><br>
    <br>
              Facebook:
              <br>
        <input name="facebook" type="text" id="input_padrao" size="80px" value="<?php echo $item['facebook']; ?>" />
          <br />
              Instagram:
              <br>
        <input name="instagram" type="text" id="input_padrao" size="80px" value="<?php echo $item['instagram']; ?>" />
                <br />
           
				
				<!-- <select name="carlist" id="input_padrao">
              			<option value="volvo">Contrato</option>
              			<option value="saab">Informações</option>
              			<option value="opel">Dúvidas</option>
              			<option value="audi">Reclame aqui</option>
				</select> 
				<br />
				<input type="checkbox"/> Selecionar<br />
				</br>!-->
				<input name="submit"  type="submit" id="submit_padrao" value="Editar dados" />
			</form>
	</div>


