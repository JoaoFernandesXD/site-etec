<?php
ob_start();
session_start();
// FUNCOES
include('../site/funcoes.php');
// INSTALAR 
include('../site/install.php');
include("painel-config/config.php");
$data = time();
$meuip = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('America/Sao_Paulo');
$pesquisar = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM gc_logs WHERE nome='$_SESSION[adm_nome]' AND ultimo_ip='$meuip'"));
if ($pesquisar >= 0) {
    // registrar logs
    $logs = mysqli_query($conexao, "INSERT INTO gc_logs (ultimo_ip, data, nome) VALUES ('$meuip','$data','$_SESSION[adm_nome]')");
} else {
    
}
if (!isset($_SESSION['adm_id'])) {
    header("location: login.php");
}
if (isset($_GET['sair'])) {
    unset($_SESSION['adm_id']);
    unset($_SESSION["adm_nome"]);
    unset($_SESSION['login']);
    echo('<script>location.href="index.php";</script>');
}

$ver = mysqli_fetch_array(mysqli_query($conexao, "SELECT * FROM gc_usuario WHERE id='$_SESSION[adm_id]' AND status='ativo'"));
?>

<!DOCTYPE html">
<html">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Astro · Admin</title>
        <link rel="stylesheet" type="text/css" href="media/css/estilo.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        <script>
            function abreFecha(sel) {
                $(sel).slideToggle();
            }
        </script>
    </head>

    <body>

        <!--<div id="header">
                <div id="dados-header">
                <div id="f_d_header" style="background-image: url(uplouds/<?php echo $ver['imagem']; ?>);"></div>
                <div id="t_d_header">Logado como <font color="#CED8DF"><?php echo $ver['usuario']; ?></font><br />
                <font style="font-size: 11px;">Cargo atual: <font color="#CED8DF"><?php if ($ver['cargo'] == '1') {
    echo "Administrador";
} else {
    echo "Diretor de Conteudo";
} ?></font></font></div>
                <div id="dados_login">Membro desde <font color="#CED8DF"><?php echo $ver['membro']; ?></font><br />
                <font style="font-size: 11px;">Ultimo acesso: <font color="#CED8DF"><?php echo date("d/m/20y H:i:s"); ?></font></font></div>
            </div>
            
            <div id="btn_header"><a href="index.php"><div id="pag-inicial">Pagina inicial</div></a>    <a href="?sair=sim"><div id="deslogar">Deslogar</div></div></a>
        </div>-->
        <div id="b_m_l"></div>
        <div id="menu_lat">
            <div class="perfil">
                <a href="index.php"><div class="imagem" style="background-image: url(uplouds/<?php echo $ver['imagem']; ?>);"></div></a>
                <a href="index.php"><?php echo $ver['usuario']; ?></a><br/>
                <font class="sub">Membro desde <?php echo $ver['membro']; ?>
                Último acesso <?php echo date("d/m/20y H:i:s"); ?></font>
                <a href="?sair=sim"><div class="sair">Sair</div></a>
            </div>
<?php include("painel-config/modulos-menu.php"); ?>
        </div>

        <div id="copyright-painel">Copyright © 2018 Astro<br /></div>
    </div>


    <div id="base_conteudo">
        <?php
        $link = (isset($_GET['link'])) ? $_GET['link'] : 'avisos';
        if (!isset($link)) {
            include("modulos/avisos.php");
        } else {
            // file_exists() verifica se existe o diretório ou o arquivo, passado como argumento
            if (file_exists('modulos/' . $link . '.php')) {
                include ('modulos/' . $link . '.php');
            } else {

                echo ("<script>location.href=\"http://$siteURL/$PainelA/erro404.html\";</script>");
                //include('erro404.html');
            }
        }
        ?>
    </div>
</body>
</html>
