<?php
	/*$_POST[]*/
	$email = $_POST['email'];
	$message = $_POST['message'];

	$error = '';
	if(trim($email) == '')
		$error = 'Введіть ваш email !!!';
	else if(trim($message) == '')
		$error = 'Введіть повідомлення !!!';
	else if(strlen($message) < 10)
		$error = 'Повідомлення має містити більше 10 символів !!!';
	if ($error != '') {
		echo $error;
		exit;
	}

	$subject = "=?utf-8?B?".base64_encode("Відгук")."?=";
	$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html;charset=utf-8\r\n";
	mail('tankow79.3@gmail.com', $subject, $message, $headers);

	
	$message1 = "wrong answer";
	echo "<script type='text/javascript'>alert('$message1');</script>";
	header('Location: /about.php');

?>