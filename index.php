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
    <title>Party Go</title>
</head>
<body>
<div id="app">
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
                    <div class="listbottom">
                        <div class="list" v-for="item in user" :key="item.no">
                            <span class="l1">{{item.no}}</span>
                            <span class="l2">{{item.username}}</span>
                            <span class="l3">{{item.name}}</span>
                            <span class="l4">{{item.money}}</span>
                        </div>
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
                        <p>YouTube</p>
                    </div>
                    <div class="item">
                        <img src="./images/0028.png" alt="">
                        <p>KKBox</p>
                    </div>
                    <div class="item">
                        <img src="./images/0029.png" alt="">
                        <p>AppStore</p>
                    </div>
                    <div class="item">
                        <img src="./images/0030.png" alt="">
                        <p>MixerBox</p>
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
</div>
    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
    <script src="vue.js"></script>
    <script>
    const {reactive} = Vue;
    const App = {
        setup(){
            const user = reactive( [
                {no:4,username:'vkh800',name:'黃O藤',money:13685000},
                {no:5,username:'gaqc616',name:'王O綸',money:12675040},
                {no:6,username:'ssj6580',name:'林O祥',money:12548500},
                {no:7,username:'sch8vc',name:'周O',money:12254900},
                {no:8,username:'je520ac',name:'楊O婷',money:11547000},
                {no:9,username:'9654dfac',name:'吳O翰',money:11326500},
                {no:10,username:'zzpa5zz',name:'曹?祈',money:10935100},
                {no:4,username:'vkh800',name:'黃O藤',money:13685000},
                {no:5,username:'gaqc616',name:'王O綸',money:12675040},
                {no:6,username:'ssj6580',name:'林O祥',money:12548500},
                {no:7,username:'sch8vc',name:'周O',money:12254900},
                {no:8,username:'je520ac',name:'楊O婷',money:11547000},
                {no:9,username:'9654dfac',name:'吳O翰',money:11326500},
                {no:10,username:'zzpa5zz',name:'曹?祈',money:10935100},
                
            ])
            return {user};
        },
    };
    Vue.createApp(App).mount('#app')
        
        
    </script>
   
</body>
</html>