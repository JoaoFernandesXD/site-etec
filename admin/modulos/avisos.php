<div id="bx_inicio">Olá <?php echo $ver['usuario']; ?></div>
  <div id="titulo_conteudo">Anotações / Avisos</div>
    <?php 
       $sql = mysqli_query($conexao, "SELECT * FROM gc_avisos ORDER BY id DESC LIMIT 30");
  while($ver = mysqli_fetch_array($sql)){
  ?>
     <div id="aviso">
  

    	<div id="aviso_t">
    	  <p><font style="font-size: 16px; font-weight:500;"><?php echo $ver['titulo'];?>s</font><br /><br/>

      <?php echo $ver['texto'];?></p></div>
     
  </div>

   <?php }?>


