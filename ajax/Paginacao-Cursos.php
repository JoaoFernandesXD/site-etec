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
	$quantidade = 1;
	$pagina = $id;
	$inicio = ($quantidade * $pagina) - $quantidade;
	$sql_total = "SELECT id FROM curso WHERE status='ativo'";
	$pagf_total = mysqli_query($conexao, $sql_total) or die(mysqli_error());
	$num_tot = mysqli_num_rows($pagf_total);
	$totalpag = ceil($num_tot/$quantidade);
	$paginaMais = $pagina + 1;
	$paginaMenos = $pagina - 1;
	if($pagina<$totalpag){
		$setaRight = ('<div class="p4" onClick="paginacao.iniciar(\'.ajax-cursos\',\'Cursos\',\''.$paginaMais.'\');">PRÓXIMO</div>');
	}else{
		$setaRight = ('<div class="p4"  style="cursor:default; opacity:0.5;">PRÓXIMO</div>');
	}
	if($pagina>1){
		$setaLeft = ('<div class="p3" onClick="paginacao.iniciar(\'.ajax-cursos\',\'Cursos\',\''.$paginaMenos.'\');">ANTERIOR</div>');
	}else{
		$setaLeft = ('<div class="p3"style="cursor:default; opacity:0.5;">ANTERIOR</div>');
	}
?>


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
                     
                        $sql = mysqli_query($conexao, "SELECT * FROM curso WHERE status='ativo'ORDER BY id DESC LIMIT $inicio, $quantidade");
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
						<?php echo $setaLeft.$setaRight; ?>
								<div class="seta"><img src="media/imagem/seta.png" style="float: right; padding-right: 2.0%;  margin-top:3%;"></a></div>
					</div>
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