<?php

$dados_album = mysqli_query($conexao, "SELECT * FROM galeria_album WHERE status='ativo'");
    //header('Location: /index.php?link=meus_dados');
$tipo = $_GET['tipo'];
$id = (int) $_GET['id'];
  if($tipo == 'apagar'){
  mysqli_query($conexao, "DELETE FROM fotos_album WHERE id='$id'");
  }
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Adicionar fotos</div>
    <div id="conteudo">
				
			 Selecione o álbum:
              <br>
         <select name="projeto" id="input_padrao" onchange="location.href=this.value">
           <option value="">Seleciona</option>
          <?php while($fetch = mysqli_fetch_array($dados_album)){
          echo '<option value="index.php?link=postar-foto-album&id='.$fetch['id'].'">'.$fetch['titulo'].'</option>';
                    

          }?>
        </select> <br>

	</div>


