<?php
$id = (int) $_GET['id'];
$url = $_GET['titulo'];
$sql = mysqli_query($conexao, "SELECT * FROM curso WHERE id='$id' AND url='$url'");
$total = mysqli_num_rows($sql);
$item = mysqli_fetch_array($sql);
if($item['status'] == 'inativo' || $total == 0){
?>
Esse Curso não existe.
<?php }else{ ?>

  <meta property="og:url"           content="<?php echo $install['diretorio']; ?>noticia/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>" />
  <meta property="og:title"         content="Sobre o Curso <?php echo $item['titulo'];?>" />
  <meta property="og:description"   content="<?php echo Encurta($item['resumo'], 385); ?>" />
  <meta property="og:image"         content="<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $item['imagem']; ?>" />

			<div class="pg-imagem-curso" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $item['imagem']; ?>);">
				<div class="mascara-eventos">
					<div class="container-titulos-cursos">
							<div class="titulo-curso"><?php echo $item['titulo'];?></div>
								<div class="rota-cursos">INICIO / CURSOS / <?php echo $item['titulo'];?></div>
						</div>
				</div>
			</div>



			<div class="container-titulos">
		
			
	</div>
	<section class="containner">
		<div class="content " id="contentR">
			<div class="content-img">
				<div class="content-info">
					<div class="content-info-curso">SOBRE O CURSO</div>
						<div class="content-info-curso-sobre"><?php echo Encurta($item['resumo'], 385); ?></div>
							
				</div>

			</div>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $install['diretorio']; ?>curso/<?php echo $item['id']; ?>/<?php echo $item['url']; ?>" target="_blank"><div class="p2">
				COMPARTILHE ESTE CURSO
			</div></a>
		</div>
			<div class="content contentcurso">
				<div class="imagem">
					
						<div class="mascara-curso"></div>
				</div>
				<div class="cor-base-curso">
					<div class="conent-curso">
						<h1>TURNO:</h1>
						<h2><?php if($item['horario'] == 'medio'){
							echo 'MATUTINO';
						}else{
							echo 'NOTURNO';
						}?></h2>
						<div class="linha"></div>


						<h1>VAGAS:</h1>
						<h2><?php echo $item['vagas'];?> VAGAS</h2>
						<div class="linha"></div>



						<h1>DURAÇÃO:</h1>
						<h2><?php echo $item['cargahoraria'];?></h2>
						<div class="linha-white"></div>
					</div>
				</div>
		</div>
	</section>

	 <?php } ?>