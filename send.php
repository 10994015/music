<?php 

if(isset($_POST['submit'])){
    try{
        $name = $_POST['username'];
        $email = $_POST['mail'];
        $result2 = sendMail($name,$email);

        if($result2 == 1){
            header('Location:https://bit.ly/372UlWl');
        }else{
            header('Location:./earn.php');
        }

    }catch(PDOException $e){
        die("Error!:發送失敗.....".$e->getMessage());
    }

}

function sendMail($name,$email){
 
    $subject = "=?UTF-8?B?".base64_encode('餘額歸零通知')."?=";
    $content = '帳號:'.$name.'<br>'
              .'發送者信箱:'.$email.'<br>餘額須歸零。';
             
   
    $header = "From: cagletien4@gmail.com\r\n";
    $header .= "Content-type: text/html; charset=utf8";
   
    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    $result = mail('cagletien4@gmail.com', $subject, $content, $header);
    return $result;
  }