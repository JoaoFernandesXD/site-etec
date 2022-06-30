<?php if ($ver['cargo'] == '1') { ?>
    <a href="javascript:abreFecha('#menu_c2')">
        <div id="c_menu" style="margin-top: 40px;">
            <div id="menu_c1">
                <div id="menu_1">Meus dados</div>
                <div id="menu_a"></div>
            </div></a>

    <div id="menu_c2">
        <a href="?link=meus_dados"><div id="sub-menu">Meus dados</div></a>

    </div>
    </div>
    <!-- -->
    <a href="javascript:abreFecha('#menu_c3')">
        <div id="c_menu">
            <div id="menu_c1">
                <div id="menu_1">Administração</div>
                <div id="menu_a"></div>
            </div></a>

    <div id="menu_c3">
        <a href="?link=dados_site"><div id="sub-menu">Configuração do site</div></a>
        <a href="?link=equipe"><div id="sub-menu">Equipe</div></a>
        <a href="?link=historia"><div id="sub-menu">História</div></a>
        <a href="?link=contato"><div id="sub-menu">Contato</div></a>
        <a href="?link=aviso"><div id="sub-menu">Aviso</div></a>
    </div>
    </div>	
    <!-- -->
    <a href="javascript:abreFecha('#menu_c4')">
        <div id="c_menu">
            <div id="menu_c1">
                <div id="menu_1">Direção de conteúdo</div>
                <div id="menu_a"></div>
            </div></a>

    <div id="menu_c4">
        <a href="?link=slide"><div id="sub-menu">Slide</div></a>
        <a href="?link=galeria"><div id="sub-menu">Galeria</div></a>
        <a href="?link=add-album-foto"><div id="sub-menu">Upload de imagens álbum</div></a>
        <a href="?link=projeto"><div id="sub-menu">Eventos</div></a>
        <a href="?link=noticias"><div id="sub-menu">Noticia</div></a>
        <a href="?link=curso"><div id="sub-menu">Curso</div></a>
    </div>
<?php } else { ?>
    <a href="javascript:abreFecha('#menu_c2')">
        <div id="c_menu" style="margin-top: 40px;">
            <div id="menu_c1">
                <div id="menu_1">Meus dados</div>
                <div id="menu_a"></div>
            </div></a>

    <div id="menu_c2">
        <a href="?link=meus_dados"><div id="sub-menu">Meus dados</div></a>

    </div>
    </div>
    <!-- -->
    <a href="javascript:abreFecha('#menu_c3')">
        <div id="c_menu">
            <div id="menu_c1">
                <div id="menu_1">Administração</div>
                <div id="menu_a"></div>
            </div></a>

    <div id="menu_c3">
        <a href="?link=contato"><div id="sub-menu">Contato</div></a>

    </div>
    </div>    
    <!-- -->
    <a href="javascript:abreFecha('#menu_c4')">
        <div id="c_menu">
            <div id="menu_c1">
                <div id="menu_1">Direção de conteúdo</div>
                <div id="menu_a"></div>
            </div></a>

    <div id="menu_c4">
        <a href="?link=slide"><div id="sub-menu">Slide</div></a>
        <a href="?link=galeria"><div id="sub-menu">Galeria</div></a>
        <a href="?link=add-album-foto"><div id="sub-menu">Upload de imagens álbum</div></a>
        <a href="?link=projeto"><div id="sub-menu">Eventos</div></a>
        <a href="?link=noticias"><div id="sub-menu">Noticia</div></a>
    </div>
<?php } ?> 