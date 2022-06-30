<?php
// CONEXAO
include ('admin/painel-config/config.php');
// INSTALAR 
include('site/install.php');
// FUNCOES
include('site/funcoes.php');

header('Content-type: text/html; charset=ISO-8859-1');
$ver = mysqli_fetch_array(mysqli_query($conexao,"SELECT * FROM gc_site WHERE id='1'"));
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
       <meta charset="utf-8"/>
       <title><?php echo $ver['titulo']; ?></title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- Estilo CSS !-->
       <link rel="stylesheet" href="<?php echo $install['diretorio']; ?>media/estilo/estilo.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src='<?php echo $install['diretorio']; ?>js/shadowbox.js' type='text/javascript'></script> 
        <link rel="stylesheet" type="text/css" href="<?php echo $install['diretorio']; ?>css/shadowbox.css" />
   </head>
   <script type="text/javascript">
  	 	$(document).ready(function(){
   			$(".carousel-item").each(function() {
      var src = $(this).find("img").attr("src");
      $(this)
      .css("background-image","url("+src+")")
      .find("img")
      .remove();
   });
});
  var paginacao = {
  iniciar:function(div, caminho, id){
    $.ajax({
      type:'POST',
      url:'ajax/Paginacao-'+caminho+'.php',
      data:{'id':id},
      beforeSend:function(){
        $(''+div+'').animate({opacity:0.5});
      },success:function(html){
        $(''+div+'').animate({opacity:1}).html(html);
      }
    });
  },tudo:function(){
    paginacao.iniciar('.ajax-noticia','Noticias','1');
    paginacao.iniciar('.ajax-galeria','Galerias','1');
    paginacao.iniciar('.ajax-evento','Eventos','1');
    paginacao.iniciar('.ajax-cursos','Cursos','1');
    paginacao.iniciar('.ajax-cursos','Medio','1');
    paginacao.iniciar('.ajax-cursos','Tecnico','1');

  }
}
$(function(){
  //paginacao.tudo();
});
   </script>
   <script>
    Shadowbox.init({
        handleOversize: "resize",
        modal: false
    });
    </script>



    

    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.0';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
   <body>

       <div class="menu">

       		<div class="menu-box">
       			<div class="conteudo-horario">
       					<img src="<?php echo $install['diretorio']; ?>media/imagem/relogio.png" style="float: left; margin-right: 15px;">
       					<h1>HORÁRIO DE FUNCIONAMENTO: 7H ÀS 23H</h1>
       					
       			</div>
       			<div class="conteudo-telefone">
       					<img src="<?php echo $install['diretorio']; ?>media/imagem/telefone.png" style="float: left; margin-right: 21px;">
       					<h1>(19) 3571-3705</h1>
       					
       			</div>
       			<a href="https://nsa.cps.sp.gov.br/" target="_blank"><div class="conteudo-area-aluno">
       					<img src="<?php echo $install['diretorio']; ?>media/imagem/cadeado.png" style="float: left; margin-right: 21px;">
       					<h1>ÁREA DO ALUNO</h1>
       					
       			</div></a>
       		</div>
       </div>
     	<header class="container">
     		<div id="container-menu">
     			<div class="container-logos">
     				<a href="<?php echo $install['diretorio']; ?>inicio"><div id="logo-etec"></div></a>
     				<div id="logo-cps"></div>
     			</div>
     				<div class="container-links">
     					<a href="<?php echo $install['diretorio']; ?>inicio"><div class="grid-1">
     						<h1>INÍCIO</h1>
     							<div class="bolinha"></div>
     					</div></a>
     					<a href="<?php echo $install['diretorio']; ?>etec"><div class="grid-1">
     						<h1>ETEC</h1>
     							<div class="bolinha"></div>
     					</div></a>
     					<a href="<?php echo $install['diretorio']; ?>noticias"><div class="grid-1">
     						<h1>NOTÍCIAS</h1>
     							<div class="bolinha"></div>
     					</div></a>
     					<a href="<?php echo $install['diretorio']; ?>galerias"><div class="grid-1">
     						<h1>GALERIA</h1>
     							<div class="bolinha"></div>
     					</div></a>
     					<a href="<?php echo $install['diretorio']; ?>eventos"><div class="grid-1">
     						<h1>EVENTOS</h1>
     							<div class="bolinha"></div>
     					</div></a>
     					<a href="<?php echo $install['diretorio']; ?>contato"><div class="grid-1">
     						<h1>CONTATO</h1>
     						 	<div class="bolinha"></div>
     					</div></a>

     				</div>	
     		</div>
     	</header>

 <?php
        $url = $_GET['url'];
        if (!isset($url)) {
            include('paginas/inicio.php');
        } else {
            if (file_exists('paginas/' . $url . '.php')) {
                include('paginas/' . $url . '.php');
            } else {
                include('paginas/erro.php');
            }
        }
        ?>
	<footer>
		<div class="containner-footer">
				<img src="<?php echo $install['diretorio']; ?>media/imagem/logo-white.png" style="margin-left: 28px; margin-top:18px;">
     			<img src="<?php echo $install['diretorio']; ?>media/imagem/cps-white.png" style="margin-left: 65px; margin-top:18px;">
     				<div class="telefone">
       					<img src="<?php echo $install['diretorio']; ?>media/imagem/telefone-maior.png" style="float: left; margin-top:10px; margin-right: 21px;">
       					(19) 3571 3705
       					
       			</div>
       			<div class="linha"></div>

       			<h1>© <?php echo date('Y'); ?>  ETEC LEME. TODOS OS DIREITOS RESERVADOS A ESTE SITE DA WEB </h1>

            <h1 style=" text-decoration-color:none !important;  text-decoration-line: none !important; text-decoration-style: none !important;"> Desenvolvido por: <a href="https://www.instagram.com/joaofernandesxd/" target="_blank">João Fernandes;</a> <a href="https://www.instagram.com/gzaghetti/" target="_blank">Guilherme Zaghetti;</a> <a href="https://www.instagram.com/fernandinhorodrigues1/" target="_blank">Fernando Rodrigues;</a></h1>
		</div>
	</footer>

   </body>
</html>