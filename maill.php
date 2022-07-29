<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = new PHPMailer(true);

try {
      if (isset($_POST['fname']) && $_POST['lname'] && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {              
    $email->isSMTP();
   // $email->SMTPDebug = 2;
    $email->SMTPAuth = false;
    $email->SMTPAutoTLS = FALSE;
    $email->Host = "localhost";
    $email->Port = 25;
    $email->SMTPSecure = false;
	$email->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );													
	$email->Username = 'karthick@designtechinfosolutions.com';				
	$email->Password = 'karthick@dtis03';

	$email->setFrom($_POST['email'], $_POST['fname'] . ' ' .$_POST['lname']);		

	$email->addAddress('karthick@designtechinfosolutions.com', 'Karthickc');


	$email->isHTML(true);								
	$email->Subject = $_POST['subject'];
	$email->Body = $_POST['message']. ' ' .$_POST['phone'];

	if ($email->send()) {
        echo json_encode(array('success' => 1));
    } else {
      echo json_encode(array('success' => 0));
    }
      }else{
          	echo json_encode(array('success' => 0));
      }
} catch (Exception $e) {
	echo json_encode(array('success' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"));
}

?>
