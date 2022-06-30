<?php
$id = (int) $_GET['id'];
$url = $_GET['titulo'];
$sql = mysqli_query($conexao, "SELECT * FROM noticia WHERE id='$id' AND url='$url'");
$total = mysqli_num_rows($sql);
$item = mysqli_fetch_array($sql);
$data = $item['data'];
$mes = date('m', strtotime(str_replace('-', '/', $data)));
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
if ($item['status'] == 'inativo' || $total == 0) {
    ?>
    Essa noticia não existe.
<?php } else { ?>
    <?php
    $meuip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('America/Sao_Paulo');
    $pesquisar = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM acessos_noticia WHERE ip='$meuip' AND id_noticia='$id'"));
    $valor = $item['cont'] + 1;
    if ($pesquisar == 0) {
        // registrar logs
        $leu = mysqli_query($conexao, "INSERT INTO acessos_noticia (ip, data, id_noticia) VALUES ('$meuip','$data','$id')");
        mysqli_query($conexao, "UPDATE noticia SET cont='$valor' WHERE id='$id'");
    } else {
        
    }
    ?>

			<div class="pg-imagem-curso" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $item['foto']; ?>);">
				<div class="mascara-eventos">
					<div class="container-titulos-cursos">
							<div class="titulo-ler-noticia">NOTICIA</div>
								<div class="rota-cursos">INICIO / <?php echo $item['titulo']; ?></div>
						</div>
				</div>
			</div>
  <div class="container-titulos">
    <div class="titulo-contato"><h1><?php echo $item['titulo']; ?></h1></div>
 <div style="float: right; width: auto; max-width:120px; height: 110px;">
    	<div style="width: 100%; height: 52px; font-family: Bold; font-size: 58px; color:#841a1a;"><center><?php echo date('d', strtotime(str_replace('-','/', $data)));?></center></div>
    	<div style="width: 100%; height: 52px; font-family: Bold; font-size: 28px; color:#841a1a; margin-top: 15px;"><center><?php echo $mes ?></center></div>

  </div>  
  </div>  



  </div>  
       <div class="container-foto-galeria" style="margin-top:15px;">
         <div class="titulo-contato-noticia"><?php echo $item['texto']; ?></div>
           <br>

         <br>

         <br>


         <br>

               <br>

         <br>

         <br>


           <center><div class="fb-comments"data-href="<?php echo $install['diretorio']; ?>noticia/<?php echo $id?>/<?php echo $url ?>" data-width="800" data-numposts="10"></div></center>
		</div>


       </div>
  

  
<?php } ?>