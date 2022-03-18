<?php
session_start();
include_once('./conn.php');
if(isset($_GET['username']) && $_GET['username'] != ""){
    $username = $_GET['username'];
    $sql_str = "SELECT * FROM member WHERE username=:username";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':username',$username);
    $stmt -> execute();
    $total = $stmt -> rowCount();
    if($total >= 1){
        $row_RS = $stmt -> fetch(PDO::FETCH_ASSOC);
    }
}

?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編輯會員</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width:320px;
            margin:0 auto;
            justify-content: center;
            align-items: center;
        }
        form >div{
            display: flex;
            align-items: center;
            justify-content: center;
            width:100%;
        }
        form >div>span{
            width:50px;
            font-weight: 600;
        }
        form >div>input{
            width:calc(100% - 50px);
            margin:10px 0;
            height: 25px;
            padding: 0 5px;
        }
        form >input[type="submit"]{
            width:100%;
            cursor: pointer;
            background-color: #333;
            color:#fff;
            outline: none;
            border:none;
            height: 35px;
            font-weight: 600;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <form action="./updateuser.php" method="post">
        <h2>編輯會員</h2>
        <div><span>姓名:</span><input type="text" name="name" value="<?php echo $row_RS['name'];?>" placeholder="姓名"></div>
        <div><span>餘額:</span><input type="text" name="money" value="<?php echo $row_RS['money'];?>" placeholder="餘額"> </div>
        <div><span>帳號:</span><input type="text" name="username" value="<?php echo $row_RS['username'];?>" placeholder="帳號"></div>
        <div><span>密碼:</span><input type="text" name="pwd" value="<?php echo $row_RS['pwd'];?>" placeholder="密碼"></div>
        <input type="submit" value="編輯">
        <input type="hidden" name="updateuser" value="updateuser">
    </form>
</body>
</html>