<?php
session_start();
include_once('./conn.php');

if(isset($_SESSION['name'])){
        //接收資料
        $membername = $_SESSION['username'];
        
        $sql_str = "SHOW TABLES LIKE '$membername'";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> execute();
        $tabletotal = $stmt -> rowCount();
        if($tabletotal == 1){
            $sql = "SELECT * FROM member WHERE username = :membername";
            $sql3 = "SELECT * FROM `$membername`";

            $stmt2 = $conn -> prepare($sql);
            $stmt3 = $conn -> prepare($sql3);
            $down_list = $conn -> query($sql3);
            //綁定資料
            $stmt2 -> bindParam(':membername',$membername);
            //執行
            $stmt2 -> execute();
            $stmt3 -> execute();
        
            $total = $stmt2 -> rowCount();
            $downtotal = $stmt3 -> rowCount();

            if($total>=1){
                $row_RS = $stmt2 -> fetch(PDO::FETCH_ASSOC);
                $upuser =  $row_RS['username'];
                // echo "user=>".$upuser;
            }
            $downArr = [];
            $moneyArr = [];
            foreach($down_list as $item){
                // echo "down=>".$item['down'].'<br>';
                array_push($downArr, $item['down']);
            }
            foreach($downArr as $d){
                $select_sql = "SELECT * FROM member WHERE username = :user";
                $stmt4 = $conn -> prepare($select_sql);
                $stmt4 -> bindParam(':user',$d);
                $stmt4 -> execute();
                $usertotal = $stmt4 -> rowCount();
                
                if($usertotal>=1){
                    $row_user_RS = $stmt4 -> fetch(PDO::FETCH_ASSOC);
                    $money = $row_user_RS['money'];
                    array_push($moneyArr,$money);
                }
            }
            echo $usertotal;
            print_r($moneyArr);

        }else{
            $sql = "SELECT * FROM member WHERE username = :membername";
            $stmt2 = $conn -> prepare($sql);
            $stmt2 -> bindParam(':membername',$membername);
            $stmt2 -> execute();
            $total = $stmt2 -> rowCount();

            if($total>=1){
                $row_RS = $stmt2 -> fetch(PDO::FETCH_ASSOC);
                // $upuser =  $row_RS['username'];
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
    <style>
        .downcontant{
            display: flex;
        }
        .downname > p{
            width:200px;
            height: 30px;
            border:1px #000 solid;
            padding: 0 10px;
            line-height: 30px;
        }
        .money > p{
            width:100px;
            height: 30px;
            border:1px #000 solid;
            padding: 0 10px;
            line-height: 30px;
        }
    </style>
    <title>Party Go</title>
</head>
<body>
<?php if(isset($_SESSION['name'])){ ?>
    <div class="memberinfo">
        <div><b>帳號</b><p><?php echo $_SESSION['username']; ?></p></div>
        <div><b>餘額</b><p><?php echo $_SESSION['money']; ?></p></div>
        <a href="./member_logout.php" class="logout">登出</a>
    </div>
    <?php } ?>
<?php include_once('./shard.php'); ?>
    <div class="content">
    <?php include_once('./left.php'); ?>
        <div class="memberCenter">
            <p>暱稱:<?php echo  $row_RS['name'];?></p>
            <p>帳號:<?php echo  $row_RS['username'];?></p>
            <p>個人網址:http://www.partyboxxxxxx.com/register.php?code=<?php echo  $row_RS['chkcode'];?></p>
            <h2>你的下線</h2>
            <div class="downcontant">
            <?php if($tabletotal < 1){echo "您尚無下線";}else{?>
            <div class="downname">
                <p>帳號</p>
                <?php foreach($downArr as $item){?>
                <p><?php echo $item; ?></p>
                <?php } ?>
            </div>
            <div class="money">
                <p>餘額</p>
                <?php foreach($moneyArr as $item){?>
                <p><?php echo $item; ?></p>
                <?php }} ?>
            </div>
            </div>

           
        </div>
        
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>

    
<?php
}else{

?>
<?php include_once('./error.php') ?>
<?php } ?>