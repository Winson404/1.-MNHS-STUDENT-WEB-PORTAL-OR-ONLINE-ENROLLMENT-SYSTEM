<?php
session_start();
	include 'config.php';


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	function send_password_reset($faculty_username, $email, $token) {

		$mail = new PHPMailer(true);
			//Server settings
	    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
	    $mail->isSMTP();                                            //Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	    $mail->Username   = 'digiwebnex@gmail.com';                     //SMTP username
	    $mail->Password   = '***';                               //SMTP password
	    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
	    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	    //Recipients
	    $mail->setFrom('digiwebnex@gmail.com', $faculty_username);
	    $mail->addAddress($email);     //Add a recipient
	    // $mail->addAddress('ellen@example.com');               //Name is optional
	    // $mail->addReplyTo('info@example.com', 'Information');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    //Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'Reset password notification';

	    $mail_template = "
	    	<h2>Hello</h2>
	    	<h3>We have received a request to reset your password in your account.</h3>
	    	<br/><br/>
	    	<a href='https://http://localhost/MNHS_WEB%20PORTAL/password_change.php?token= $token&email=$email'>Click here!</a>
	    ";


	    $mail->Body    = $mail_template;
	    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();

	}

	if(isset($_POST['send-code-btn'])) {
		$email = $_POST['email'];
		$token = md5(rand());

		$check_email = mysqli_query($conn, "SELECT email, username FROM faculty WHERE email='$email' AND usertype='Admin' LIMIT 1 ");
		if(mysqli_num_rows($check_email) > 0) {

			$row = mysqli_fetch_array($check_email);
			$faculty_username = $row['username'];
			$email            = $row['email'];

			$update_token = mysqli_query($conn, "UPDATE faculty set token ='$token' WHERE email='$email' AND username='$faculty_username' LIMIT 1");
			if($update_token) {
				send_password_reset($faculty_username, $email, $token); //it is a function
				$_SESSION['success'] = "E-mail password reset link has been sent...";
				header("Location: index.php");
				exit(0);
			} else {
				$_SESSION['danger'] = "Invalid E-mail address...";
				header("Location: index.php");
				exit(0);
			}

		} else {
			$_SESSION['danger'] = "Invalid E-mail address...";
			header("Location: index.php");
			exit(0);
		}


	} else {
		header("Location: index.php");
	}
?>