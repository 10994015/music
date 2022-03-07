<?php
session_start();
include_once('./conn.php');

if(isset($_GET['mailok']) && $_GET['mailok']==1){
    try{
         $upuser = $_GET['mem_usercode'];
         $mem_mail = $_GET['mem_mail'];

         $sql_str ="UPDATE member SET level  =2         
                    WHERE username =:mem_mail";
         $create_table = "CREATE TABLE IF NOT EXISTS `$upuser` (id int(5) auto_increment, down varchar(100), primary key (id))";
         $create_user = "INSERT INTO `$upuser` (down) VALUES (:mem_mail3)";

          $stmt = $conn ->prepare($sql_str);
          $stmt2 = $conn ->prepare($create_table);
          $stmt3 = $conn ->prepare($create_user);
          
          //接受資料
          
  
          $stmt -> bindParam(':mem_mail' ,$mem_mail);
          $stmt3 -> bindParam(':mem_mail3' ,$mem_mail);

          

          $stmt ->execute();
          $stmt2 ->execute();
          $stmt3 ->execute();
  
          header('Location:./login.php');
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
    <title>Party Go</title>
    <style>
        .login> form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width:45%;
            height: 300px;
            background-image: url('./images/CC02.png');
            margin:0 10px;
            background-size: cover;
            background-position: center;
            position: relative;
            padding-top: 30px;
        }
        .login> form >.loimg01{
            position: absolute;
            top: 30px;
            left:50%;
            transform: translateX(-50%);
        }
        .login> form >input{
            width:200px;
            height: 30px;
            margin:10px 0;
            padding: 0 5px;
            outline: none;
            border:none;
            border:1px #ccc solid;
            border-radius: 6px;
        }
        .login> form > a{
            color:#777;
            font-weight: 600;
        }
        .login> form >input[type="submit"]{
            border-radius: 8px;
            background-color: #D02132;
            height: 40px;
            color:#fff;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 3px 5px #000;
            outline: none;
            border:none;
            font-size: 18px;
        }
        .login{
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('./images/CC01.png');
            background-size: cover;
            width:100%;
            height: 350px;
            margin:0 auto;
            margin-left: 20px;
        }
        .login >.register{
            width:45%;
            height: 300px;
            background-image: url('./images/CC02.png');
            margin:0 10px;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;flex-direction: column;
            position: relative;
        }
        .login >.register > a{
            color:#000;
            font-weight: 600;
            font-size: 21px;
        }
        .login >.register > .reimg01{
            position: absolute;
            top: 30px;
            left:50%;
            transform: translateX(-50%);
        }
        .login >.register > .reimg02{
            margin-bottom: 15px;
        }
        .login >.register >a > img{
            width:210px;
        }
    </style>
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