<?php
session_start();
include_once('./conn.php');

if (isset($_SESSION['name'])) {

    try{
        $sql_str = "SELECT * FROM messages ORDER BY id DESC";
        $RS_mb = $conn -> query($sql_str);
        $total_RS_mb = $RS_mb -> rowCount();

        $sql_str1 = "SELECT * FROM messages WHERE post=1 ORDER BY id DESC";
        $RS_mb1 = $conn -> query($sql_str1);
        $total_RS_mb1 = $RS_mb1 -> rowCount();

        $sql_str2 = "SELECT * FROM messages WHERE post=2 ORDER BY id DESC";
        $RS_mb2 = $conn -> query($sql_str2);
        $total_RS_mb2 = $RS_mb2 -> rowCount();

        $sql_str3 = "SELECT * FROM messages WHERE post=3 ORDER BY id DESC";
        $RS_mb3 = $conn -> query($sql_str3);
        $total_RS_mb3 = $RS_mb3 -> rowCount();
      
    
        
    
        
    }
    catch(PDOException $e){
        die('Error!:'.$e->getMessage());
      }
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="messages.css">
    <title>Party Go</title>
    <style>
       
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
    <div class="messages">
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
                            <h4 class="class"><?php if($item['post']==1){echo "活動";}elseif($item['post']==2){echo "系統";}else{echo "客服";} ?></h4>
                            <div class="date"><?php echo $item['time']; ?></div>
                            <h4 class="title"><?php echo $item['title']; ?></h4>
                        </a>
                    <?php } ?>
                   
                </div>
                <div class="post" id="post3">
                <?php foreach($RS_mb2 as $item){ ?>
                        <a href="./postcontent.php?id=<?php echo $item['id'];?>" class="list">
                            <h4 class="class"><?php if($item['post']==1){echo "活動";}elseif($item['post']==2){echo "系統";}else{echo "客服";} ?></h4>
                            <div class="date"><?php echo $item['time']; ?></div>
                            <h4 class="title"><?php echo $item['title']; ?></h4>
                        </a>
                    <?php } ?>
                   
                </div>
                <div class="post" id="post4">
                <?php foreach($RS_mb3 as $item){ ?>
                        <a href="./postcontent.php?id=<?php echo $item['id'];?>" class="list">
                            <h4 class="class"><?php if($item['post']==1){echo "活動";}elseif($item['post']==2){echo "系統";}else{echo "客服";} ?></h4>
                            <div class="date"><?php echo $item['time']; ?></div>
                            <h4 class="title"><?php echo $item['title']; ?></h4>
                        </a>
                    <?php } ?>
                    
                </div>
            </div>
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
    <script src="messages.js"></script>
</body>
</html>

<?php
}else{

?>
<?php include_once('./error.php') ?>
<?php } ?>