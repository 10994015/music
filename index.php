<?php 
require_once('./conn.php');
if( !isset($_SESSION) ){
    session_start();
    try{
        $sql_str = "SELECT * FROM messages  ORDER BY id DESC limit 5";
        $RS_mb = $conn -> query($sql_str);
        $total_RS_mb = $RS_mb -> rowCount();

        $sql_str1 = "SELECT * FROM messages  WHERE post=1 ORDER BY id DESC limit 5";
        $RS_mb1 = $conn -> query($sql_str1);

        $sql_str2 = "SELECT * FROM messages  WHERE post=2 ORDER BY id DESC limit 5";
        $RS_mb2 = $conn -> query($sql_str2);

        $sql_str3 = "SELECT * FROM messages  WHERE post=3 ORDER BY id DESC limit 5";
        $RS_mb3 = $conn -> query($sql_str3);
      
    
        
    
        
    }
    catch(PDOException $e){
        die('Error!:'.$e->getMessage());
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
                    <div class="listbottom" id="listbottom">
                        <!--  -->
                    </div>
                   
                </div>
            </div>
            
            <div class="message">
                <h2>訊息公告</h2>
                <div class="messatgeItem">
                    <div class="item active" id="msgbtn1">最新公告</div>
                    <div class="item" id="msgbtn2">活動公告</div>
                    <div class="item" id="msgbtn3">系統公告</div>
                    <div class="item" id="msgbtn4">客服公告</div>
                </div>
                <div class="post" id="post1">

                    <?php foreach($RS_mb as $item){ ?>
                    <a href="./postcontent.php?id=<?php echo $item['id'];?>" class="list">
                        <h4 class="class">最新</h4>
                        <div class="date"><?php echo $item['time']; ?></div>
                        <h4 class="title"><?php echo $item['title']; ?></h4>
                    </a>
                    <?php } ?>
                    
                    
                </div>
                <div class="post" id="post2">
                <?php foreach($RS_mb1 as $item){ ?>
                    <a href="./postcontent.php?id=<?php echo $item['id'];?>" class="list">
                        <h4 class="class">最新</h4>
                        <div class="date"><?php echo $item['time']; ?></div>
                        <h4 class="title"><?php echo $item['title']; ?></h4>
                    </a>
                    <?php } ?>
                   
                </div>
                <div class="post" id="post3">
                <?php foreach($RS_mb2 as $item){ ?>
                    <a href="./postcontent.php?id=<?php echo $item['id'];?>" class="list">
                        <h4 class="class">最新</h4>
                        <div class="date"><?php echo $item['time']; ?></div>
                        <h4 class="title"><?php echo $item['title']; ?></h4>
                    </a>
                    <?php } ?>
                </div>
                <div class="post" id="post4">
                <?php foreach($RS_mb3 as $item){ ?>
                    <a href="./postcontent.php?id=<?php echo $item['id'];?>" class="list">
                        <h4 class="class">最新</h4>
                        <div class="date"><?php echo $item['time']; ?></div>
                        <h4 class="title"><?php echo $item['title']; ?></h4>
                    </a>
                    <?php } ?>
                    
                </div>
                <div class="more">
                    <a href="./messages.php">More...</a>
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
                <p>
                ChihSiou 持修 - 我還在你的夢裡嗎 <br>
                晚空流年 - 胖虎 <br>
                無盡墜落 - Gibb-z,徐聖恩 <br>
                阿肆 - 熱愛105°c的你 <br>
                想知道你在想什麼 - 周興哲 <br>
                墜入星空 - 季之昕 <br>
                失眠的夜 - 韓可可 <br>
                一前一後 - 彭宇昕Chloe <br>
                自娛自樂 - 金志文 <br>
                對號入座 - 任舒瞳 <br>
                劉大壯 - 湊熱鬧 <br>
                不是很懂 - 金新菲 <br>
                KeyKey - 醫術家 <br>
                如願 - 王菲 <br>
                品冠 - 門沒鎖 <br>
                陳文非 - 蔣子睿 - 未完成之前 <br>
                悄悄愛上你 - 陳毓潔,可澤 <br>
                我是小力氣 - 一格格 <br>
                半噸兄弟 - 偏愛 <br>
                四季予你 - 程響 <br>
                唯一的島 - 呂口口 <br>
                天蠍和摩羯 - 蘇晗 <br>
                愛,存在 <br>
                可笑 - KeyKey <br>
                大籽-白月光與硃砂痣 <br>
                小藍背心 - 目及皆是你 <br>
                李榮浩《不遺憾》 <br>
                熱愛105°c的你 - 阿肆 <br>
                夢然 (Mira) <br>
                溫嵐 - 夏天的風 <br>
                你的答案 <br>
                The Kid LAROI, Justin Bieber - STAY <br>
                嘉賓 文慧如 翻唱 <br>
                你把眼淚送給我 - 滕漢偉 <br>
                你頭頂的風 -  喜東東呀 <br>
                王靖雯不胖 - 淪陷 <br>
                傷心太平洋(女版) - 範茹 <br>
                Bomb比爾 - 1022 <br>
                你的眼睛像星星
                </p>
            </div>
        </div>
    </div>
</div>
    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
    <script src="messages.js"></script>
    <script>
           
const user =  [
    {no:1,username:'sx*76*4',name:'王O哲',money:16886500},
{no:2,username:'l**e*07',name:'李O',money:14259200},
{no:3,username:'co*ksw*',name:'蘇O范',money:14100000},
{no:4,username:'vk*8*0',name:'黃O藤',money:13685000},
{no:5,username:'ga*c6*6',name:'王O綸',money:12675040},
{no:6,username:'*j658*',name:'林O祥',money:12548500},
{no:7,username:'s*h*vc',name:'周O',money:12254900},
{no:8,username:'je**0ac',name:'楊O婷',money:11547000},
{no:9,username:'96*df*c',name:'吳O翰',money:11326500},
{no:10,username:'zz**5z*',name:'曹O祈',money:10935100},
{no:11,username:'fs*g58*6',name:'陳O吉',money:10086500},
{no:12,username:'kk*f6**6',name:'方O翔',money:9859200},
{no:13,username:'**dfs45*6',name:'陳O玲',money:9653800},
{no:14,username:'df*46**',name:'謝O華',money:9638500},
{no:15,username:'vzx**322',name:'王O宇',money:9356100},
{no:16,username:'ad*l11*2',name:'黃O耕',money:9332300},
{no:17,username:'*ss*55*4',name:'周O祥',money:9109500},
{no:18,username:'*888*95*',name:'熊O欣',money:9223500},
{no:19,username:'tt*r66*6',name:'吳O紫',money:9005600},
{no:20,username:'lp*pp*221',name:'曹O芬',money:8709500},
{no:21,username:'qwe*t22**',name:'陳O哲',money:8659100},
{no:22,username:'gfd*56*6',name:'謝O',money:8635900},
{no:23,username:'wq*re*33',name:'蘇O柔',money:8567200},
{no:24,username:'opk**as4*5',name:'賴O廷',money:8542600},
{no:25,username:'as*d*999',name:'林O姍',money:8496300},
{no:26,username:'ss*swf5**4',name:'林O祥',money:8294600},
{no:27,username:'iij*j1*12*3',name:'童O宣',money:8069400},
{no:28,username:'s*da*452',name:'胡O婷',money:7968500},
{no:29,username:'we*ji5*64',name:'吳O芝',money:7629500},
{no:30,username:'we*sd*f4*51',name:'吳O蓁',money:7689200},
{no:31,username:'a*ima*12*6',name:'蘇O仁',money:7564200},
{no:32,username:'i*wq4*68',name:'宋O',money:7498200},
{no:33,username:'a*a548*4*',name:'劉O如',money:7498100},
{no:34,username:'juh*s45*54',name:'林O恒',money:7423500},
{no:35,username:'sd79**82',name:'王O梅',money:7369500},
{no:36,username:'fd*s45**',name:'廖O翔',money:7355600},
{no:37,username:'wer*87*',name:'孫O',money:7105200},
{no:38,username:'w*eo*q1*37',name:'施O漢',money:7002600},
{no:39,username:'aa*s4*8*9',name:'柯O傑',money:6823600},
{no:40,username:'ahi*r48*8',name:'盧O宏',money:6803200},
{no:41,username:'er*fg7*95',name:'陳O一',money:6756200},
{no:42,username:'ku*k*451',name:'簡O姍',money:6700200},
{no:43,username:'g**f6*84',name:'何O祥',money:6695200},
{no:44,username:'*wn*75*4',name:'劉O正',money:6631200},
{no:45,username:'eb**v54*6',name:'吳O傑',money:6602300},
{no:46,username:'v*v154*',name:'林O凱',money:6569200},
{no:47,username:'s*i*ch1699',name:'周O',money:6648900},
{no:48,username:'*te*en6963',name:'廖O均',money:6620000},
{no:49,username:'mi**l5**9',name:'陳O豪',money:6532600},
{no:50,username:'fa*he4*48',name:'陳O帆',money:6502300},
{no:51,username:'s*dd*321',name:'李O茂',money:6476500},
{no:52,username:'ll*sd**55',name:'柯O劭',money:6498700},
{no:53,username:'sfs*48**',name:'張O瑋',money:6456200},
{no:54,username:'v*ks*457',name:'蘇O育',money:6469400},
{no:55,username:'s*fko*22',name:'陳O志',money:6410900},
{no:56,username:'ko*ps*100',name:'翁O強',money:6269800},
{no:57,username:'**fds*542',name:'王O鑫',money:6257100},
{no:58,username:'so*k*o000',name:'江O雯',money:6165400},
{no:59,username:'*dij*i0066*654',name:'吳O程',money:6107000},
{no:60,username:'d*ok*233',name:'許O娟',money:6085000},
{no:61,username:'ki*i12*',name:'方O菁',money:6061000},
{no:62,username:'n**n*e000',name:'邱O歡',money:5869000},
{no:63,username:'di*ovj8787',name:'楊O元',money:5842600},
{no:64,username:'d*sji*12*11',name:'趙O姍',money:5796500},
{no:65,username:'sd**i2*25',name:'陳O生',money:5684300},
{no:66,username:'d*f*ii0769',name:'陳O強',money:5594600},
{no:67,username:'h*o0367',name:'陳O傑',money:5394500},
{no:68,username:'fg*j*i7777',name:'黃O翰',money:5195600},
{no:69,username:'qw*er**t2654',name:'詹O廷',money:5161200},
{no:70,username:'b*n68*2',name:'張O宣',money:5064000},
{no:71,username:'iu*ud*3*33',name:'傅O恆',money:4869500},
{no:72,username:'k*kl**00',name:'李O倩',money:4779800},
{no:73,username:'fkv*0*33*46',name:'吳O芬',money:4765000},
{no:74,username:'eew**12*',name:'侯O吟',money:4652300},
{no:75,username:'ppk*e**1',name:'陳O綸',money:4560100},
{no:76,username:'as*di*248',name:'李O瑋',money:4526700},
{no:77,username:'*s*c123',name:'張O',money:4495600},
{no:78,username:'d*fk*o12**',name:'蔡O琪',money:4492100},
{no:79,username:'dj*i*99',name:'蕭O琪',money:4326000},
{no:80,username:'p*l*5**',name:'周O甄',money:4200100},
{no:81,username:'sd*4**',name:'謝O季',money:4039700},
{no:82,username:'ap**es45*4*',name:'林O蓮',money:3769400},
{no:83,username:'cd*so*k2**5',name:'錢O姚',money:3706500},
{no:84,username:'d*i*6*87',name:'李O宏',money:3594600},
{no:85,username:'gi*i6**',name:'陳O浩',money:3506700},
{no:86,username:'l*wp*12*',name:'呂O鳴',money:3326000},
{no:87,username:'pl*j*951',name:'羅O',money:3290600},
{no:88,username:'a*09*6*5*444',name:'劉O程',money:3094700},
{no:89,username:'sd**77*9',name:'葉O華',money:2865400},
{no:90,username:'aa*a12*11*9',name:'謝O博',money:2639000},
{no:91,username:'s*xe6*54',name:'何O茵',money:2603000},
{no:92,username:'ved*07',name:'陳O輝',money:2469000},
{no:93,username:'c*oew*22',name:'吳O玲',money:2453000},
{no:94,username:'k*h80*0',name:'宋O安',money:2436000},
{no:95,username:'g*c6*16',name:'鄭O宸',money:2419600},
{no:96,username:'j*65*80',name:'陳O豪',money:2400700},
{no:97,username:'s*8*vc',name:'陳O超',money:2386400},
{no:98,username:'*je*52',name:'謝O發',money:2356900},
{no:99,username:'96*54*df2ac',name:'王O琪',money:2301000},
{no:100,username:'ji*94*su3',name:'許O銘',money:2268500},
];
let html = '';
const listbottom = document.getElementById('listbottom');
user.forEach((item)=>{
html += '<div class="list" >';
html += `<span class="l1">${item.no}</span>`;
html += `<span class="l2">${item.username}</span>`;
html += `<span class="l3">${item.name}</span>`;
html += `<span class="l4">${item.money}</span>`;
html += '</div>';
})
listbottom.innerHTML = html ;
    </script>
   
</body>
</html>