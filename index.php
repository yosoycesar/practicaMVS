<?php 
require('core/core.php');
$rutaCore = 'core/controllers/';
if (isset($_GET['view'])) {
	if (file_exists($rutaCore.strtolower($_GET['view']).'Controller.php')) {
		include($rutaCore.strtolower($_GET['view']).'Controller.php');
	}else{
		include($rutaCore.'errorController.php');
	}
	
} else {
	include('core/controllers/indexController.php');
}

 ?>