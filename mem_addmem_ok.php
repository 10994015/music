<?php
//連線資料庫
require_once('./conn.php');

if(isset($_POST['MM_process']) && $_POST['MM_process']=='addmem'){
    try{
        $sql_str = "INSERT INTO member ( name,username,mail,pwd,chkcode,up)
                      VALUES (:mem_name,:username,:mem_mail,:mem_pwd,:mem_chkcode,:mem_usercode)";
        $stmt = $conn -> prepare($sql_str);

        $mem_name = $_POST['mem_name'];
        $username = $_POST['username'];
        $mem_mail = $_POST['mem_mail'];
        $mem_pwd = $_POST['mem_pwd'];
        $mem_usercode = $_POST['usercode'];

        $mem_chkcode = getchkcode();

        $stmt -> bindParam(':mem_name' ,$mem_name);
        $stmt -> bindParam(':mem_mail' ,$mem_mail);
        $stmt -> bindParam(':username' ,$username);
        $stmt -> bindParam(':mem_pwd' ,$mem_pwd);
        $stmt -> bindParam(':mem_chkcode' ,$mem_chkcode);
        $stmt -> bindParam(':mem_usercode' ,$mem_usercode);

        $stmt ->execute();

        // $result2 = sendMail($mem_mail,$mem_name,$mem_chkcode,$mem_usercode,$username);

        $msg =1;

        // if($result2!=1){$msg = 0;}

        header('Location:mem_addmem_ok.php?msg='.$msg);
        // header('Location:mem_addmem_ok.php');
        // header('Location:?page=mem_addmem_ok');
    }
    catch(PDOException $e){
        die("Error!:註冊失敗.....".$e->getMessage());
    }
}
//如果來自註冊表單送來的資料(將資料存入資料庫mem資料表>發信)====================================

?>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Party Go</title>
</head>
<body>
    
<?php include_once('./shard.php'); ?>
    <div class="content">
    <?php include_once('./left.php'); ?>
    <div class="memberok"">
<?php
//如果接收到msg的訊息是1時, 表示註冊成功, 發信也成功了
if(isset($_GET['msg']) && $_GET['msg']==1){
?>


<?php
    echo '<h1 data-no="4" class="display-none">註冊成功</h1>';
    echo '<h2>感謝您註冊新會員成功！<br>請返回登入介面進行登入!</h2>';
               
}



//如果接收到msg的訊息是0時, 表示註冊成功, 但發信失敗了
if(isset($_GET['msg']) && $_GET['msg']==0){
    echo '<h1 data-no="4" class="display-none">發信失敗</h1>';
    echo '<h2>註冊失敗</h2>';

}

?>
    </div>
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>
<?php


//負責發信的自定函式(收件者信箱, 收件者名稱, 確認信的驗證碼)
// function sendMail($mailto,$name,$chkcode,$mem_usercode,$username){
 
//     $subject = "=?UTF-8?B?".base64_encode('Party Go會員功能啟用通知')."?=";
//     $content = $name.'您好, 感謝申請會員<br>'
//               .'Party Go會員功能啟用通知<br>'
//               .'請點選<a href="localhost/partybox/login.php?mailok=1&mem_mail='
//               .$mailto.'&mem_chkcode='.$chkcode.'&username='.$username.'&mem_usercode='.$mem_usercode.'">此連結回覆確認信箱</a><br>'
//               .'此信件為系統自動發送, 請勿點選回覆信件'; 
   
//     $header = "From: cagletien4@gmail.com\r\n";
//     $header .= "Content-type: text/html; charset=utf8";
   
//     //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
//     $result = mail($mailto, $subject, $content, $header);
//     return $result;
//   }

//負責取得驗證碼的自定函式
function getchkcode(){
    $number = '';
    $number_len = 10;
    $stuff = '123456789123456789123456789123456789abcdefghijklmnopgrstuvwxyz';
    $stuff_last = strlen($stuff) -1;

    for($i = 0;$i<$number_len;$i++){
        $number .= substr($stuff,mt_rand(0,$stuff_last),1);
    }
    return $number;
}

?>




