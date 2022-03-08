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
    <title>Party Go</title>
    <style>
        .content > .contact {
            display: flex;
            align-items: center;

            flex-direction: column;
            width:700px;
            padding: 100px;
        }
        .content > .contact > img{
            width:350px;
            height: 350px;
            margin: 15px 0;
        }
        @media screen and (max-width:1400px){
            .content > .contact{
                width:100%;
            }
        }
        @media screen and (max-width:400px){
            .content > .contact > img{
            width:250px;
            height: 250px;
            margin: 15px 0;
        }
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
        <div class="contact">
            <h2>聯繫客服</h2>
            <img src="./images/0024.png" alt="">
            <p>LINE ID: oep18541</p>
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