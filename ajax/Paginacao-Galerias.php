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
	$quantidade = 3;
	$pagina = $id;
	$inicio = ($quantidade * $pagina) - $quantidade;
	$sql_total = "SELECT id FROM galeria_album WHERE status='ativo'";
	$pagf_total = mysqli_query($conexao, $sql_total) or die(mysqli_error());
	$num_tot = mysqli_num_rows($pagf_total);
	$totalpag = ceil($num_tot/$quantidade);
	$paginaMais = $pagina + 1;
	$paginaMenos = $pagina - 1;
	if($pagina<$totalpag){
		$setaRight = ('<div class="p4" onClick="paginacao.iniciar(\'.ajax-galeria\',\'Galerias\',\''.$paginaMais.'\');">PRÓXIMO</div>');
	}else{
		$setaRight = ('<div class="p4"  style="cursor:default; opacity:0.5;">PRÓXIMO</div>');
	}
	if($pagina>1){
		$setaLeft = ('<div class="p3" onClick="paginacao.iniciar(\'.ajax-galeria\',\'Galerias\',\''.$paginaMenos.'\');">ANTERIOR</div>');
	}else{
		$setaLeft = ('<div class="p3"style="cursor:default; opacity:0.5;">ANTERIOR</div>');
	}
?>


	<div class="ajax-galeria">
	<div class="container-titulo-galeria">
		<div class="titulo"><h1>GALERIA</h1></div>
			<div class="content-prox-galeria">
						<?php echo $setaLeft.$setaRight; ?>
								
		</div>
	</div>
	<section class="content-galeria">
        <?php
        $sql = mysqli_query($conexao, "SELECT * FROM galeria_album WHERE status='ativo' ORDER BY id DESC LIMIT $inicio, $quantidade");
        $i = 0;
        foreach ($sql as $item):
            $imagem = $item['imagem'];
            $titulo = $item['titulo'];
            $data = $item['data'];
            $cont = $item['cont'];
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

<?php
}else{
	echo('Sai daki nub');
}
?>