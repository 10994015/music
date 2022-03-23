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
        <div><b>餘額</b><p id="moneyyyyy"><?php echo $_SESSION['money']; ?></p></div>
        <a href="./member_logout.php" class="logout">登出</a>
    </div>
    <?php } ?>
<?php include_once('./shard.php'); ?>
    <div class="content">
    <?php include_once('./left.php'); ?>
       <div class="earn">
           <img src="./images/Q1.png" alt="" id="ordersBtn">
           <img src="./images/Q2.png" alt="" class="otherClassBtn">
           <img src="./images/Q3.png" alt="" class="otherClassBtn">
           <img src="./images/Q4.png" alt="" class="otherClassBtn">
           <img src="./images/Q5.png" alt="" class="otherClassBtn">
           <img src="./images/Q6.png" alt="" class="otherClassBtn">
       </div>
    </div>
    <div class="orderModule" id="orderModule">
        <div class="back"></div>
        <div class="box">
            <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
            <h4>是否轉入點數賺取並前往任務網站<br/>點數將轉入指定網址<br/>(操作時間:5~10分鐘)</h4>
           
            <form action="./send.php" method="post" class="boxbottom">
                <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                <input type="hidden" name="mail" value="<?php echo $_SESSION['mail']; ?>">
                <input type="submit" value="是" id="orderBtn" name="submit"><a href="javascript:;" class="orderClose">否</a>
            </form>
            <!-- <div class="boxbottom"><a href="javascript:;" id="orderBtn">是</a><a href="javascript:;" class="orderClose">否</a>
            </div> -->
        </div>
    </div>
    <div class="storeModule" id="storeModule" >
        <div class="back"></div>
        <div class="box">
            <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
            <h4>您的餘額為0，請先儲值!</h4>
            <div class="boxbottom"><a href="javascript:;" id="storeBtn">確認</a></div>
        </div>
    </div>
    <div class="taskModule" id="taskModule" >
        <div class="back"></div>
        <div class="box">
        <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
            <div class="taskBox">
                <img src="./images/123456.png" class="task">
                <img src="./images/123456.png" class="task">
                <img src="./images/123456.png" class="task">
                <img src="./images/123456.png" class="task">
                <img src="./images/123456.png" class="task">
                <img src="./images/123456.png" class="task">
                <img src="./images/123456.png" class="task">
                <img src="./images/123456.png" class="task">
            </div>
            <div class="boxbottom"><a href="javascript:;" id="taskBtn" class="disable">抽取</a></div>
        </div>
    </div>
    <input type="checkbox" id="taskchkbox">
    <div class="cardModule" id="cardModule" >
        <div class="back"></div>
        <div class="box">
            <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
            <h4>恭喜您抽到此接單任務</h4>
            <img src="./images/2323.png" alt="" id="card">
            <img src="./images/card/008.png" alt="" id="cardContent">
            <div class="boxbottom"><a href="javascript:;" id="cardBtn">確認</a></div>
        </div>
    </div>
    <div class="urlModule" id="urlModule">
        <div class="back"></div>
        <div class="box">
            <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
            任務網站:<a href="https://bit.ly/372UlWl ">https://bit.ly/3t9Gru7 </a>
        </div>
    </div>

    <div class="otherModule" id="otherModule">
        <div class="back"></div>
        <div class="box">
        <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
        <h4>請先至 "接單任務" 抽取任務</h4>
        <div class="boxbottom"><a href="javascript:;" id="otherBtn"">確認</a></div>
        </div>
    </div>
    <div class="alreadyModule" id="alreadyModule">
        <div class="back"></div>
        <div class="box">
        <div class="boxheader">通知 <i class="fas fa-times orderClose"></i> </div>
        <h4>已有任務，無法擁有多個任務</h4>
        <div class="boxbottom"><a href="javascript:;" id="alreadyBtn">確認</a></div>
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