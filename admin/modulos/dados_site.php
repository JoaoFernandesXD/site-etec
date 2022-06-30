<?php
if($ver['cargo'] == '1'){
$eu = $_SESSION["adm_id"];
$sql = mysqli_query($conexao, "SELECT * FROM gc_site WHERE id='1'");
$item = mysqli_fetch_array($sql);
if($_POST){
$titulo = $_POST['titulo'];
$manutencao = $_POST['manutencao'];
echo "<script>alert('Dados atualizados!');</script>";
    mysqli_query($conexao, "UPDATE gc_site SET titulo='$titulo', manutencao='$manutencao' WHERE id='1'");
    header('Refresh:0');
    //header('Location: /index.php?link=meus_dados');
}
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Dados site</div>
    <div id="conteudo">Título:
    		<form>
			<input type="text" id="input_padrao" size="80px" name="titulo" value="<?php echo $item['titulo']; ?>">
            	<br />
            	Manutenção:
            	<br>
			  <select name="manutencao" id="input_padrao">
                    <option value="ativo"<?php if($item['manutencao'] == 'ativo'){echo(' selected');} ?>>Ativo</option>
                    <option value="inativo"<?php if($item['manutencao'] == 'inativo'){echo(' selected');} ?>>Inativo</option>
        </select> 
				</br>
				<input name="submit"  type="submit" id="submit_padrao" value="Editar site" />
			</form>
	</div>


<?php  }else{
  echo "Esse site está em Manutenção";
} ?> 