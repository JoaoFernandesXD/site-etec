<style>
body {
  margin:0;
  padding:0;
  list-style:none;
}
</style>
<?php

$tipo = $_GET['tipo'];
$id = (int) $_GET['id'];
if($tipo == 'editar'){
  // Codigo para editar slide

  // variaveis

  $titulo = $_POST['titulo'];
  $url = $_POST['url'];
  $status = $_POST['status'];
  $descricao = $_POST['descricao'];
  $botao = $_POST['botao'];
  $foto = $_FILES['imagem'];
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
          echo "<script>alert('Dados atualizados!');</script>";
          mysqli_query($conexao, "UPDATE slide SET titulo='$titulo', imagem='$nome_imagem', status='$status', url='$url', botao='$botao', descricao='$descricao' WHERE id='$id'");
          header('Location: ?link=slide');


    
        }else{
          foreach($error as $erro){
            echo $erro;
          }
        }
      }else{
        echo "<script>alert('Dados atualizados!');</script>";
       mysqli_query($conexao, "UPDATE slide SET titulo='$titulo', status='$status', url='$url', botao='$botao', descricao='$descricao' WHERE id='$id'");
        header('Location: ?link=slide');

      }
    }


}
$sql = mysqli_query($conexao, "SELECT * FROM slide WHERE id='$id'");
$item = mysqli_fetch_array($sql);
//$item_cad = mysqli_fetch_array($cad_noticia);
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Editar slide</div>
    <div id="conteudo">Título:
    
      <input type="text" id="input_padrao" size="80px" name="titulo" value="<?php echo $item['titulo'];?>">
              <br />
      URL:
 
      <input type="text" id="input_padrao" size="80px" name="url"  value="<?php echo $item['url'];?>">
      <br>
       Descricao:
 
      <input type="text" id="input_padrao" size="80px" name="descricao" value="<?php echo $item['descricao'];?>"> 
        <br />
      Botao:
 
      <input type="text" id="input_padrao" size="80px" name="botao" value="<?php echo $item['botao'];?>">
      <br>
        Imagem: <span style="font-size:11px;"></span><br>
    <a href="uplouds/<?php echo $item['imagem']; ?>" rel="shadowbox" onMouseOver="tooltip.show('Ampliar');" onMouseOut="tooltip.hide();"><img src="uplouds/<?php echo $item['imagem']; ?>" width="210" height="114"></a><br>
    <input type="file" name="imagem"><br>
                <br />
        </select> <br>
          Status:
              <br>
         <select name="status" id="input_padrao">
                    <option value="ativo"<?php if($item['status'] == 'ativo'){echo(' selected');} ?>>Ativo</option>
                    <option value="inativo"<?php if($item['status'] == 'inativo'){echo(' selected');} ?>>Inativo</option>
        </select> 
        <br />
      
       <br>
        <input name="submit"  type="submit" id="submit_padrao" value="Postar" />
      </form>
	</div>


