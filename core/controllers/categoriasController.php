<?php 

if (isset($_SESSION['app_id']) and $users[$_SESSION['app_id']]['permisos'] = 2) {
	
	$isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id']>=1;
	require ('core/models/class.Categorias.php');
	$categorias = new Categorias();

	switch (isset($_GET['mode']) ? $_GET['mode']: null) {
		case 'add':
			if ($_POST) {
				$categorias->Add();
			} else {
				include (HTML_DIR.'categorias/add_categoria.php');
			}
							
			break;
		case 'edit':
			if ($isset_id and array_key_exists($_GET['id'],$_categorias)) {
				if ($_POST) {
					$categorias->Edit();
				} else {
					include (HTML_DIR.'categorias/edit_categoria.php');
				}
				
			} else {
				header('location: ?view=categorias');
			}
			
			break;
		case 'delete':
			if ($isset_id) {
			$categorias->Delete();	
			}else {
	        header('location: ?view=categorias');
	      }
			break;
		default:
			$db = new Conexion();
			$sql = $db->query("SELECT * FROM categorias;");
			
			include (HTML_DIR. 'categorias/all_categoria.php');
			
			$db->liberar($sql);
			$db->close();
		break;
	}
} else {
	header('location: ?view=index');
}

 ?>