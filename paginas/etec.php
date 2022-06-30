<?php
$sql = mysqli_query($conexao, "SELECT * FROM historia");
$item = mysqli_fetch_array($sql);
?>

      <div class="pg-imagem-curso" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/04.jpg);">
        <div class="mascara-eventos">
          <div class="container-titulos-cursos">
              <div class="titulo-curso">HISTÓRIA</div>
                <div class="rota-cursos">INICIO / Etec Deputado Salim Sedeh </div>
            </div>
        </div>
      </div>
  <div class="container-titulos">
    <div class="titulo-contato"><h1><?php echo Encurta($item['titulo'],75);?></h1></div>
 <div style="float: right; width: auto; max-width:120px; height: 110px;">
      <div style="width: 100%; height: 52px; font-family: Bold; font-size: 58px; color:#841a1a;"><center>19</center></div>
      <div style="width: 100%; height: 52px; font-family: Bold; font-size: 28px; color:#841a1a; margin-top: 15px;"><center>JUNH</center></div>

  </div>  
  </div>  

  <div class="container-titulos" style="margin-top:-82px;">
    <div class="titulo-contato"> <?php echo $item['texto'];?></div>
    
  </div>  

  <div class="container-titulos" style="margin-top:-75px;">
   
       <div class="container-foto-galeria" style="margin-top:15px; background-color: red;">
        <div class="row-foto" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/01.jpg); background-size: cover;">
        <div class="efeito-galeria">
            <a href="<?php echo $install['diretorio']; ?>admin/uplouds/01.jpg" rel="shadowbox"><div id="lupa1"></div></a>
        </div>
    </div>


        <div class="row-foto" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/02.jpg); background-size: cover;">
        <div class="efeito-galeria">
           <a href="<?php echo $install['diretorio']; ?>admin/uplouds/02.jpg" rel="shadowbox"><div id="lupa1"></div></a>
        </div>
    </div>





            <div class="row-foto" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/03.jpg); background-size: cover;">
        <div class="efeito-galeria">
            <a href="<?php echo $install['diretorio']; ?>admin/uplouds/03.jpg" rel="shadowbox"><div id="lupa1"></div></a>
        </div>
    </div>






            <div class="row-foto" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/04.jpg); background-size: cover;">
        <div class="efeito-galeria">
             <a href="<?php echo $install['diretorio']; ?>admin/uplouds/04.jpg" rel="shadowbox"><div id="lupa1"></div></a>
        </div>
    </div>





            <div class="row-foto" style="background-image:url(<?php echo $install['diretorio']; ?>admin/uplouds/05.jpg); background-size: cover;">
        <div class="efeito-galeria">
            <a href="<?php echo $install['diretorio']; ?>admin/uplouds/05.jpg" rel="shadowbox"><div id="lupa1"></div></a>
        </div>
    </div>








         

       </div>
  </div>

