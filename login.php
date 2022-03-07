<?php
session_start();
include_once('./conn.php');

if(isset($_GET['mailok']) && $_GET['mailok']==1){
    try{

        if(isset($_GET['mem_usercode']) && $_GET['mem_usercode']!=""){
            $mem_mail = $_GET['mem_mail'];
            $upuser = $_GET['mem_usercode'];
            $sql_str ="UPDATE member SET level  =2         
            WHERE mail =:mem_mail";
            $create_table = "CREATE TABLE IF NOT EXISTS `$upuser` (id int(5) auto_increment, down varchar(100), primary key (id))";
            $create_user = "INSERT INTO `$upuser` (down) VALUES (:mem_mail3)";
            
            $stmt = $conn ->prepare($sql_str);
            $stmt2 = $conn ->prepare($create_table);
            $stmt3 = $conn ->prepare($create_user);

            $stmt -> bindParam(':mem_mail' ,$mem_mail);
            $stmt3 -> bindParam(':mem_mail3' ,$mem_mail);

            $stmt ->execute();
            $stmt2 ->execute();
            $stmt3 ->execute();
    
        }else{
            $mem_mail = $_GET['mem_mail'];
            $sql_str ="UPDATE member SET level  =2         
                       WHERE mail =:mem_mail";
             $stmt = $conn ->prepare($sql_str);
             //接受資料
             $stmt -> bindParam(':mem_mail' ,$mem_mail);
             $stmt ->execute();
        }
        //   header('Location:./login.php');
    }
    catch(PDOException $e){
      die('Error!!:'.$e->getMessage());
    }
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
                <a href="###">忘記密碼?</a>
                <input type="submit" class="submit-btn" value="登入" />
            </form>
            <div class="register">
                <img src="./images/CC03.png" alt="" class="reimg01">
                <img src="./images/CC09.png" alt="" class="reimg02">
                <a href="./register.php"><img src="./images/CC04.png" alt=""></a>
            </div>
        </div>
        
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>