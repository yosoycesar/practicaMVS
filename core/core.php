<?php 

session_start();
#Constantes de la APP
define('HTML_DIR','html/');
define('APP_TITLE','OcrendBB');
define('APP_COPY','Copy Rigth &copy;'.date('Y',time()).'Ocrend Sotware.');
define('APP_URL','http://localhost/Ocrendbb/');

#Constantes de Conexion
define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ocrendbb');

#Constantes de PHPMAILER
define('PHPMAILER_HOST', 'p3plcpnl0173.prod.phx3.secureserver.net');
define('PHPMAILER_USER', 'public@ocrend.com');
define('PHPMAILER_PASS', 'Prinick2016');
define('PHPMAILER_PORT', 465);

#Estructuras
require('vendor/autoload.php');
require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/Categorias.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/SendMailler.php');
require('core/bin/functions/RegistraUsuario.php');
require('core/bin/functions/LostpassTemplate.php');
require('core/bin/functions/ActualizaLostPass.php');

#Variables
$users = Users();
$_users = Users();
$_categorias = Categorias();
 ?>