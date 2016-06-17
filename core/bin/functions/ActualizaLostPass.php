<?php 
function ActualizaLostPass($keypass, $new_pass, $id)
{
	$db = new Conexion();
	if ($db->query("UPDATE ussers SET keypass='$keypass', new_pass='$new_pass' WHERE id='$id';")) {
		return true;
	} else {
		return false;
	}
	$db->close();
}

 ?>