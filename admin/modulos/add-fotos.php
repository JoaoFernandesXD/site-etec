<?php

$dados_projeto = mysqli_query($conexao, "SELECT * FROM projeto WHERE status='ativo'");
    //header('Location: /index.php?link=meus_dados');
$tipo = $_GET['tipo'];
$id = (int) $_GET['id'];
  if($tipo == 'apagar'){
  mysqli_query($conexao, "DELETE FROM fotos_projeto WHERE id='$id'");
  }
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Adicionar Fotos</div>
    <div id="conteudo">
				
			 Projeto:
              <br>
         <select name="projeto" id="input_padrao" onchange="location.href=this.value">
           <option value="">Seleciona</option>
          <?php while($fetch = mysqli_fetch_array($dados_projeto)){
          echo '<option value="index.php?link=postar-foto&id='.$fetch['id'].'">'.$fetch['titulo'].'</option>';
                    

          }?>
        </select> <br>

	</div>


