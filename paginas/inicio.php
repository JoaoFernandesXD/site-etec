
        <div class="col-md-12" id="slides">
		<main class="row">

			<div id="meuCarousel" class="carousel slide w-100" data-ride="carousel">

				<ol class="carousel-indicators">
					<?php
            $sql = mysqli_query($conexao, "SELECT * FROM slide WHERE status='ativo' order by id");
            $i = 0;
            foreach ($sql as $item):
                if ($i == 0) {
                    $html = "active";
                } else {
                    $html = "";
                }
                ?>

                <li data-target="#meuCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $html; ?>"></li>
                <?php $i++;
            endforeach;
            ?>
				</ol>
				<!-- inicio slide !-->
				<div class="carousel-inner">
					   <?php
            $sql = mysqli_query($conexao, "SELECT * FROM slide WHERE status='ativo' order by id desc");
            $i = 0;
            foreach ($sql as $item):
                if ($i == 0) {
                    $html = "active";
                } else {
                    $html = "";
                }
                ?>
					<div class="carousel-item <?php echo $html; ?>">

						<img class="d-block w-100 img-fluid" src="<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $item['imagem']; ?>" alt="primeiro slide">
						<div class="mascara"></div>
						<div class="hero">        
        					<hgroup>
           						 <h1><?php echo $item['titulo']; ?></h1>        
            					 <h3><?php echo $item['descricao']; ?></h3>
       						 </hgroup>
        							<a href="<?php echo $item['url']; ?>" target="_blank"><button class="btn btn-hero btn-lg" id="botao" role="button"><?php echo $item['botao']; ?></button></a>
      					</div>
					</div>
						<!-- fim slide !-->

		

 <?php $i++;
            endforeach;
            ?>

					<!-- fim slide !-->
				</div>

			</div>

		</main>

	</div>	
