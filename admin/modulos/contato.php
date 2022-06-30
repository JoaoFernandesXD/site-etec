 




  <script>
var apagar = {
	sim:function(id){
		if(confirm('Tem certeza que deseja apagar ?')){
			$.ajax({
				type:'GET',
				url:'index.php?link=contato&tipo=apagar&id='+id,
				data:{'id':id},
				success:function(html){
					alert('Apagado com sucesso!');
					location.reload();
				}
			});
		}
	}
}

</script>

 <div id="barra_celulas">
		<div id="m_c_a"></div>
		<div id="m_c_t" style="margin-left: -50px;">Assunto/Mensagem</div>
		<div id="m_c_s">E-mail</div>
		<div id="m_c_d">Data de envio</div>
		<div id="m_c_o">Opções</div>
  </div>
    
	<div id="base_celulas">
		   <?php
    $tipo = $_GET['tipo'];
    $id = (int) $_GET['id'];
	if($tipo == 'apagar'){
	mysqli_query($conexao, "DELETE FROM contato WHERE id='$id'");
	}
    $sql = mysqli_query($conexao, "SELECT * FROM contato ORDER BY id DESC LIMIT 30");
	while($ver = mysqli_fetch_array($sql)){
	?>
		<div id="dados_celula">
			
			<div id="titulo_celula" style="margin-left: 10px;"><?php echo Encurta($ver['assunto'],40); ?><br /><font style="color: #838383; font-size: 12px;"><?php echo Encurta($ver['texto'],40); ?></font></div>
			<div id="data_celula" style="margin-right: 280px;"><?php echo $ver['email']; ?><br /></div>
			<div id="data_celula" style="margin-left: 10px;"><?php echo $ver['data'];?><br /><font style="color: #838383; font-size: 13px;"></font></div>
            <a href="index.php?link=ler-contato&tipo=ler&id=<?php echo $ver['id']; ?>"><div id="opcoes_celula"><img src="uplouds/icone1.png" width="17" height="17" /></a>&nbsp;&nbsp;&nbsp;<img src="media/imgs/excluir.png" width="15" height="18" onClick="apagar.sim('<?php echo $ver['id']; ?>');" style="cursor:pointer;"/></div>
        </div>
        <!-- -->
       <?php } ?>
        
        
	</div>
</div>
<div id="d_d"></div>