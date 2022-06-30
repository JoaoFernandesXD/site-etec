
  <div id="bx_inicio">Galeria</div>
  <a href="index.php?link=postar-galeria"><div id="pag-inicial">Criar álbum</div></a>
  <br>
  <br>
  <div id="barra_celulas">
		<div id="m_c_a">Imagem</div>
		<div id="m_c_t">Título do álbum</div>
		<div id="m_c_s">Status</div>
		<div id="m_c_d">Data de postagem</div>
		<div id="m_c_o">Opções</div>
  </div>
  <script>
var apagar = {
	sim:function(id){
		if(confirm('Tem certeza que deseja apagar ?')){
			$.ajax({
				type:'GET',
				url:'index.php?link=galeria&tipo=apagar&id='+id,
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

	<div id="base_celulas">
		    <?php
    $tipo = $_GET['tipo'];
    $id = (int) $_GET['id'];
	if($tipo == 'apagar'){
	mysqli_query($conexao, "DELETE FROM galeria_album WHERE id='$id'");
	}
    $sql = mysqli_query($conexao, "SELECT * FROM galeria_album ORDER BY id DESC LIMIT 30");
	while($ver = mysqli_fetch_array($sql)){
	?>
		<div id="dados_celula">
			<div id="id_foto" style="background-image: url(uplouds/<?php echo $ver['imagem']; ?>);"></div>
			<div id="titulo_celula"><?php echo Encurta($ver['titulo'],30); ?><br /><font style="color: #838383; font-size: 12px;"><?php echo Encurta($ver['descricao'],80); ?></font></div>
			<div id="<?php if($ver['status'] == 'ativo'){echo "status_celula";}else{echo "status_celula-inativo";}?>"><?php echo $ver['status']; ?></div>
			<div id="data_celula"><?php echo $ver['data'];?><br /><font style="color: #838383; font-size: 13px;"></font></div>
            <div id="opcoes_celula"><a href="index.php?link=edit-galeria&tipo=editar&id=<?php echo $ver['id']; ?>"><img src="media/imgs/editar.png" width="17" height="17" /></a>&nbsp;&nbsp;&nbsp;<img src="media/imgs/excluir.png" width="15" height="18" onClick="apagar.sim('<?php echo $ver['id']; ?>');" style="cursor:pointer;" /></div>
        </div>
       <?php } ?>
        <!-- -->
      
