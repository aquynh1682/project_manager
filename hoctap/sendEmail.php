<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['name'])&& isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    //smtp setting
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->USername = "trans1782@gmail.com";
    $mail->Password = "Sonha123456789";
    $mail->Port = 465;
    $mail-> SMTPSecure = "ss1";

    //email setting

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("Trans1782@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
        $status = "success";
        $response = "Email is send!";

    }else{
        $status = "failed";
        $response = "Somthing is wrong : <br>" . $mail->ErrorInfo;
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
}
?>