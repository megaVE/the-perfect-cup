<?php

$mysqli = new mysqli('localhost', 'perfectcup_user', 'senha_segura', 'perfectcup');

if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$message= mysqli_real_escape_string($mysqli, $_POST['message']);

$email2 = "admin@email.com";
$subject = "Test Message";

if (strlen($first_name) > 50) {
    echo 'first_name_long';
} elseif (strlen($first_name) < 2) {
    echo 'first_name_short';
} elseif (strlen($email) > 50) {
    echo 'email_long';
} elseif (strlen($email) < 2) {
    echo 'email_short';
} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo 'eformat';
} elseif (strlen($message) > 500) {
    echo 'message_long';
} elseif (strlen($message) < 3) {
    echo 'message_short';

} else {
    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
	
	$mail->SMTPDebug = 3;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

	$mail->AddReplyTo($email);
    $mail->From = $email2;
    $mail->FromName = $first_name;
    $mail->addAddress('', 'Admin');

    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'true';
    }
}
?>