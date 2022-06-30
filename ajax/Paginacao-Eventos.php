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
	$quantidade = 5;
	$pagina = $id;
	$inicio = ($quantidade * $pagina) - $quantidade;
	$sql_total = "SELECT id FROM projeto WHERE status='ativo'";
	$pagf_total = mysqli_query($conexao, $sql_total) or die(mysqli_error());
	$num_tot = mysqli_num_rows($pagf_total);
	$totalpag = ceil($num_tot/$quantidade);
	$paginaMais = $pagina + 1;
	$paginaMenos = $pagina - 1;
	if($pagina<$totalpag){
		$setaRight = ('<div class="p4" onClick="paginacao.iniciar(\'.ajax-evento\',\'Eventos\',\''.$paginaMais.'\');">PRÓXIMO</div>');
	}else{
		$setaRight = ('<div class="p4"  style="cursor:default; opacity:0.5;">PRÓXIMO</div>');
	}
	if($pagina>1){
		$setaLeft = ('<div class="p3" onClick="paginacao.iniciar(\'.ajax-evento\',\'Eventos\',\''.$paginaMenos.'\');">ANTERIOR</div>');
	}else{
		$setaLeft = ('<div class="p3"style="cursor:default; opacity:0.5;">ANTERIOR</div>');
	}
?>
<div class="ajax-evento">
	<div class="container-titulo-noticia">
		<div class="titulo"><h1>EVENTOS</h1></div>
				<div class="content-prox-galeria">
					<?php echo $setaLeft.$setaRight; ?>
								
		</div>
					
	</div>
	<section class="content-noticia">



		 <?php
                            $sql = mysqli_query($conexao, "SELECT * FROM projeto WHERE status='ativo' ORDER BY id DESC LIMIT $inicio, $quantidade");
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


<?php
}else{
	echo('Sai daki nub');
}
?>