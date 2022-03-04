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
    <title>音樂網</title>
    <style>
    .maintain{
        width:700px;
        margin:0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
    }
    .maintain > h2 {
        margin-bottom: 15px;
    }
    </style>
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
        <div class="maintain">
            <h2>將於近期更新，敬請期待。</h2>
            <img src="./images/error.jpg" alt="">
        </div>
    </div>

    <footer>
        <h2>聯繫我們</h2>
        <p>成立於2018年7月</p>
        <p>若您想成為Party Box的合作夥伴，或是你想加入Party Box成為我們的一員，都歡迎透過客服團隊聯繫我們。</p>
        <div class="footerlist">
            <div class="list">
                <h3>創造價值</h3>
                <p>除了用戶僅需要以小資本額即可參與之外<br/>資產比例用來從而增加收入<br/>並且減少市場上詐欺或詐騙等非法案例</p>
            </div>
            <div class="list">
                <h3>隱私權聲明</h3>
                <p>我們努力為客戶保護隱私並提供一個最安全的遊戲平台<br/>在此網站蒐集的資料會為您提供最卓越的服務<br/>我們不會您的個人資料給第三方<br/>對於有機會接觸客戶的個人資料和協助夥伴<br/>也必須遵守我們訂立的隱私保密規則</p>
            </div>
            <div class="list">
                <h3>幫助中心</h3>
                <p>常見問題項目，及其他問題的解答和協助;<br/>或有任何問題，請與24H線上克服聯繫。</p>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>

<?php
}else{

?>
<?php include_once('./error.php') ?>
<?php } ?>