<?php
session_start();
include_once('./conn.php');

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $username = $_SESSION['username'];
    $sql_str = "SELECT * FROM member WHERE up=:username";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':username',$username);
    $stmt -> execute();
    $total = $stmt -> rowCount();
    $userdata = "SELECT * FROM member  WHERE username=:username";
    $stmt2 = $conn -> prepare($userdata);
    $stmt2 -> bindParam(':username',$username);
    $stmt2 -> execute();
    $total2 = $stmt2 -> rowCount();
    // echo "total=>".$total;
    if($total >= 1){
        $row_RS = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    if($total2 >= 1){
        $row_user = $stmt2 -> fetch(PDO::FETCH_ASSOC);
    }


    
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
        body{
            background-color: #3C475B;
        }
        .content {
            display: flex;
            justify-content: center;
        }
        .userdata{
            width:250px;
            margin:0 30px;
            padding: 10px;
            border:1px #ccc solid;
            box-shadow: 0px 5px 10px #333;
            font-weight: 600;
            height: 600px;
            overflow-y: scroll;
            background-color: #fff;
        }
        .userdata ul{
            list-style: none;
        }
        .userdata li{
            cursor: pointer;
        }
        .userdata .up >li> p{
            height: 25px;
            line-height: 25px;
        }
        .userdata .up >li> p:hover{
            border-bottom:1px #333 solid;
        }
        .userdata .down li:hover{
            border-bottom:1px #333 solid;
        }
        .userdata .down li{
            font-weight: 500;
            margin:6px 0;
            margin-left: 15px;
            
        }
        .memberdata{
            min-width:600px;
            margin:0 20px;
            padding: 10px;
            border:1px #ccc solid;
            box-shadow: 0px 5px 10px #333;
            font-weight: 600;
            background-color: #fff;
            height: 600px;
        }
    .memberdata li{
        list-style: none;
        margin-left: 10px;
        font-weight: 500;
    }
    .opacitytext{
        opacity: 0;
        position:absolute;
        top:-99999999999999px;
        left:-999999999999999px;
        z-index: -9999999999999;
    }
    .pagetitle{
        text-align: center;
        font-size: 24px;
        color:#fff;
        margin:15px 0;
    }
    .gohome{
        position: absolute;
        top: 20px;
        right:30px;
        color:#fff;
        font-weight: 600;
    }
    </style>
    
</head>
<body>
<?php if(isset($_SESSION['name'])){ ?>
    <!-- <div class="memberinfo">
        <div><b>帳號</b><p><?php echo $_SESSION['username']; ?></p></div>
        <div><b>餘額</b><p><?php echo $_SESSION['money']; ?></p></div>
        <a href="./member_logout.php" class="logout">登出</a>
    </div> -->
    <?php } ?>
    <h4 class="pagetitle">會員中心</h4>
    <a href="./" class="gohome">回首頁</a>
    <div class="content">
    <div class="userdata"> 
        <ul class="up">
            <li>
                <p class="userbtn"><?php
                echo $row_user['username']."-".$row_user['name'];
                echo "<span class='opacitytext'>".$row_user['username']."-".$row_user['name']."-".$row_user['money']."-".$row_user['chkcode']."</span>";
                ?></p>
                <ul class="down">
                    <?php
                        if($total == 0){
                            echo "此帳號無下線";
                        }else{
                            foreach($row_RS as $item){
                                echo "<li class='userbtn'>".$item['username']."-".$item['name'];
                                echo "<span class='opacitytext'>".$item['username']."-".$item['name']."-".$item['money']."-".$item['chkcode']."-".$item['mail']."</span></li>";
                            }
                        }
                    ?>

                </ul>
            
            </li>
        </ul>


    </div>
    <div class="memberdata">
        <p id="showusername">請選擇帳號</p>
        <p id="showname"></p>
        <p id="showphone"></p>
        <p id="showmoney"></p>
        <p id="showurl"></p>
        <p id="qrcode"></p>
    </div>
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <script src="script.js"></script>

    <script>
    const opacitytext = document.getElementsByClassName('opacitytext');
    const userbtn = document.getElementsByClassName('userbtn');
    const showusername = document.getElementById('showusername');
    const showname = document.getElementById('showname');
    const showmoney = document.getElementById('showmoney');
    const showurl = document.getElementById('showurl');
    const showphone = document.getElementById('showphone');

    const showData = (e)=>{
        // console.log(e.target);
        showusername.innerText = "";
        showname.innerText = "";
        showmoney.innerText = "";
        showurl.innerText = "";
        showphone.innerText = "";
        let u = e.target.querySelector('.opacitytext');
        console.log(u.innerText.split('-'));
        let username = u.innerText.split('-')[0].trim();
        let name = u.innerText.split('-')[1].trim();
        let money = u.innerText.split('-')[2].trim();
        let url = u.innerText.split('-')[3].trim();
        let phone = u.innerText.split('-')[4].trim();
        showusername.innerText = "帳號:" + username;
        showname.innerText = "姓名:" + name;
        showmoney.innerText = "餘額:" + money;
        showphone.innerText = "手機:" + phone;
        showurl.innerText = "專屬網址:http://www.partyboxxxxxx.com/register.php?code=" + url;
        $('#qrcode').html('');
                $('#qrcode').qrcode({
                    width: 120,
                    height: 120,
                    text: "http://www.partyboxxxxxx.com/register.php?code="+url
                });
    }
    for(let i=0;i<userbtn.length;i++){
        userbtn[i].addEventListener('click',showData);
    }
    </script>
</body>
</html>

<?php
}else{

?>
<?php include_once('./error.php') ?>
<?php } ?>