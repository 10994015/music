<?php
session_start();
include_once('./conn.php');
if(isset($_SESSION['name'])){
    
    try {
       if(isset($_GET['user']) && $_GET['user'] !== ""){
           $user = $_GET['user'];
           $sql_str = "SELECT * FROM member WHERE username = :user";
           $stmt = $conn->prepare($sql_str);
           $stmt->bindParam(':user',$user);
           $stmt->execute();
           $row_RS_mb = $stmt->fetch(PDO::FETCH_ASSOC);
       }

      } 
      catch ( PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
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
    .cms {
        display: flex;
        flex-direction: column;
    }
    
    .userlist{
        border-bottom:1px #000 solid;
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
    <div class="content">
    <?php if($_SESSION['mem_level'] > 2) {?>
       <div class="cms">
        <h1>編輯餘額</h1>
       <form action="updateMoney_check.php"" method="post">
           <input type="text" placeholder="餘額..." name="money" value="<?php echo $row_RS_mb['money'];?>">
           <input type="submit" value="編輯">
           <input type="hidden" name="username" value="<?php echo $row_RS_mb['username'];?>">
           <input type="hidden" name="update" value="update">
       </form>
       </div>
    <?php }else{ ?>
        <h1>您沒有權限進入此網站!!!</h1>
    <?php  }?>
    </div>

    <script src="script.js"></script>
</body>
</html>
<?php
}else{
echo "找不到此頁面。";
?>

<?php } ?>