<?php
session_start();
include_once('./conn.php');

if (isset($_SESSION['name'])) {
    $title =  "找不到此文章";
    $content =  "";
    if(isset($_GET['id'])&& $_GET['id'] != ""){
        try{
            $id = $_GET['id'];
            $sql_str = "SELECT * FROM messages WHERE id = :id";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':id',$id);
            $stmt -> execute();

            $total = $stmt -> rowCount();
            if($total>=1){
                $row_RS = $stmt -> fetch(PDO::FETCH_ASSOC);
                $title =  $row_RS['title'];
                $content =  $row_RS['content'];
                $time =  $row_RS['time'];
            }else{
                $title =  "找不到此文章";
                $content =  "";
            }
            
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
    <link rel="stylesheet" href="messages.css">
    <title>Party Go</title>
    <style>
       .postcontent{
           width:90%;
           margin:0 50px;
       }
       .postcontent > h2 {
           width:100%;
           margin-bottom: 25px;
           border-bottom:3px #444 solid;
           padding: 8px 0;
       }
       .postcontent > p {
           width:100%;
           margin-top: 25px;
       }
       .back{
           display: block;
           width:150px;
           height: 40px;
           background-color: #333;
           color:#fff;
           font-weight: 600;
           text-align: center;
           line-height: 40px;
           font-weight: 600;
           margin-top: 50px;
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
            <div class="postcontent">
                <h2><?php echo $title;?></h2>
                <p><?php echo nl2br($content);?></p>

                <a href="./messages.php" class="back">回上一頁</a>
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