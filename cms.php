<?php
session_start();
include_once('./conn.php');
if(isset($_SESSION['name'])){
    
    try {
        $sql_str = "SELECT * FROM member ORDER BY id ASC";
       
        $RS_member = $conn -> query($sql_str);
        //返回$RS_mb資料集的列數，也就是記錄筆數
        $total_member = $RS_member -> rowCount();
      } 
      catch ( PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
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
    <style>
    .cms {
        display: flex;
        flex-direction: column;
    }
    
    .userlist{
        border-bottom:1px #000 solid;
    }
    </style>
</head>
<body>

    <div class="content">
    <?php if($_SESSION['mem_level'] > 2) {?>
       <div class="cms">
        <h1><?php echo "會員總數:".$total_member;?></h1>
       <?php foreach($RS_member as $item){ ?>
            <div class="userlist">
                <a href="./account.php?user=<?php echo $item['username'];?>" class="list">
                    <p>帳號:<?php echo $item['username']; ?></p></a>
                    <p>密碼:<?php echo $item['pwd']; ?></p>
                    <p>信箱:<?php echo $item['mail']; ?></p>
                    <p>姓名:<?php echo $item['name']; ?></p>
                    <p>餘額:<?php echo $item['money']; ?></p>
                    <p>上線:<?php if( $item['up']==NULL){echo "無";}else{echo $item['up'];} ?></p>
                    <p>網址:http://www.partyboxxxxxx.com/register.php?code=<?php echo $item['chkcode']; ?></p>
                <a href="./updateMoney.php?user=<?php echo $item['username'];?>">編輯餘額</a>
            </div>
        <?php } ?>
       </div>
    <?php }else{ ?>
        <h1>您沒有權限進入此網站!!!</h1>
    <?php  }?>
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>
<?php
}else{
echo "找不到此頁面。";
?>

<?php } ?>