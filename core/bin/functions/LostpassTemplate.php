<?php 
function LostpassTemplate($user, $link)
{
	$HTML = '
		<html>
		<body style="background: #FFFFFF; font-familey: Verdana; font-size: 14px: color:#1c1b1c;">
		<div style="">
	 	<h2>Hola'.$user.'</h2>
	 	<p style="font-size: 17pz;">Solicitud de cambio de Contraseña</p>
	 	<p> El día '.date('d/m/Y',time()).' se ha generado una solicitud de recuperación de Contraseña. </br> Si no has solictiado esto, has caso omiso a este mensaje, en cambio si deseas modificar tu contraseña has clic en el enlace de abajo
	 	</p>
	 	<p sytle="padding:15px; background-color:#ECF8FF;">
	 		Para modificar tu contraseña, por favor has <a style="font-weight:bold; color: #2BA6CB" href="'.$link.'" target="_blank"> clic aquí &raquo;
	 	</p>
	 	<p style="font-size: 9px;">&copy;'.date('Y',time()).''.APP_TITLE.'. Todos los derechos reservados</p>
	 	</div>
		</body>
		</html>
	';
	return $HTML;
}
 ?>