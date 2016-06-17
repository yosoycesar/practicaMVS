<?php 

$db= new Conexion();

$user = $db->real_escape_string($_POST['user']);
$pass = Encrypt($_POST['pass']);
$email = $db->real_escape_string($_POST['email']);

$sql = $db->query("SELECT user FROM ussers WHERE user='$user' OR email='$email' LIMIT 1");

if ($db->rows($sql) == 0) {
	$keyreg = md5(time());
	$link = APP_URL.'?view=activar&key='.$keyreg;
	// Envia correo de confirmación el usuario
	$correo = SendMailler($email, $user, $link,'reg');
	if ($correo) {
		// Inserta el registro
		$insert = RegistraUsuario($user, $email, $pass, $keyreg);
		if ($insert) {
			$HTML = 1;	
		}else {
			$HTML = '
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">X</button> 
					<h4>Error!!!</h4>
					<p><strong>Error al guardar usuario, Favor de llamar a soporte tecnico..</strong></p> 
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
	$usuario = $db->recorrer($sql)[0];
	if (strtolower($user) == strtolower($usuario)) {
		$HTML = '
			<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">X</button> 
				<h4>Error!!!</h4>
				<p><strong>Usuario ya existe...</strong></p> 
			</div>'
		;
	} else {
		$HTML = '
			<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">X</button> 
				<h4>Error!!!</h4>
				<p><strong>Email ya existe...</strong></p> 
			</div>'
		;
	}
}
$db->liberar($sql);
$db->close();
echo $HTML;



 ?>