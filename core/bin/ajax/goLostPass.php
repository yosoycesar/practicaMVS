<?php 

$db = new Conexion();
$email = $db->real_escape_string($_POST['email']);
$sql = $db->query("SELECT id, user FROM ussers WHERE email='$email' LIMIT 1;");

if ($db->rows($sql)>0) {
	$data = $db->recorrer($sql);
	$id = $data[0];
	$user = $data[1];
	$keypass = md5(time());
	$new_pass = strtoupper(substr(sha1(time()),0,8));
	$link = APP_URL.'?view=lostpass&key='.$keypass;

	$correo = SendMailler($email, $user, $link,'lostpass');
	if ($correo) {
		$update = ActualizaLostPass($keypass, $new_pass, $id);
		if ($update) {
			$HTML = 1;	
		}else {
			$HTML = '
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">X</button> 
					<h4>Error!!!</h4>
					<p><strong>Error al actualizar password, Favor de llamar a soporte tecnico..</strong></p> 
				</div>'
			;
		}	
	} else {
		$HTML = '
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">X</button> 
					<h4>Error!!!</h4>
					<p><strong>Error "'.$correo.'", Favor de llamar a soporte tecnico..</strong></p> 
				</div>'
			;
	}
} else {
	$HTML = '
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">X</button> 
			<h4>Error!!!</h4>
			<p><strong>El email solicitado no existe en el sistema..</strong></p> 
		</div>'
	;
}

$db->liberar($sql);
$db->close();

echo $HTML;
 ?>