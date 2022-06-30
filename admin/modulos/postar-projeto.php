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

  // Codigo para Postar Projeto

  // variaveis
  $eu = $_SESSION["adm_id"];
  $data = date('Y-m-d');
  $dia = $_POST['dia'];
  $mes = $_POST['mes'];
  $titulo = $_POST['titulo'];
  $resumo = $_POST['resumo'];
  $status = $_POST['status'];
  $destaque = $_POST['destaque'];
  $categoria = $_POST['categoria'];
  $inicio = $_POST['inicio'];
  $fim = $_POST['fim'];
  $foto = $_FILES['imagem'];
        $sql1 = mysqli_query($conexao, "SELECT * FROM projeto WHERE id='$id'");
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
          echo "<script>alert('Evento criado!');</script>";
          mysqli_query($conexao, "INSERT INTO projeto (titulo, resumo, status, categoria, imagem, data, criador, url, destaque, inicio, fim, dia, mes) VALUES ('$titulo','$resumo','$status','$categoria','$nome_imagem','$data','$eu','$url','$destaque','$inicio','$fim','$dia','$mes')");

          header('Refresh:0');

    
        }else{
          foreach($error as $erro){
            echo $erro;
          }
        }
      }else{
        echo "<script>alert('Evento criado!');</script>";
        mysqli_query($conexao, "INSERT INTO projeto (titulo, resumo, status, categoria, imagem, data, criador, url, destaque, inicio, fim, dia, mes) VALUES ('$titulo','$resumo','$status','$categoria','$nome_imagem','$data','$eu','$url','$destaque','$inicio','$fim','$dia','$mes')");
        header('Refresh:0');

      }
    }




$sql = mysqli_query($conexao, "SELECT * FROM projeto WHERE id='$id'");
$item = mysqli_fetch_array($sql);
$cad_noticia = mysqli_query($conexao, "SELECT * FROM cad_noticia WHERE status='ativo'");
//$item_cad = mysqli_fetch_array($cad_noticia);
?>
   <form method="post" enctype="multipart/form-data">
  <div id="bx_inicio">Criar Evento</div>
    <div id="conteudo">Título:
        <form>
      <input type="text" id="input_padrao" size="80px" name="titulo"">
              <br />
              Texto:
              <br>
        <textarea name="resumo" type="text" class="ckeditor" id="input_padrao" size="80px" value=""></textarea> 
        <br>
        Imagem (capa): <span style="font-size:11px;"></span><br>
    <a href="uplouds/padrao.png" rel="shadowbox" onMouseOver="tooltip.show('Ampliar');" onMouseOut="tooltip.hide();"><img src="uplouds/padrao.png" width="210" height="114"></a><br>
    <input type="file" name="imagem"><br>
                <br />
 Status:
              <br>
         <select name="status" id="input_padrao">
                    <option value="ativo"<?php if($item['status'] == 'ativo'){echo(' selected');} ?>>Ativo</option>
                    <option value="inativo"<?php if($item['status'] == 'inativo'){echo(' selected');} ?>>Inativo</option>
        </select> 
        <br>
          Dia do evento:<br>
        <input name="dia" type="text" id="input_padrao" size="80px" value="" />
         <br />
            Mes do evento: (EX: 06)<br>
        <input name="mes" type="text" id="input_padrao" size="80px" value="" />
      </br>
          Inicio (EX: 13:00):
              <br>
        <input name="inicio" type="text" id="input_padrao" size="80px" value="" />
        <br>
          Fim (EX: 22:00):
              <br>
        <input name="fim" type="text" id="input_padrao" size="80px" value="" />
        <br>

        <input name="submit"  type="submit" id="submit_padrao" value="Criar" />
      </form>
  </div>


