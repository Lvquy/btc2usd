<?php
	// require('includes/db.php');
	//emailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    //emailer end
    $user_gmail = "vncard.notify";
    $pass_gmail = "vkkdajafissqnmlh";

    if (isset($_POST["email"])){
    	$email_value = $_POST["email"];
    	$btc_price = $_POST["btc_price"];
    	$fullname = "Guest";
    	$subject = "Notify BTC";
    	$content_mail = $btc_price;

    	$mail = new PHPMailer(true);

    	// send code confirm mail
    	try {
    			$mail->charSet = "UTF-8"; 
			    $mail->isSMTP();                               //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';          //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                      //Enable SMTP authentication
			    $mail->Username   = $user_gmail;               //SMTP username
			    $mail->Password   = $pass_gmail;               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      //Enable implicit TLS encryption
			    $mail->Port       = 465;  //465 587
			    $mail->isHTML(true);
			    $mail->setFrom('vncard.notify@gmail.com', 'VnCard');
		        $mail->addAddress($email_value, $fullname);     //Add a recipient
			    $mail->Subject = $subject;
		        $mail->Body    = $content_mail; 

		        $mail->send();
		        echo 1;
	    	}
	    	catch (Exception $e) {
    			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
    }
?>