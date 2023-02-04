<html>
<head>
    <title>Send Mail</title>
</head>
<body>
    <form method="post">
        <input type="text" name="to" placeholder="To: ">
        <input type="text" name="subject" placeholder="Subject: ">
        <input type="text" name="message" placeholder="Message: ">
        <input type="submit" value="Send" name="sendMail">
    </form>
    <?php
    phpinfo();
    /*
        $from = "hygorhpimentel@live.com";
        ini_set('SMTP', "smtp-mail.outlook.com");
        ini_set('smtp_port', "587");
        ini_set('sendmail_from', $from);

        @$to = $_POST['to'];
        @$subject = $_POST['subject'];
        @$message = $_POST['message'];

        if(isset($_POST['sendMail'])){
            mail($to, $subject, $message);
        }*/
    ?>
</body>
</html>