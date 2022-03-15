<?php
session_start();
include_once('./conn.php');

if (isset($_SESSION['name'])) {
    try{
        //準備SQL語法
        $sql_str = "SELECT * FROM member
        WHERE username = :username";
        $stmt = $conn -> prepare($sql_str);
        //接收資料
        $username = $_SESSION['username'];
      
    
        //綁定資料
        $stmt -> bindParam(':username',$username);
      
        
        //執行
        $stmt -> execute();
        $total = $stmt -> rowCount();
        if($total>=1){
            $row_RS = $stmt -> fetch(PDO::FETCH_ASSOC);
        }
        // echo $row_RS['pwd'];
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
    <title>Party Go</title>
    <style>
      
      .changepwd{
          display: flex;
          flex-direction: column;
          width:400px;
          /* border:1px #000。 solid; */
          margin: 0 50px;
          background-image: url('./images/CC02.png');
          background-size: cover;
          background-position: center;
          justify-content: center;
          align-items: center;
          height: 400px;
      }
      .changepwd > h4 {
          color:#1484c4;
          font-size: 24px
      }
      .changepwd input{
          width:350px;
          height: 40px;
          outline: none;
          border:1px #aaa solid;
          margin:15px 0;
          padding: 0 5px;
          border-radius: 8px;
          
      }
      .changepwd input[type="submit"]{
          background-color: #1484c4;
          color:#fff;
          font-weight: 600;
          cursor: pointer;
          font-size: 16px;
          border:none;
      }
      #submit.disable{
          background-color: #ccc;
          color:#fff;
          cursor: default;
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
   
        <form action="changecheck.php" method="post" class="changepwd">
        <h4>變更密碼</h4>
            <input type="text" placeholder="請輸入原密碼..." name="pwd" id="pwd">
            <input type="text" placeholder="請輸入新密碼..." name="newpwd" id="newpwd">
            <input type="text" placeholder="再次確認密碼..." name="checkpwd" id="checkpwd">
            <input type="submit" value="更改密碼" id="submit" disabled class="disable">
            <input type="hidden" value="<?php echo $row_RS['pwd']; ?>" name="phppwd" id="phppwd">
            <input type="hidden" value="changepwdpage"" name="hidden">
            <input type="hidden" value="<?php echo $row_RS['username']; ?>"" name="username">
        </form>
    </div>

    <?php include_once('./footer.php'); ?>
    
    <script src="script.js"></script>
    <script>
        const pwd = document.getElementById('pwd');
        const newpwd = document.getElementById('newpwd');
        const checkpwd = document.getElementById('checkpwd');
        const phppwd = document.getElementById('phppwd');
        let submit = document.getElementById('submit');
        let pwdcheck = false;
        let newpwdcheck = false;
        // submit.disabled = true;

        pwd.addEventListener('keyup',()=>{
            if(pwd.value ===phppwd.value){
                pwdcheck = true;
            }else{
                pwdcheck = false;
            }
            if(pwdcheck && newpwdcheck){
                submit.disabled = false;
                submit.classList.remove('disable');
            }else{
                submit.disabled = true;
                submit.classList.add('disable');
            }
            
        });
        checkpwd.addEventListener('keyup',()=>{
            if(checkpwd.value === newpwd.value  && checkpwd.value !=="" && newpwd.value !== ""){
                newpwdcheck = true;
            }else{
                newpwdcheck = false;
            }
            if(pwdcheck && newpwdcheck ){
                submit.disabled = false;
                submit.classList.remove('disable');
            }else{
                submit.disabled = true;
                submit.classList.add('disable');
            }
            
        });
        newpwd.addEventListener('keyup',()=>{
            if(checkpwd.value === newpwd.value  && checkpwd.value !=="" && newpwd.value !== ""){
                newpwdcheck = true;
            }else{
                newpwdcheck = false;
            }
            if(pwdcheck && newpwdcheck){
                submit.disabled = false;
                submit.classList.remove('disable');
            }else{
                submit.disabled = true;
                submit.classList.add('disable');
            }
            
        });
        submit.addEventListener('click',()=>{
            alert("變更成功!!");
        });
    </script>
</body>
</html>

<?php
}else{

?>
<?php include_once('./error.php') ?>
<?php } ?>