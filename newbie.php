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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>Party Go</title>
    <style>
        .newbie{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .newbie h4{
            font-size: 24px;
            margin-bottom: 10px;
        }
      .process{
          display: flex;
          justify-content: center;
          align-items: center;
          margin:0 100px;
      }
      .process>p{
          width:130px;
          height: 130px;
          text-align: center;
          line-height: 130px;
          border-radius: 50%;
          background-color: #0b486c;
          color:#fff;
          font-weight: 600;
      }
      .process>p,.process >i{
          font-size: 18px;
          margin:10px 0;
      }
      .process >i{
          margin:0 10px;
      }
      .fa-down-long{
          display: none;
      }
      @media screen and (max-width:900px){
        .process{
          flex-direction: column;
          margin:50px 0;
      }
      .process > i{
          font-size: 30px;
      }
      .fa-down-long{
          display: block;
      }
      .fa-right-long{
          display: none;
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
        <div class="newbie">
           <div class="process">
               <p>會員登入</p>
               <i class="fa-solid fa-right-long"></i>
               <i class="fa-solid fa-down-long"></i>
               <p>聯絡客服</p>
               <i class="fa-solid fa-right-long"></i>
               <i class="fa-solid fa-down-long"></i>
               <p>點擊賺取</p>
               <i class="fa-solid fa-right-long"></i>
               <i class="fa-solid fa-down-long"></i>
               <p>接單任務</p>
               <i class="fa-solid fa-right-long"></i>
               <i class="fa-solid fa-down-long"></i>
               <p>抽取個人任務</p>
           </div>
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