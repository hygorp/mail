<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Send Mail</title>
</head>
<body>
    <form method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" value="Send" name="sendMail">
    </form>
    <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        //Load Composer's autoloader
        require 'vendor/autoload.php';

        //Create an instance; passing `true` enables exceptions
        if(isset($_POST['sendMail'])){
            $code = rand(111111, 999999);
            $sentCode = $code;
            $mail = new PHPMailer(true);
            $mail->CharSet = "UTF-8";
            @$to = $_POST['email'];
            @$subject = "Código de Confirmação";
            @$message = "Seu Código de Confirmação é: '".$sentCode."'";
            try {
                //Server settings
                $mail->SMTPDebug = false;                                       //Enable verbose debug output
                $mail->isSMTP();                                               //Send using SMTP
                $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
                $mail->Username   = '';                     //SMTP username
                $mail->Password   = '';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;              //Enable implicit TLS encryption
                $mail->Port       = 587;                                        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('', '');
                $mail->addAddress($to);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
                $mail->AltBody = 'This is a Test! #phpmailer';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    ?>
</body>
</html>