<div class="ajax-cursos">
<div class="container-titulos">
		<div class="titulo"><h1>CURSOS</h1></div>
			<div class="container-titulos-ensino">
				<div class="grid-2" onClick="paginacao.iniciar('.ajax-cursos','Medio','1');">ENSINO MÉDIO</div>
				<div class="grid-2-item"></div>
				<div class="grid-2"  onClick="paginacao.iniciar('.ajax-cursos','Tecnico','1');">ENSINO TÉCNICO</div>
			</div>
			<div class="icones">
			<a href="#"><img src="media/imagem/icone2.png" style="float: right; padding-right: 2.0%; margin-top:2%;"></a>
			<a href="#"><img src="media/imagem/icone1.png" style="float: right; padding-right: 2.0%;  margin-top:2%;"></a>
		</div>
			
	</div>
	<section class="containner">
			 <?php
                     
                        $sql = mysqli_query($conexao, "SELECT * FROM curso WHERE status='ativo' order by id desc
 LIMIT 1");
                            $i = 0;
                            foreach ($sql as $exibe):
                                if ($i == 0) {
                                    ?>
		<div class="content " id="contentR">
			<div class="content-img">
				<div class="content-info">
					<div class="content-info-curso"><?php echo Encurta($exibe['titulo'], 55); ?></div>
						<div class="content-info-curso-sobre"><?php echo Encurta($exibe['resumo'], 325); ?></div>
							<a href="curso/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>"><div class="content-info-curso-botao"><div class="p1">ver detalhes do curso</div></div></a>
				</div>

			</div>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $install['diretorio']; ?>curso/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>" target="_blank"><div class="p2">
				COMPARTILHE ESTE CURSO
			</div></a>
		</div>
			<div class="content contentr">
				<div class="imagem">
					<img src="<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['imagem']; ?>" style="height: 650px; background-size: cover; background-size: 100% 100%; ">
						<div class="mascara-curso"></div>
				</div>
					<div class="content-prox">
							<div class="p3"  style="cursor:default; opacity:0.5;">ANTERIOR</div>
							<div class="p4" onClick="paginacao.iniciar('.ajax-cursos','Cursos','2');">PRÓXIMO</div>
								<div class="seta"><img src="media/imagem/seta.png" style="float: right; padding-right: 2.0%;  margin-top:3%;"></a></div>
					</div>
			</div>
		</div>
		<?php }$i++;endforeach; ?>
	</section>
</div>


	<div class="ajax-noticia">
	<div class="container-titulo-noticia">
		<div class="titulo"><h1>NOTÍCIAS</h1></div>
				<div class="content-prox-galeria">
						<div class="p3"  style="cursor:default; opacity:0.5;">ANTERIOR</div>
							<div class="p4" onClick="paginacao.iniciar('.ajax-noticia','Noticias','2');">PRÓXIMO</div>
								
		</div>
					
	</div>
	<section class="content-noticia">
		 
		<div class="content-noticia-destaqueR">
			 <?php
                     
                        $sql = mysqli_query($conexao, "SELECT * FROM noticia WHERE status='ativo' order by id desc
 LIMIT 4");
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
	<div class="ajax-galeria">
	<div class="container-titulo-galeria">
		<div class="titulo"><h1>GALERIA</h1></div>
			<div class="content-prox-galeria">
							<div class="p3"  style="cursor:default; opacity:0.5;">ANTERIOR</div>
							<div class="p4" onClick="paginacao.iniciar('.ajax-galeria','Galerias','2');">PRÓXIMO</div>
								
		</div>
	</div>
	<section class="content-galeria">
        <?php
        $sql = mysqli_query($conexao, "SELECT * FROM galeria_album WHERE status='ativo' order by id desc
 LIMIT 3");
        $i = 0;
        foreach ($sql as $item):
            $imagem = $item['imagem'];
            $titulo = $item['titulo'];
            $cont = $item['cont'];
            $data = $item['data'];
            $mes = date('m', strtotime(str_replace('-', '/', $data)));
            $ano = date('y', strtotime(str_replace('-', '/', $data)));
            switch ($mes) {
                case 1: $mes = "Jan";
                    break;
                case 2: $mes = "Fev";
                    break;
                case 3: $mes = "Mar";
                    break;
                case 4: $mes = "Abr";
                    break;
                case 5: $mes = "Mai";
                    break;
                case 6: $mes = "Jun";
                    break;
                case 7: $mes = "Jul";
                    break;
                case 8: $mes = "Ago";
                    break;
                case 9: $mes = "Set";
                    break;
                case 10: $mes = "Out";
                    break;
                case 11: $mes = "Nov";
                    break;
                case 12: $mes = "Dez";
                    break;
            }

            if ($i == 0) {?>
            		<div class="content-galeria-destaque">
			<div class="content-galeria-imagem" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $imagem; ?>);">
				<div class="transparency">
					<div class="content-galeria-data"><?php echo date('d', strtotime(str_replace('-', '/', $data))); ?>/<?php echo $mes ?>/20<?php echo $ano ?>
						<div class="galeria-data-icone"></div>
					</div>
						<div class="content-galeria-titulo">
							 <a href="galeria/<?php echo $item['id']; ?>/<?php echo $item['url']; ?>"><div class="galeria-titulo-1"><?php echo Encurta($titulo, 50); ?></div></a>
							<div class="galeria-titulo-descricao"><?php echo Encurta($descricao, 50); ?></div>
						</div>

				</div>
			</div>
				<div class="content-galeria-curtida"><img src="media/imagem/curtida.png" style="margin-right: 10px; margin-top:-2px;"><?php echo $cont; ?> pessoas visualizaram este album</div>
		</div>
<?php 
              
            } elseif ($i == 1) {?>
            	<div class="content-galeria-destaque-center">
			<div class="content-galeria-imagem" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $imagem; ?>);">
				<div class="transparency">
					<div class="content-galeria-data"><?php echo date('d', strtotime(str_replace('-', '/', $data))); ?>/<?php echo $mes ?>/20<?php echo $ano ?>
						<div class="galeria-data-icone"></div>
					</div>
					<div class="content-galeria-titulo-1">
							 <a href="galeria/<?php echo $item['id']; ?>/<?php echo $item['url']; ?>"><div class="galeria-titulo-1"><?php echo Encurta($titulo, 25); ?></div></a>
						</div>
				</div>
			</div>
			<div class="content-galeria-curtida"><img src="media/imagem/curtida.png" style="margin-right: 10px; margin-top:-2px;"><?php echo $cont; ?> pessoas visualizaram este album</div>
		</div>
		<?php
               
            } else {?>

	<div class="content-galeria-destaqueR">
			<div class="content-galeria-imagem" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $imagem; ?>);">
				<div class="transparency">
					<div class="content-galeria-data"><?php echo date('d', strtotime(str_replace('-', '/', $data))); ?>/<?php echo $mes ?>/20<?php echo $ano ?>
						<div class="galeria-data-icone"></div>
					</div>
					<div class="content-galeria-titulo-1">
							<div class="galeria-titulo-1"><?php echo Encurta($titulo, 25); ?></div>
						</div>
				</div>
			</div>
			<div class="content-galeria-curtida"><img src="media/imagem/curtida.png" style="margin-right: 10px; margin-top:-2px;"><?php echo $cont; ?> pessoas visualizaram este album</div>
		</div>


            	<?php } ?>

 <?php $i++;
