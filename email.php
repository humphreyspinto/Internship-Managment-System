<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	function send_mail($email_to_send, $msg){

		try{
			$mail = new PHPMailer(true);

			#define smtp settings here
			$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = ''; //place your email here
			$mail->Password = ''; //place your password here
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->setFrom('internsysadmin@gmail.com', 
				'Intern Admin System');
			$mail->Subject = 'new admin';
			$mail->Body = $msg;
			$mail->addAddress();
			$mail->Send();
			return true;
		}catch(Exception $e){
			//die($mail->ErrorInfo);
			return false;	
		}
	}	
?>
