        

        <link href="<?php echo $install['diretorio']; ?>bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">
        <link href="<?php echo $install['diretorio']; ?>css/estilo.css" type="text/css" rel="stylesheet">

<?php
$tipo = $_GET['tipo'];
$id = (int) $_GET['id'];
$sql = mysqli_query($conexao, "SELECT * FROM contato WHERE id='$id'");
$item = mysqli_fetch_array($sql);
?>
              
                        <div class="formulario">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" id="nomecontato" disabled="disabled" placeholder="Nome" value="<?php echo $item['nome']; ?>">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" id="emailcontato" disabled="disabled" placeholder="E-mail" value="<?php echo $item['email']; ?>">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" id="assuntocontato" disabled="disabled" placeholder="Assunto" value="<?php echo $item['assunto']; ?>">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="<?php echo $item['texto']; ?>" disabled="disabled" id="mensagemcontato" value=""></textarea>
                                </div>
                            </div>
                           
                        </div>
                  