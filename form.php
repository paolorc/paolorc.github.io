<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['f_name'];
		$email = $_POST['f_email_from'];
		$subject = $_POST['f_subject'];
		$message = $_POST['f_content'];
		$from = $email; 
		$to = 'm.vallejos.a@hotmail.com';
		
		$body = "Cliente: $name\n  Consulta:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Ingrese un nombre';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Ingrese una direccion de e-mail v&aacute;';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Ingrese su consulta';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>