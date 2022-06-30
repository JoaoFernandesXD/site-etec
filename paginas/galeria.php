<?php
$id = (int) $_GET['id'];
$url = $_GET['titulo'];
$sql = mysqli_query($conexao, "SELECT * FROM galeria_album WHERE id='$id' AND url='$url'");
$total = mysqli_num_rows($sql);
$item = mysqli_fetch_array($sql);
$data = $item['data'];
$mes = date('m', strtotime(str_replace('-','/', $data)));
switch ($mes){
case 1: $mes = "Jan"; break;
case 2: $mes = "Fev"; break;
case 3: $mes = "Mar"; break;
case 4: $mes = "Abr"; break;
case 5: $mes = "Mai"; break;
case 6: $mes = "Jun"; break;
case 7: $mes = "Jul"; break;
case 8: $mes = "Ago"; break;
case 9: $mes = "Set"; break;
case 10: $mes = "Out"; break;
case 11: $mes = "Nov"; break;
case 12: $mes = "Dez"; break;
}
if($item['status'] == 'inativo' || $total == 0){
?>
Esse album não existe.
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
        mysqli_query($conexao, "UPDATE galeria_album SET cont='$valor' WHERE id='$id'");
    }else{
       
    }
?>
			<div class="pg-imagem-curso" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $item['imagem'];?>);">
				<div class="mascara-eventos">
					<div class="container-titulos-cursos">
							<div class="titulo-curso"><?php echo Encurta($item['titulo'],75);?></div>
								<div class="rota-cursos">INICIO / GALERIA </div>
						</div>
				</div>
			</div>
  <div class="container-titulos">
    <div class="titulo-contato"><h1><?php echo Encurta($item['titulo'],75);?></h1></div>
 <div style="float: right; width: auto; max-width:120px; height: 110px;">
    	<div style="width: 100%; height: 52px; font-family: Bold; font-size: 58px; color:#841a1a;"><center><?php echo date('d', strtotime(str_replace('-','/', $data)));?></center></div>
    	<div style="width: 100%; height: 52px; font-family: Bold; font-size: 28px; color:#841a1a; margin-top: 15px;"><center><?php echo $mes ?></center></div>

  </div>  
  </div>  

  <div class="container-titulos" style="margin-top:-82px;">
    <div class="titulo-contato"><?php echo $item['descricao'];?></div>
    
  </div>  

  <div class="container-titulos" style="margin-top:-75px;">
    <div class="titulo-contato">
    <div style="width: 63px; height: 63px; background-color:#841a1a; border-radius:100%; float: left; ">
    	<img src="<?php echo $install['diretorio']; ?>media/imagem/camera-galeria.png" style="margin-left: 20px; margin-top:23px;">
    </div>
    <div style="font-family: PantBold; font-size: 22px; color:#841a1a; float: left; margin-left: 20px; margin-top:15px;"><?php echo $item['fotografo'];?></div>
    </div>
    
  </div>  
   <?php
        $sql = mysqli_query($conexao, "SELECT * FROM fotos_album WHERE galeria_id='$id' order by id desc
 LIMIT 999");
         while($exibe = mysqli_fetch_assoc($sql)){?>
       <div class="container-foto-galeria" style="margin-top:15px; background-color: red;">
      	<div class="row-foto" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['imagem'];?>)">
      	<div class="efeito-galeria">
      		  <a href="<?php echo $install['diretorio']; ?>admin/uplouds/<?php echo $exibe['imagem'];?>" rel="shadowbox"><div id="lupa1"></div></a>
      	</div>
		</div>


  

       </div>
  
<?php } ?>
<?php } ?>