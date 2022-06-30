<?php
header('Content-Type: text/html; charset=iso-8859-1');
// CONEXAO
include ('../admin/painel-config/config.php');
// INSTALAR 
include('../site/install.php');
// FUNCOES
include('../site/funcoes.php');

$id = $_POST['id'];
if(isset($id)){
	/* somar paginas */
	$quantidade = 4;
	$pagina = $id;
	$inicio = ($quantidade * $pagina) - $quantidade;
	$sql_total = "SELECT id FROM noticia WHERE status='ativo'";
	$pagf_total = mysqli_query($conexao, $sql_total) or die(mysqli_error());
	$num_tot = mysqli_num_rows($pagf_total);
	$totalpag = ceil($num_tot/$quantidade);
	$paginaMais = $pagina + 1;
	$paginaMenos = $pagina - 1;
	if($pagina<$totalpag){
		$setaRight = ('<div class="p4" onClick="paginacao.iniciar(\'.ajax-noticia\',\'Noticias\',\''.$paginaMais.'\');">PRÓXIMO</div>');
	}else{
		$setaRight = ('<div class="p4"  style="cursor:default; opacity:0.5;">PRÓXIMO</div>');
	}
	if($pagina>1){
		$setaLeft = ('<div class="p3" onClick="paginacao.iniciar(\'.ajax-noticia\',\'Noticias\',\''.$paginaMenos.'\');">ANTERIOR</div>');
	}else{
		$setaLeft = ('<div class="p3"  style="cursor:default; opacity:0.5;">ANTERIOR</div>');
	}
?>
<div class="ajax-noticia">
<div class="container-titulo-noticia ">
		<div class="titulo"><h1>NOTÍCIAS</h1></div>
				<div class="content-prox-galeria">
						<?php echo $setaLeft.$setaRight; ?>
								
		</div>
					
	</div>
	<section class="content-noticia">
		 
		<div class="content-noticia-destaqueR">
			 <?php
                     
                        $sql = mysqli_query($conexao, "SELECT * FROM noticia WHERE status='ativo' ORDER BY id DESC LIMIT $inicio, $quantidade");
                            $i = 0;
                            foreach ($sql as $exibe):
                                if ($i == 0) {
                                    ?>
				<div class="containner-noticia-imagem-d" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['foto']; ?>);">
					<div class="icone-vermelho"></div>
				</div>
					<div class="content-notifica-titulo-d">
						 <div class="content-info-noticia"><?php echo Encurta($exibe['titulo'], 55); ?></div>
							<div class="content-info-noticia-sobre">Publicado em 22/10/2017</div>
								 <a href="noticia/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>"><div class="content-info-noticia-botao"><div class="p1">ver notícia completa</div></div></a>

					</div>

		</div>
		<div class="content-noticia-destaque">
       <?php }?>
		
	 <?php if ($i >= 1) {?>
			<div class="base-noticia">
				<div class="base-foto-noticia" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['foto']; ?>);"></div>
					<div class="icone-vermelho-mini"></div>
						<div class="base-conteudo-noticia">
							 <a href="noticia/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>"><div class="titulo-noticia"><?php echo Encurta($exibe['titulo'], 55); ?></div></a>
							<div class="descricao">Publicado em <?php echo $exibe['data']; ?></div>
						</div>
						
						</div>

<?php }$i++;endforeach; ?>

	</section>
	</div>
<?php
}else{
	echo('Sai daki nub');
}
?>