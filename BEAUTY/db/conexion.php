<?php
	

	$d = 'mysql:dbname=beauty;host=localhost;';
	$user = 'root';
	$password = '';

	try{
		$pdo = new PDO($d, $user, $password);
	}catch( PDOException $e ){
		echo '<div class="box-body">
		<br><div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> ¡ERROR!</h4>
                Debido a un error de conexión interna con el sistema, no podrás acceder.<br> Ponte en contacto con el administrador a cargo al siguiente teléfono <b>(834) - 247 - 3461</b> o correo electrónico <b>beautyseams@ayuda.com</b>.<br> Lamentamos el problema, pronto será solucionado.

              </div></div>';
	}


?>