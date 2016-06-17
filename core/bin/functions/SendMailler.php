<?php 
function SendMailler($email, $user, $link, $tipo)
{
	$mail = new PHPMailer;

	$mail->CharSet = "UTF-8";
	$mail->Encoding = "quoted-printable";
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = PHPMAILER_HOST;
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = PHPMAILER_USER;                 // SMTP username
	$mail->Password = PHPMAILER_PASS;                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also 
	$mail->Port = PHPMAILER_PORT;                                    // TCP port to connect to

	$mail->setFrom(PHPMAILER_USER, APP_TITLE); // Quien lo mandas 

	$mail->addAddress($email, $user);     // Aquien le llega
	
	$mail->isHTML(true);                                  // Set email format to HTML

	switch ($tipo) {
		case 'reg':
			$mail->Subject = 'Activación de tu cuenta';
			$mail->Body    = EmailTemplate($user, $link);
			$mail->AltBody = 'Hola'.$user.'para activar tu cuenta accede al siguiente enlace'.$link ;
			break;
		case 'lostpass':
			$mail->Subject = 'Activación de tu cuenta';
			$mail->Body    = LostpassTemplate($user, $link);
			$mail->AltBody = 'Hola'.$user.'para recuperar tu contraseña accede al siguiente enlace'.$link ;
			break;
		
	}
	if(!$mail->send()) {
	    return $mail->ErrorInfo;
	} else {
	    return true;
	}
}
 ?>