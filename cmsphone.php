<?php 
session_start();
include_once('./conn.php');

if(isset($_SESSION['name'])){
    try{
        $sql_str = "SELECT * FROM member ORDER BY id DESC";
        $RS_member = $conn -> query($sql_str);

    }catch ( PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
if(isset($_GET['username']) && $_GET['username'] !==""){
    $getname = $_GET['username'];
  }
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Party Go管理後台</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <style>
    .phoneAll{
        width:350px;
        background-color: #fff;
        height: 500px;
        overflow-y:scroll; 

    }
    
    .pre{
        color:#222;
        display: block;
        width:120px;
        height: 35px;
        background-color: #fff;
        text-align: center;
        line-height: 35px;
        font-weight: 600;
        margin-top: 15px;
    }
    .cms{
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .title{
        color:#fff;
        font-size: 20px;
        margin-bottom: 10px;
    }
    .phonelist{
        display: flex;
        border-bottom: 1px #aaa solid;
        padding: 6px 5px;
    }
    .phonelist > .phonelistname{
        width:100px;
    }
    </style>
</head>
<body>
<h6 id="logo"><p>PartyGo管理後臺</p><p></p></h6>
    <div class="content">
    <?php if($_SESSION['mem_level'] > 2) {?>
        
       <div class="cms">
           <h2 class="title">查看所有手機</h2>
        <div class="phoneAll">

            <?php foreach($RS_member as $item){ ?>
                <div class="phonelist">
                    <p class="phonelistname"><?php echo $item['name']; ?></p>-&nbsp;
                    <p><?php echo $item['mail']; ?></p>
                </div>
            <?php } ?>
        </div>
        <a href="./ContentManagementSystem.php" class="pre">回前頁</a>
       </div>

    <?php }else{ ?>
        <h1 style="color:#fff;text-align:center;width:100%">您沒有權限進入此網站!!!</h1>
    <?php  }?>
    </div>
<?php include_once('./footer.php'); ?>
</body>
</html>

<?php
}else{
echo "找不到此頁面。";
?>

<?php } ?>