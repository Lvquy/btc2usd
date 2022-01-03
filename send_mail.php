<?php
	require('db.php');
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

    if (isset($_POST["btc"])){
    	
    	$btc = $_POST["btc"];
    	$eth = $_POST["eth"];
    	$time = $_POST["time"];
    	$fullname = "Guest";
    	$subject = "Notify BTC";
    	$content_mail = "BTC price is: ".$btc."<br>";
    	$content_mail .= "ETH price is: ".$eth."<br>";
    	$content_mail .= $time;
    	$email_value = "";

    	//get list email from db
    	$query_get_email = "SELECT * FROM users LIMIT 0,5";
    	$result_get_email = mysqli_query($con,$query_get_email);
    	// $row = $result_get_email -> fetch_array(MYSQLI_ASSOC);
    	
    	// loop email
    	while($row = mysqli_fetch_array($result_get_email)){
    		$email_value = $row["email"];
    		$mail = new PHPMailer(true);
	    	// send  mail
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
				    $mail->setFrom('vncard.notify@gmail.com', 'Notify.Binance');
			        $mail->addAddress($email_value, $fullname);     //Add a recipient
				    $mail->Subject = $subject;
			        $mail->Body    = $content_mail; 

			        $mail->send();
			        echo 'Send ok: ', $email_value;
		    	}
		    	catch (Exception $e) {
	    			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
    	}
    	
    	

    	
   
    }
?>