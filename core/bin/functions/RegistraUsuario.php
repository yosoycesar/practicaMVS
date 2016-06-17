<?php 
function RegistraUsuario($user, $email, $pass, $keyreg)
{
	$db = new Conexion();
	if($db->query("INSERT INTO ussers(user, pass, email, keyreg) VALUES ('$user', '$pass', '$email', '$keyreg');")){
		$sql_2 = $db->query("SELECT MAX(id) AS id FROM ussers;");
		$_SESSION['app_id'] = $db->recorrer($sql_2)[0];
		$db->liberar($sql_2);
		return true;
	}else{
		return false;
	}
	$db->close();

}
 ?>
