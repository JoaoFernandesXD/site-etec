<?php if($ver['cargo'] == '1'){?>
  <div id="bx_inicio">Aviso</div>
  <a href="index.php?link=criar-aviso"><div id="pag-inicial">Criar aviso</div></a>
  <br>
  <br>
  <div id="barra_celulas">
		<div id="m_c_a"></div>
		<div id="m_c_t">Titulo</div>
		<div id="m_c_s">Status</div>
		<div id="m_c_d"></div>
		<div id="m_c_o">Opções</div>
  </div>
  <script>
var apagar = {
	sim:function(id){
		if(confirm('Tem certeza que deseja apagar ?')){
			$.ajax({
				type:'GET',
				url:'index.php?link=aviso&tipo=apagar&id='+id,
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
	mysqli_query($conexao, "DELETE FROM gc_avisos WHERE id='$id'");
	}
    $sql = mysqli_query($conexao, "SELECT * FROM gc_avisos ORDER BY id DESC LIMIT 30");
	while($ver = mysqli_fetch_array($sql)){
	?>
		<div id="dados_celula">
			
			<div id="titulo_celula"><?php echo Encurta($ver['titulo'],30); ?><br /><font style="color: #838383; font-size: 12px;"><?php echo Encurta($ver['texto'],60); ?></font></div>
			<div id="<?php if($ver['status'] == 'ativo'){echo "status_celula";}else{echo "status_celula-inativo";}?>"><?php echo $ver['status']; ?></div>
			<div id="data_celula"><br /><font style="color: #838383; font-size: 13px;"></font></div>
            <div id="opcoes_celula"><a href="index.php?link=edit-aviso&tipo=editar&id=<?php echo $ver['id']; ?>"><img src="media/imgs/editar.png" width="17" height="17" /></a>&nbsp;&nbsp;&nbsp;<img src="media/imgs/excluir.png" width="15" height="18" onClick="apagar.sim('<?php echo $ver['id']; ?>');" style="cursor:pointer;" /></div>
        </div>
       <?php } ?>
        <!-- -->
      
<?php  }else{
	header('Location: ?link=avisos'); 
} ?> 