<?php
// sair de tudo
		unset ($_SESSION["adm_id"]);
		unset ($_SESSION["adm_nome"]);
		unset ($_SESSION['login']);	
		echo'<script>location.href="login.php";</script>';
		
		?>