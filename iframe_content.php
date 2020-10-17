<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/PHPMailer/src/Exception.php';
    require 'PHPMailer/PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include './conn.php';
        if ($conn->connect_error) {
        	die("Connection failed: ");
        }
        else{
        	$name=$email=$phone=$message="";
        	$name=$_POST["name"];
        	$email=$_POST["email"];
        	$phone=$_POST["mobileNumber"];
        	$message=$_POST["message"];
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'arunnavchetia98@gmail.com';                 // SMTP username
            $mail->Password = 'RahulAnkush98@';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
                                                // TCP port to connect to
            //Recipients
            $mail->setFrom('arunnavchetia98@gmail.com', 'Arunav Chetia');
            $mail->addAddress('raadevelopers@gmail.com', '');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('arunnavchetia98@gmail.com', 'Arunav Chetia');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');


			//Content
			$mail->isHTML(true);         // Set email format to HTML
            $mail->Subject = 'New Entry';
            $mail->Body    = 'Name:'.$name.'<br>Email:'.$email.'<br>Phone Number:'.$phone.'<br>Message:'.$message;
			// $mail->send();
			if (!$mail->send()) {
            echo "<h2 class='message'>Message is sent fail.</h3><img src='./asset/icon/correct.png'>";
            }else{
                echo "<h2 class='message'>Message is sent.</h2><img src='./asset/icon/correct.png'>";
            }
        }

            
            function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = ($data);
                      return $data;
            }
            
            
    }
    else {
        echo "<h2 class='message'>Incorrect Request</h2><img src='./asset/icon/correct.png'>";
    }    
?>