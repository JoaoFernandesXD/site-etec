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

  $eu = $_SESSION["adm_id"];
  $data = date('Y-m-d H:i:s');
  $descricao = $_POST['descricao'];
  $titulo = $_POST['titulo'];
  $foto = $_FILES['imagem'];
  $status = $_POST['status'];
  $fotografo = $_POST['fotografo'];
        $url = NormalizaURL($titulo);
        $sql1 = mysqli_query($conexao, "SELECT * FROM galeria_album WHERE id='$id'");
        $exibe = mysqli_fetch_array($sql1);
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
          echo "<script>alert('Dados atualizados!');</script>";
          mysqli_query($conexao, "UPDATE galeria_album SET titulo='$titulo', descricao='$descricao',imagem='$nome_imagem', url='$url', status='$status', fotografo='$fotografo' WHERE id='$id'");
          header('Refresh:0');


    
        }else{
          foreach($error as $erro){
            echo $erro;
          }
        }
      }else{
        echo "<script>alert('Dados atualizados!');</script>";
       mysqli_query($conexao, "UPDATE galeria_album SET titulo='$titulo', descricao='$descricao', url='$url', status='$status', fotografo='$fotografo' WHERE id='$id'");
        header('Refresh:0');

      }
    }


}
$sql = mysqli_query($conexao, "SELECT * FROM galeria_album WHERE id='$id'");
$item = mysqli_fetch_array($sql);
?>
   <form method="post" enctype="multipart/form-data">
	<div id="bx_inicio">Editar álbum</div>
    <div id="conteudo">Título:
    		<form>
			<input type="text" id="input_padrao" size="80px" name="titulo" value="<?php echo $item['titulo']; ?>">
            	<br />
            	Descrição:
            	<br>
				<input name="descricao" type="text" id="input_padrao" size="80px" value="<?php echo $item['descricao']; ?>" />
        <br>
        Imagem: (capa)<span style="font-size:11px;"></span><br>
    <a href="uplouds/<?php echo $item['imagem']; ?>" rel="shadowbox" onMouseOver="tooltip.show('Ampliar');" onMouseOut="tooltip.hide();"><img src="uplouds/<?php echo $item['imagem']; ?>" width="210" height="114"></a><br>
    <input type="file" name="imagem"><br>
              
				  Status:
              <br>
				 <select name="status" id="input_padrao">
              			<option value="ativo"<?php if($item['status'] == 'ativo'){echo(' selected');} ?>>Ativo</option>
              			<option value="inativo"<?php if($item['status'] == 'inativo'){echo(' selected');} ?>>Inativo</option>
				</select> 
				<br />
              Fotografo:
              <br>
        <input name="fotografo" type="text" id="input_padrao" size="80px" value="<?php echo $item['fotografo']; ?>" />
        <br>
        
			</form>
				<input name="submit"  type="submit" id="submit_padrao" value="Editar" />
			
	</div>


