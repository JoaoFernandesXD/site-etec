			<div class="pg-imagem-curso" style="background-image:url();">
				<div class="mascara-eventos">
					<div class="container-titulos-cursos">
							<div class="titulo-ler-noticia">NOTICIAS</div>
								<div class="rota-cursos">INICIO / TODAS NOTICIAS </div>
						</div>
				</div>
			</div>
  <div class="container-titulos">
    <div class="titulo-contato"><h1></h1></div>
  </div>  

  <section class="content-noticia">
	
		</div>
		<div class="content-noticia-destaque100">
			  <?php
                     
                        $sql = mysqli_query($conexao, "SELECT * FROM noticia WHERE status='ativo' order by id desc
 LIMIT 30");
                            $i = 0;
                            foreach ($sql as $exibe):
                               
                                 
        ?>
			
			<div class="base-noticia">
				<div class="base-foto-noticia" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['foto']; ?>);"></div>
					<div class="icone-vermelho-mini"></div>
						<div class="base-conteudo-noticia">
							 <a href="<?php echo $install['diretorio']; ?>noticia/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>"><div class="titulo-noticia"><?php echo Encurta($exibe['titulo'], 55); ?></div></a>
							<div class="descricao">Publicado em <?php echo $exibe['data']; ?></div>
						</div>
			</div>

	    <?php 
endforeach;
?>
			
		</div>
	</section>
