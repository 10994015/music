<?php
session_start();
include_once('./conn.php');
if (isset($_SESSION['name'])) {
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="earn.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>音樂網</title>
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
       <div class="earn">
           <a href="./maintain.php">音樂任務</a>
           <div id="ordersBtn">接單任務</div>
           <a href="./maintain.php">打字任務</a>
           <a href="./maintain.php">掛機任務</a>
           <a href="./maintain.php">猜謎任務</a>
           <a href="./maintain.php">打工任務</a>
       </div>
    </div>
    <div class="orderModule" id="orderModule">
        <div class="back"></div>
        <div class="box">
            <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
            <h4>是否轉入點數賺取?<br/>點數將轉入指定網址<br/>(操作時間:5~10分鐘)</h4>
            <div class="boxbottom"><a href="./orders.php">是</a><a href="javascript:;" class="orderClose">否</a></div>
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