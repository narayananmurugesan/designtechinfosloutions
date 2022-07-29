<?php
 header("Access-Control-Allow-Origin: *");
 header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

if (isset($_POST['fname']) && $_POST['lname'] && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        $to = "narayanan@designtechinfosolutions.com";
        $subject = $_POST['subject'];
        
        $message = $_POST['message'];
        $message .= `\n\n\n\n<h6>Phone: `+ $_POST['phone'] +`</h6>`;
        
      //   $header = `From:` + $_POST['email'] + `<` + $_POST['fname'] +` ` + $_POST['fname'] + `>`+`\r\n`;
        
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
         $headers .= 'From: <'+ $_POST['fname']+' '+ $_POST[lname] + '>' + $_POST[email] +'' . "\r\n";
         $headers .= "Cc:karthick@designtechinfosolutions.com \r\n";
         $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        
        $retval = mail ($to,$subject,$message,$headers);
        
        if( $retval == true ) {
            echo json_encode(array('success' => 1));
        }else {
            echo json_encode(array('success' => 0));
        }
   
} else {
    echo json_encode(array('success' => 0));
}

    ?>