<?php
session_start();
include_once('./conn.php');
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
    .company{
        margin:20px 50px;
        width:700px;
    }
    .company h4 {
        color:#1484c4;
        margin-bottom: 20px;
        font-size: 36px;
        border-bottom:3px #1484c4 solid;
    }
    .company p{
        width:700px;
        line-height: 1.5;
    }
    </style>
</head>
<body>
    
<?php include_once('./shard.php'); ?>
    <div class="content">
    <?php include_once('./left.php'); ?>
        <div class="company">
            <h4>公司簡介</h4>
           <p>網路賺錢方式非常多種,但是你知道有一種方式是不用花任何成本,可能一天只需要抽出十分左
右就能賺錢的方式嗎?這正是我們網路賺錢方式:「PTC」。<br>
從21世紀初起PTC網站開始一家一家的立。這些網站最主要的目的是讓廣告主付錢網站上刊
登廣告,並讓會員或瀏覽者在網站上觀看廣告,藉此達成廣告主、會員、PTC網站三贏的局面。<br><br>

先來解釋一下PTC PTC全名是「Pay To Click」,意思就你只要擊廣告,平台就付錢
給你而後PTC平台覺得單純擊廣告太單純、太無趣,所以衍生出其他不同的玩法。<br><br>

Party GO 成立於2020年,從原本單純的PTC 網站(只有點擊廣告功能),<br>
由於大家生活習慣不斷改變，聽音樂成為大家打發時間或是通勤時的最佳紓壓管道<br>
一直到2022才取消點擊廣告的功能<br>
並更改為聽音樂的方式供用戶提供賺錢管道</p>
        </div>
        
    </div>
    
    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
    <script>
 
    </script>
</body>
</html>

