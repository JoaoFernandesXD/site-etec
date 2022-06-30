<?php

 $id = (int) $_GET['id'];
 $data = date('Y-m-d H:i:s');
 if($_POST){
    $foto = $_FILES['imagem'];
            if(!empty($foto["name"])){
              for ($i = 0; $i < count($foto['name']); $i++){
              // Verifica se o arquivo é uma imagem
              if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"][$i])){
                $error[1] = "Isso n&atilde;o &eacute; uma imagem.";
              }
              // Se não houver nenhum erro
              if(count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"][$i], $ext);
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = "uplouds/".$nome_imagem;
                move_uploaded_file($foto["tmp_name"][$i], $caminho_imagem);
                mysqli_query($conexao, "INSERT INTO fotos_projeto (foto, data, id_projeto) VALUES ('$nome_imagem','$data','$id')");
                header("Location: ?link=postar-foto&id=$id"); 
            }else{
                foreach($error as $erro){
                  echo $erro;
                }
              }
            }
          }

}
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Adicionar fotos</div>
    <div id="conteudo">Selecione as fotos para inserir
    <br> 
    		<form method="post" enctype="multipart/form-data">
                  <br> 
			<input type="hidden" name="MAX_FILE_SIZE" value="52428800">
            <input type="file" name="imagem[]" multiple="multiple"/><br><br>
	
				<input name="submit"  type="submit" id="submit_padrao" value="Publicar" />
			</form>
	</div>


