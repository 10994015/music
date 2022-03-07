<?php
session_start();
include_once('./conn.php');

if(isset($_GET['code'])){
    $sql_str = "SELECT * FROM member WHERE chkcode = :code";

    $stmt = $conn -> prepare($sql_str);
    //接收資料
    $code = $_GET['code'];
  

    //綁定資料
    $stmt -> bindParam(':code',$code);
  

    //執行
    $stmt -> execute();
   
    $total = $stmt -> rowCount();
    if($total>=1){
        $row_RS = $stmt -> fetch(PDO::FETCH_ASSOC);
        $upuser =  $row_RS['username'];
    }
    echo $row_RS['username'];
}
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register.css">
    <title>Party Go</title>
</head>
<body>
    
<?php include_once('./shard.php'); ?>
    <div class="content">
    <?php include_once('./left.php'); ?>
        <div class="register">
            <img src="./images/CC04.png" alt="">
        <form method="post" action="./mem_addmem_ok.php" class="mem-addmem-area">
            <input type="text" name="username" class="username" 
                placeholder="請輸入帳號..." required>
                <div class="msg_username">sdfdf</div>
            <input type="text" name="mem_mail" class="mem_mail" 
                placeholder="請輸入EMail..." required>
                <div class="msg_mail"></div>

            <input type="text" name="mem_name" class="mem_name" 
                placeholder="請輸入名稱..." required>

            <input type="password" name="mem_pwd" class="mem_pwd" 
                placeholder="請輸入密碼 (6~20個英數字或符號)...." required>
                <div class="msg_pwd"></div>

            <input type="password" name="confirm_pwd" class="confirm_pwd" 
                placeholder="請再一次輸入相同密碼" required>
                <div class="msg_confirm_pwd"></div>

            <input type="text" name="chkcode" class="chkcode" 
                placeholder="請輸入 0～9 的驗證碼" required>
                <div class="msg_chkcode"></div>  

            <!-- 顯示驗證碼圖片 -->
            <img src="./chkcode_img_create.php" class="chkcodeimg" alt="">
            <a href="javascript:;" class="re-chkcode">重新顯示驗證碼</a>


            <input type="submit" class="submit-btn" value="註冊" />
            <input type="hidden" name="MM_process" value="addmem">
            <input type="hidden" name="usercode" value="<?php echo $upuser; ?>">

            <!-- 以下是負責各欄位即時檢驗後顯示訊息的區域 -->


        </form>

        </div>
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="./jquery-3.4.1.min.js"></script>
    <script src="./script.js"></script>
    <script src="./check_mem_register.js"></script>

    <script>
        $('.w3-modal').click(function(){  $(this).hide();  });
        $('.w3-modal .w3-modal-content').click(function(e){  e.stopPropagation();  });
        </script>
    <style>
        .mem-addmem-area div { text-align: left; color: red; letter-spacing: 0; font-size: 15px; font-weight: 600;}
    .str1, .str0 { display: inline-block; width: 20px; height: 10px; margin-right:3px; }
  .str1 { background-color: blue; }
  .str0 { background-color: lightgray; } 

 
</style>
</body>
</html>