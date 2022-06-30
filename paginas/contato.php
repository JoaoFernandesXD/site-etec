<script type="text/javascript">
   // by: João Fernandes (jhfernandes.com)
var contato = {
    iniciar:function(){
        $('.button-contato').click(function(){
           var nome = $.trim($('#nomecontato').val());
           var email = $.trim($('#emailcontato').val());
           var assunto = $.trim($('#assuntocontato').val());
           var mensagem = $.trim($('#mensagemcontato').val());
           var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
           if(nome == '' || email == '' || assunto == '' || mensagem == ''){
                    alert('Preencha todo os campos!');
                }else if(!filter.test(email)){
                    alert('Por favor, informe um email válido.');
                }
                else{
                   $.ajax({
                        url:"paginas/ajax/contato.php",
                        type:'POST',
                        data:{'nome':nome, 'email':email, 'assunto':assunto, 'mensagem':mensagem,},
                         beforeSend:function(){
                        $('.container-contato').animate({opacity:0.5});
                        },success:function(html){
                            $('.container-contato').animate({opacity:1});
                            alert('Mensagem enviada!');
                            window.location.reload();
                        }

                   });
                }
        });
    }
}
$(document).ready(function() {
    contato.iniciar();
});
</script>
			<div class="pg-imagem-curso" style="background-image:url(media/imagem/contato.png);">
				<div class="mascara-eventos">
					<div class="container-titulos-cursos">
							<div class="titulo-curso">CONTATO</div>
								<div class="rota-cursos">INICIO / CONTATO </div>
						</div>
				</div>
			</div>
  <div class="container-titulos">
    <div class="titulo-contato"><h1>Ficou com dúvidas? envie uma mensagem.</h1></div>

  </div>  

  <div class="container-titulos" style="margin-top:-82px;">
    <div class="titulo-contato">Formulario para entrar em contato com a Etec Deputado Salim Sedeh.</div>
    
  </div>  
      <form class="container-contato" action="javascript:;">
       <input type="text" id="nomecontato" style="max-width: 538px;" placeholder="Nome">
       <input type="text" id="emailcontato" style="max-width: 538px;" placeholder="E-mail">
       <input type="text" id="assuntocontato" style="margin-top:50px;" placeholder="ASSUNTO DA MENSAGEM">

       <textarea style="margin-top:50px;" id="mensagemcontato" placeholder="ESCREVA SUA MENSAGEM"></textarea>


       <a href="#"><div class="button-contato"><div class="p1" style="margin-top:25px;">ENVIAR</div></div></a>
    </form>
  


      <section class="containner" style="margin-top:200px;">
    <div class="content-contato " id="contentR">
       <div class="maps">
        <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3694.7207432147075!2d-47.393600399999976!3d-22.1746996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c80bc099687033%3A0x3666a13cd3988cb7!2sEscola+T%C3%A9cnica+Estadual+Deputado+Salim+Sedeh!5e0!3m2!1spt-BR!2spt!4v1443409883174"  frameborder="0"  allowfullscreen></iframe>
      </div>
    </div>
      <div class="content-contato contentcontato">
        <div class="conent-curso-contato">
            <h2>Rua Neida Zencker Leme 500 - Cidade Jardim, Leme</h2>
            <h1>Secretaria Acadêmica: Segunda a sexta-feira de 7h às 23h</h1>
           <a href="https://www.google.com.br/maps/place/Escola+T%C3%A9cnica+Estadual+Deputado+Salim+Sedeh/@-22.174348,-47.3961352,17z/data=!3m1!4b1!4m5!3m4!1s0x94c80bc099687033:0x3666a13cd3988cb7!8m2!3d-22.174348!4d-47.3939465" target="_blank"><div class="content-info-curso-botao-contato"><div class="p1" style="margin-top:25px;">VISITAR NO GOOGLE MAPS</div></div></a>
        </div>
    </div>
  </section>
