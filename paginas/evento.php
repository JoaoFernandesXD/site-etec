<?php
$id = (int) $_GET['id'];
$url = $_GET['titulo'];
$sql = mysqli_query($conexao, "SELECT * FROM projeto WHERE id='$id' AND url='$url'");
$total = mysqli_num_rows($sql);
$item = mysqli_fetch_array($sql);
if($item['status'] == 'inativo' || $total == 0){
?>
Esse evento não existe.
<?php }else{ ?>
    <?php
    $data = time();
    $meuip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('America/Sao_Paulo');
    $pesquisar = mysqli_num_rows(mysqli_query($conexao,"SELECT * FROM acessos_projeto WHERE ip='$meuip' AND id_projeto='$id'"));
    $valor = $item['cont']+1;
    if($pesquisar == 0){
         // registrar logs
        $leu = mysqli_query($conexao,"INSERT INTO acessos_projeto (ip, data, id_projeto) VALUES ('$meuip','$data','$id')");
        mysqli_query($conexao, "UPDATE projeto SET cont='$valor' WHERE id='$id'");
    }else{
       
    }
    ?>

			<div class="pg-imagem-curso" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $item['imagem'];?>);">
				<div class="mascara-eventos">
					<div class="container-titulos-cursos">
							<div class="titulo-ler-noticia">EVENTO</div>
								<div class="rota-cursos">INICIO / <?php echo $item['titulo'];?> </div>
						</div>
				</div>
			</div>
  <div class="container-titulos">
    <div class="titulo-contato"><h1><?php echo $item['titulo'];?></h1></div>
 <div style="float: right; width: auto; max-width:120px; height: 110px;">
    	

  </div>  
  </div>  



  </div>  
       <div class="container-foto-galeria" style="margin-top:15px;">
         <div class="titulo-contato-noticia"><?php echo $item['resumo'];?></div>
         <br>

         <br>

         <br>


         <br>

               <br>

         <br>

         <br>


           <center><div class="fb-comments"data-href="<?php echo $install['diretorio']; ?>projeto/<?php echo $id?>/<?php echo $url ?>" data-width="800" data-numposts="10"></div></center>
		</div>




       </div>
  


 <?php } ?>