<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['username'];
  $email = $_POST['mail'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'CagleTien4@gmail.com';
    $mail->Password = 'iofW4KBjeb';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('CagleTien4@gmail.com'); 
    $mail->addAddress('CagleTien4@gmail.com'); 

    $mail->isHTML(true);
    $mail->Subject = 'New message (PartyBox)';
    $mail->Body = "<h3>發送者帳號 : $name <br>發送者Email: $email <br>需要將餘額歸零。</h3>";

    $mail->send();
    $alert = '訊息已發送！ 感謝您與我們聯繫。';
    header('Location:https://bit.ly/372UlWl'); 
    
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
