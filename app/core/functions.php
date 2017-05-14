<?
    function GenerateWord($max = 10)
    {
        $char = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $size = strlen($char)-1;
        $key = null;
        while($max--) { $key.=$char[rand(0,$size)]; }
        return $key;
    }
    function IsUser()
    {
        if(isset($_SESSION['web_user']['userName']) && !empty($_SESSION['web_user']['userName'])) return $_SESSION['web_user']['userName'];
        else return false;
    }
    function SendMail($to, $subject, $message)
    {
        include(BASE.'/vendor/phpmailer/phpmailer/class.smtp.php');
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.mail.ru';
        $mail->Username = 'no-reply@geam.co';
        $mail->Password = 'pass-for-reply553';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->setFrom('no-reply@geam.co', 'Geam Mailer');
        $mail->isHTML(true);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;
        return $mail->send();
    }
?>