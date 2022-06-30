<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/_samples/sample.js" type="text/javascript"></script>
<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">

  tinyMCE.init({

    // General options

    mode : "textareas",

    theme : "advanced",

    plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",



    // Theme options

    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect",

    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview",

    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,forecolor,backcolor",

    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,undo,redo,|,cite,abbr,acronym,del,|,print,|,ltr,rtl,|,fullscreen,|,charmap,iespell,media,advhr",

    theme_advanced_toolbar_location : "top",

    theme_advanced_toolbar_align : "left",

    theme_advanced_statusbar_location : "bottom",

    theme_advanced_resizing : true,



    // Example content CSS (should be your site CSS)

    content_css : "css/content.css",



    // Drop lists for link/image/media/template dialogs

    template_external_list_url : "lists/template_list.js",

    external_link_list_url : "lists/link_list.js",

    external_image_list_url : "lists/image_list.js",

    media_external_list_url : "lists/media_list.js",



    // Replace values for the template plugin

    template_replace_values : {

      username : "Some User",

      staffid : "991234"

    }

  });

</script>
<style>
body {
  margin:0;
  padding:0;
  list-style:none;
}
</style>
<?php

  // Codigo para editar noticia

  // variaveis
  $eu = $_SESSION["adm_id"];
  $data = date('Y-m-d');
  $titulo = $_POST['titulo'];
  $resumo = $_POST['resumo'];
  $status = $_POST['status'];
  $texto = $_POST['texto'];
  $projeto = $_POST['projeto'];
  $categoria = $_POST['categoria'];
  $foto = $_FILES['imagem'];
        $sql1 = mysqli_query($conexao, "SELECT * FROM noticia WHERE id='$id'");
        $exibe = mysqli_fetch_array($sql1);
        $url = NormalizaURL($titulo);
        if($_POST){
        if(!empty($foto["name"])){
        // Verifica se o arquivo é uma imagem
        if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $error[1] = "Isso n&atilde;o &eacute; uma imagem.";
              }
        // Se não houver nenhum erro
        if(count($error) == 0) {
          preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
          $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
          $caminho_imagem = "uplouds/".$nome_imagem;
          move_uploaded_file($foto["tmp_name"], $caminho_imagem);
          echo "<script>alert('Noticia Postada!');</script>";
          mysqli_query($conexao, "INSERT INTO noticia (titulo, resumo, status, texto, categoria, foto, data, criador, url, projeto) VALUES ('$titulo','$resumo','$status','$texto','0','$nome_imagem','$data','$eu','$url','$projeto')");

          header('Refresh:0');

    
        }else{
          foreach($error as $erro){
            echo $erro;
          }
        }
      }else{
        echo "<script>alert('Noticia Postada!');</script>";
         mysqli_query($conexao, "INSERT INTO noticia (titulo, resumo, status, texto, categoria,data, criador, url, projeto) VALUES ('$titulo','$resumo','$status','$texto','0','$data','$eu','$url','$projeto')");
        header('Location: ?link=noticias'); 

      }
    }




$sql = mysqli_query($conexao, "SELECT * FROM noticia WHERE id='$id'");
$item = mysqli_fetch_array($sql);
$dados_projeto = mysqli_query($conexao, "SELECT * FROM projeto WHERE status='ativo' LIMIT 10");
//$item_cad = mysqli_fetch_array($cad_noticia);
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Postar Noticia</div>
    <div id="conteudo">Tíulo:
    		<form>
			<input type="text" id="input_padrao" size="80px" name="titulo"">
            	<br />
            	Resumo:
            	<br>
				<input name="resumo" type="text" id="input_padrao" size="80px" />
        <br>
        Imagem: <span style="font-size:11px;"></span><br>
    <a href="uplouds/padrao.png" rel="shadowbox" onMouseOver="tooltip.show('Ampliar');" onMouseOut="tooltip.hide();"><img src="uplouds/padrao.png" width="210" height="114"></a><br>
    <input type="file" name="imagem"><br>
                <br />
            	Conteúdo completo:
            	<br>
    <textarea name="texto" class="ckeditor" style="width:100%;"></textarea>
                <br />
             
				  Status:
              <br>
				 <select name="status" id="input_padrao">
              			<option value="ativo">Ativo</option>
              			<option value="inativo">Inativo</option>
				</select> 
				
        
			 <br>
				<input name="submit"  type="submit" id="submit_padrao" value="Publicar" />
			</form>
	</div>


