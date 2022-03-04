<?php 
require_once('./conn.php');
if( !isset($_SESSION) ){
    session_start();
}

?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="./slick-1.6.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./slick-1.6.0/slick/slick-theme.css"/>
    <title>Party Box</title>
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
        <div class="center">
            <div class="hotspot">
                <h2>排行總榜</h2>
                <div class="hotspotBox">
                    <div class="title">
                        <span class="t1">名次</span>
                        <span class="t2">會員帳號</span>
                        <span class="t3">名稱</span>
                        <span class="t4">獎金累積</span>
                    </div>
                    <div class="list">
                        <span class="l1">1</span>
                        <span class="l2">sxe7654</span>
                        <span class="l3">王O哲</span>
                        <span class="l4">16886500</span>
                    </div>
                    <div class="list">
                        <span class="l1">2</span>
                        <span class="l2">love0207</span>
                        <span class="l3">李O</span>
                        <span class="l4">14259200</span>
                    </div>
                    <div class="list">
                        <span class="l1">3</span>
                        <span class="l2">coeksw2</span>
                        <span class="l3">蘇O范</span>
                        <span class="l4">14100000</span>
                    </div>
                    <div class="list">
                        <span class="l1">4</span>
                        <span class="l2">vkh800</span>
                        <span class="l3">黃O藤</span>
                        <span class="l4">13685000</span>
                    </div>
                    <div class="list">
                        <span class="l1">5</span>
                        <span class="l2">gaqc616</span>
                        <span class="l3">王O綸</span>
                        <span class="l4">12675040</span>
                    </div>
                    <div class="list">
                        <span class="l1">6</span>
                        <span class="l2">ssj6580</span>
                        <span class="l3">林O祥</span>
                        <span class="l4">12548500</span>
                    </div>
                    <div class="list">
                        <span class="l1">7</span>
                        <span class="l2">sch8vc</span>
                        <span class="l3">周O</span>
                        <span class="l4">12254900</span>
                    </div>
                    <div class="list">
                        <span class="l1">8</span>
                        <span class="l2">je520ac</span>
                        <span class="l3">楊O婷</span>
                        <span class="l4">11547000</span>
                    </div>
                    <div class="list">
                        <span class="l1">9</span>
                        <span class="l2">9654dfac</span>
                        <span class="l3">吳O翰</span>
                        <span class="l4">11326500</span>
                    </div>
                    <div class="list">
                        <span class="l1">10</span>
                        <span class="l2">zzpa5zz</span>
                        <span class="l3">曹O祈</span>
                        <span class="l4">10935100</span>
                    </div>
                </div>
            </div>
            
            <div class="message">
                <h2>訊息公告</h2>
                <div class="messatgeItem">
                    <div class="item active">最新公告</div>
                    <div class="item">活動公告</div>
                    <div class="item">系統公告</div>
                    <div class="item">客服公告</div>
                </div>
                <div class="post1">
                    <a href="javascript:;" class="list">
                        <h4 class="class">活動</h4>
                        <div class="date">22/03/01</div>
                        <h4 class="title">【霍爵樂團活動】限定ATM通路回饋活動霍爵樂團活動】限定ATM通路回饋活動</h4>
                    </a>
                    <a href="javascript:;" class="list">
                        <h4 class="class">活動</h4>
                        <div class="date">22/03/02</div>
                        <h4 class="title">0226-0227超好康的周末加碼來囉~</h4>
                    </a>
                    <a href="javascript:;" class="list">
                        <h4 class="class">活動</h4>
                        <div class="date">22/02/20</div>
                        <h4 class="title">2月24日(四)維護公告</h4>
                    </a>
                    <a href="javascript:;" class="list">
                        <h4 class="class">活動</h4>
                        <div class="date">22/02/20</div>
                        <h4 class="title">2月24日(四)維護公告</h4>
                    </a>
                    <a href="javascript:;" class="list">
                        <h4 class="class">活動</h4>
                        <div class="date">22/02/20</div>
                        <h4 class="title">2月24日(四)維護公告</h4>
                    </a>
                    <a href="javascript:;" class="list">
                        <h4 class="class">活動</h4>
                        <div class="date">22/02/20</div>
                        <h4 class="title">2月24日(四)維護公告</h4>
                    </a>
                </div>
                <div class="more">
                    <a href="javascript:;">More...</a>
                </div>
            </div>
            
            <div class="manufacturer">
                <h2>廠商提供</h2>
                <div class="manufacturercontent">
                    <div class="item">
                        <img src="./images/0027.png" alt="">
                        <p>場景一</p>
                    </div>
                    <div class="item">
                        <img src="./images/0028.png" alt="">
                        <p>場景二</p>
                    </div>
                    <div class="item">
                        <img src="./images/0029.png" alt="">
                        <p>場景三</p>
                    </div>
                    <div class="item">
                        <img src="./images/0030.png" alt="">
                        <p>場景四</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="smallImg">
                <img src="./images/0016.png" alt="">
                <!-- <img src="./images/0019.png" alt="" class="text"> -->
            </div>
            <div class="smallImg">
                <img src="./images/0017.png" alt="">
            </div>
            <div class="music">
                <h2>音樂欣賞</h2>
                <div class="musicContent">
                    <iframe  src="https://www.youtube.com/embed/9rlo5K2r3Sg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="popular">
                <h2>熱門推薦</h2>
            </div>
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