endforeach;
?>
	</section>
</div>


<div class="ajax-evento">
	<div class="container-titulo-noticia">
		<div class="titulo"><h1>EVENTOS</h1></div>
				<div class="content-prox-galeria">
						<div class="p3"  style="cursor:default; opacity:0.5;">ANTERIOR</div>
							<div class="p4" onClick="paginacao.iniciar('.ajax-evento','Eventos','2');">PRÓXIMO</div>
								
		</div>
					
	</div>
	<section class="content-noticia">



		 <?php
                            $sql = mysqli_query($conexao, "SELECT * FROM projeto WHERE status='ativo'order by id desc
 LIMIT 5");
                            $i = 0;
                            foreach ($sql as $exibe):
            
            $mes = $exibe['mes'];
            switch ($mes) {
                case 1: $mes = "Jan";
                    break;
                case 2: $mes = "Fev";
                    break;
                case 3: $mes = "Mar";
                    break;
                case 4: $mes = "Abr";
                    break;
                case 5: $mes = "Mai";
                    break;
                case 6: $mes = "Jun";
                    break;
                case 7: $mes = "Jul";
                    break;
                case 8: $mes = "Ago";
                    break;
                case 9: $mes = "Set";
                    break;
                case 10: $mes = "Out";
                    break;
                case 11: $mes = "Nov";
                    break;
                case 12: $mes = "Dez";
                    break;
            }
                                if ($i == 0) {
                                    ?>
		<div class="content-noticia-destaqueR">
				<div class="containner-noticia-imagem-d" id="mascara-eventos" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['imagem']; ?>);">
					<div class="mascara-eventos">
					<div class="container-datas-eventos">
							<div class="data-evento"><?php echo $exibe['dia'];?> <?php echo $mes ?></div>
								<div class="datas-evento">
									INÍCIO: <?php echo $exibe['inicio']; ?>
									TÉRMINO: <?php echo $exibe['fim']; ?>
								</div>
						</div>
					</div>
					
				</div>
					<div class="content-notifica-titulo-d">
						<div class="content-info-noticia"><?php echo Encurta($exibe['titulo'], 70); ?></div>
							<div class="content-info-noticia-sobre">Publicado em <?php echo $exibe['data']; ?></div>
								 <a href="evento/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>"><div class="content-info-noticia-botao"><div class="p1">mais informações</div></div></a>

		</div>

			
		</div>
		<div class="content-noticia-destaque">
		 <?php } else {
        ?>
		

			<div class="base-noticia">
				<div class="base-foto-noticia" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['imagem']; ?>);">
					<div class="mascara-eventos">
						<div class="data-evento-mini"><?php echo $exibe['dia'];?> <?php echo $mes ?></div>
					</div>
				</div>
					<div class="icone-vermelho-mini"></div>
						<div class="base-conteudo-noticia">
							 <a href="evento/<?php echo $exibe['id']; ?>/<?php echo $exibe['url']; ?>"><div class="titulo-noticia"><?php echo Encurta($exibe['titulo'], 30); ?></div></a>
							<div class="descricao">Publicado em <?php echo $exibe['data']; ?></div>
						</div>
			</div>


    <?php } $i++;
endforeach;
?>



		</div>
	</section>

</div>



