<?php
session_start();
include_once('./conn.php');

if(isset($_GET['mailok']) && $_GET['mailok']==1){
    try{

        if(isset($_GET['mem_usercode']) && $_GET['mem_usercode']!=""){
            $mem_mail = $_GET['mem_mail'];
            $upuser = $_GET['mem_usercode'];
            $username = $_GET['username'];
            $sql_str ="UPDATE member SET level  =2         
            WHERE mail =:mem_mail";
            $create_table = "CREATE TABLE IF NOT EXISTS `$upuser` (id int(5) auto_increment, down varchar(100), primary key (id))";
            $create_user = "INSERT INTO `$upuser` (down) VALUES (:username)";
            
            $stmt = $conn ->prepare($sql_str);
            $stmt2 = $conn ->prepare($create_table);
            $stmt3 = $conn ->prepare($create_user);

            $stmt -> bindParam(':mem_mail' ,$mem_mail);
            // $stmt3 -> bindParam(':mem_mail3' ,$mem_mail);
            $stmt3 -> bindParam(':username' ,$username);

            $stmt ->execute();
            $stmt2 ->execute();
            $stmt3 ->execute();
    
        }else{
            $mem_mail = $_GET['mem_mail'];
            $sql_str ="UPDATE member SET level  =2         
                       WHERE mail =:mem_mail";
             $stmt = $conn ->prepare($sql_str);
             
             $stmt -> bindParam(':mem_mail' ,$mem_mail);
             $stmt ->execute();
        }
        //   header('Location:./login.php');
    }
    catch(PDOException $e){
      die('Error!!:'.$e->getMessage());
    }
  }

  if(isset($_GET['msg']) && $_GET['msg']==1){
      echo "<script>alert('登入失敗!')</script>";
  }
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <title>Party Go</title>
</head>
<body>
    
<?php include_once('./shard.php'); ?>
    <div class="content">
    <?php include_once('./left.php'); ?>
        <div class="login">
            <form action="./member_check.php" method="POST">
                <img src="./images/CC10.png"  class="loimg01">
                <input type="text" name="username" class="mem_mail" placeholder="請輸入帳號...." required/>
                <input type="password" name="pwd" class="mem_pwd" placeholder="請輸入密碼...." required/>
                <a href="javascript:;" id="forgettext">忘記密碼?</a>
                <input type="submit" class="submit-btn" value="登入" />
            </form>
            <div class="register">
                <img src="./images/CC03.png" alt="" class="reimg01">
                <img src="./images/CC09.png" alt="" class="reimg02">
                <a href="./register.php"><img src="./images/CC04.png" alt=""></a>
            </div>
        </div>
        
    </div>
    <div class="forgotpwd" id="forgotpwd">
        <div class="back"></div>
        <div class="box">
            <div class="boxheader">通知 <i class="fas fa-times forgetClose"></i> </div>
            <h4>請與Line客服聯繫</h4>
            <h4>給予信箱並寄送帳號密碼</h4>
            <img src="./images/0024.png" alt="">
            <h4>LineID:oep18541</h4>
            <div class="boxbottom"><a href="javascript:;" id="forgetBtn"">確認</a></div>
        </div>
    </div>
    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
    <script>
  const forgotpwd = document.getElementById('forgotpwd');
    const forgetBtn = document.getElementById('forgetBtn');
    const forgettext = document.getElementById('forgettext');
    const forgetClose = document.getElementsByClassName('forgetClose')[0];
    forgettext.addEventListener('click',()=>{
        forgotpwd.style.display = "block";
    })
    forgetBtn.addEventListener('click',()=>{
        forgotpwd.style.display = "none";
    })
    forgetClose.addEventListener('click',()=>{
        forgotpwd.style.display = "none";
    });
    </script>
</body>
</html>