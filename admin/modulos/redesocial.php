<?php
if($ver['cargo'] == '1'){
$eu = $_SESSION["adm_id"];
$sql = mysqli_query($conexao, "SELECT * FROM redesocial WHERE id='1'");
$item = mysqli_fetch_array($sql);
if($_POST){
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$youtube = $_POST['youtube'];
echo "<script>alert('Dados atualizados!');</script>";
    mysqli_query($conexao, "UPDATE redesocial SET facebook='$facebook', instagram='$instagram', youtube='$youtube' WHERE id='1'");
    header('Refresh:0');
    //header('Location: /index.php?link=meus_dados');
}
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Dados Rede sociais</div>
    <div id="conteudo">Facebook:
        <form>
			<input type="text" id="input_padrao" size="80px" name="facebook" value="<?php echo $item['facebook']; ?>">
            	<br />
            	Instagram:
            <input type="text" id="input_padrao" size="80px" name="instagram" value="<?php echo $item['instagram']; ?>">
                <br />
                Youtube:
            <input type="text" id="input_padrao" size="80px" name="youtube" value="<?php echo $item['youtube']; ?>">
                <br />

				<input name="submit"  type="submit" id="submit_padrao" value="Editar site" />
			</form>
	</div>


<?php  }else{
  echo "Esse site está em Manutenção";
} ?> 