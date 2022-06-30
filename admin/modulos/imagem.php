<?php
	$foto = $_FILES['imagem'];
	if($_POST){
		if(!empty($foto["name"])){
				// Verifica se o arquivo é uma imagem
				if(preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp|jpg)$/', $foto["type"])){
					$error[1] = "Isso n&atilde;o &eacute; uma imagem.";
				}
				// Se não houver nenhum erro
				if(count($error) == 0) {
					preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
					$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
					$caminho_imagem = "uplouds/".$nome_imagem;
					move_uploaded_file($foto["tmp_name"], $caminho_imagem);
					mysqli_query($conexao, "UPDATE noticia SET foto='$foto' WHERE id='1'");
				}else{
					foreach($error as $erro){
						echo $erro;
					}
				}
		}else{
			mysqli_query($conexao, "UPDATE noticia SET foto='$foto' WHERE id='1'");
		
		}
	}
?>

   <form method="post" enctype="multipart/form-data">
    		<form>
			<input type="file" id="input_padrao" size="80px" name="imagem">
            	<br />
				<input name="submit"  type="submit" id="submit_padrao" value="Editar dados" />
			</form>
	</div>