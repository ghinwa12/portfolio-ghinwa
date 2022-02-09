<?php       
    use PHPMailer\PHPMailer\PHPMailer;
    if (isset($_GET['name']) && isset($_GET['email'])) {
        $i=0;
        $name = $_GET['name'];
        $email = $_GET['email'];
        $subject = $_GET['subject'];
        $body = $_GET['body'];
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        $mail->isSMTP(); 

       //$mail->Host = "smtp.office365.com";
       $mail->Host = "smtp.gmail.com";

        $mail->SMTPAuth = true;
        $mail->Username = "ghinwaeljaroush@gmail.com";
        $mail->Password = "ghinwa123";
    
        
        $mail->Port = 587; //587  465
        $mail->SMTPSecure = "tls"; //tls  ssl

        $mail->isHTML(true);

      $mail->setFrom("ghinwaeljaroush@gmail.com");
        $mail->addAddress($email);
        $mail->IsHTML(true); 
        
        $mail->Subject = $subject; 
        
       $mail->Body = 
       'Hi&nbsp;'.$name.'!<br><br><b>Thank you for contacting us</b>,&nbsp;your message have been successfully sent and our team will contact you as soon as possible.';

        
        $mail->AtlBody ='this is the body in plain text for non-HTML ';
        
        if ($mail->send()) {
          echo '<body onload="alert(\'Email has been sent successfully\')">';
          echo '<meta http-equiv="refresh" content="1;index.php">';
        } else {
          $status = "failed";
          $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
      
        }


        $mail = new PHPMailer();


       $mail->isSMTP();

          //$mail->Host = "smtp.office365.com";
          $mail->Host = "smtp.gmail.com";

          $mail->SMTPAuth = true;
          $mail->Username = "ghinwaeljaroush@gmail.com";
          $mail->Password = "ghinwa123";
 
        $mail->Port = 587; //587  465
        $mail->SMTPSecure = "tls"; //tls  ssl

        $mail->isHTML(true);
        $mail->setFrom("ghinwaeljaroush@gmail.com", "no-reply");
        $mail->addAddress("ghinwaeljaroush@gmail.com",$name);

           $body  = " name: " . $name .'<br> email: '. $email . "<br> <h3>message:</h3> " . $body;
        $mail->IsHTML(true); 
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        if ($mail->send()) {
          echo '<body onload="alert(\'Email has been sent successfully\')">';
          echo '<meta http-equiv="refresh" content="1;index.php">';
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
      }

?>