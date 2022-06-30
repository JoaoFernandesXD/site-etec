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

$tipo = $_GET['tipo'];
$id = (int) $_GET['id'];
if($tipo == 'editar'){
  // Codigo para editar noticia

  // variaveis

  $texto = $_POST['texto'];
  $titulo = $_POST['titulo'];
  $status = $_POST['status'];
        $sql1 = mysqli_query($conexao, "SELECT * FROM gc_avisos WHERE id='$id'");
        $exibe = mysqli_fetch_array($sql1);
        if($_POST){
        echo "<script>alert('Dados atualizados!');</script>";
       mysqli_query($conexao, "UPDATE gc_avisos SET texto='$texto', status='$status', titulo='$titulo' WHERE id='$id'");
        header('Refresh:0');


}
}
$sql = mysqli_query($conexao, "SELECT * FROM gc_avisos WHERE id='$id'");
$item = mysqli_fetch_array($sql);
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Editar aviso</div>
    <div id="conteudo">Título:
    		<form>
			<input type="text" id="input_padrao" size="80px" name="titulo" value="<?php echo $item['titulo']; ?>">
            	<br />
            	Texto:
            	<br>
				<textarea name="texto" id="input_padrao" size="80px" value=""><?php echo $item['texto']; ?></textarea>
				  Status:
              <br>
				 <select name="status" id="input_padrao">
              			<option value="ativo"<?php if($item['status'] == 'ativo'){echo(' selected');} ?>>Ativo</option>
              			<option value="inativo"<?php if($item['status'] == 'inativo'){echo(' selected');} ?>>Inativo</option>
				</select> 
				<br />

        
			</form>
				<input name="submit"  type="submit" id="submit_padrao" value="Editar" />
			
	</div>


