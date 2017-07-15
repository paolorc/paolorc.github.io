<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['f_name'];
		$email = $_POST['f_email_from'];
		$subject = $_POST['f_subject'];
		$message = $_POST['f_content'];
		$prod_1 = $_POST['prod_1_amount'];
		$prod_2 = $_POST['prod_2_amount'];
		$prod_3 = $_POST['prod_3_amount'];
		$prod_4 = $_POST['prod_4_amount'];
		$prod_5 = $_POST['prod_5_amount'];
		$prod_6 = $_POST['prod_6_amount'];
		$from = $email; 
		$to = 'm.vallejos.a@hotmail.com';
		
		$body = "Cliente: $name\n  Consulta:\n $message";

		if ($prod_1 != 0 || $prod_2 != 0 || $prod_3 != 0 || $prod_4 != 0 || $prod_5 != 0 || $prod_6 != 0) {

				$body = "$body\n Cotizacion incluida:\n
						$prod_1 x Natural Gloss\n
						$prod_2 x Odor Eliminator\n
						$prod_3 x Carwash\n
						$prod_4 x Heavy Spot Cleaner\n
						$prod_5 x Tire Shine\n
						$prod_6 x Paños de microfibra";
		}

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
if (!$errName && !$errEmail && !$errMessage) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>