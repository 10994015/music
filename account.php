<?php
session_start();
include_once('./conn.php');
if(isset($_SESSION['name']) && isset($_GET['user'])){
    try {
        $user = $_GET['user'];
        $sql_str = "SELECT * FROM `$user` ORDER BY id ASC";
       
        $RS_user = $conn -> query($sql_str);
        // //返回$RS_mb資料集的列數，也就是記錄筆數
        $total_user = $RS_user -> rowCount();
        
      

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
   
    </style>
</head>
<body>
    
<?php include_once('./shard.php'); ?>
    <div class="content">
    <?php include_once('./left.php'); ?>
       <div class="account">
           <h1>下線總數:<?php echo $total_user;?></h1>
           <?php foreach($RS_user as $item){ ?>
            <p>帳號:<?php echo $item['down']; ?></p>
           <?php } ?>
       </div>
    </div>
    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>
<?php
} 
catch ( PDOException $e ){
      echo "此帳號無下線!<br>";
      echo "<a href='./cms.php'>回前頁</a>";
}
}else{

?>
<?php include_once('./error.php') ?>
<?php } ?>