<?php
session_start();
include_once('./conn.php');
if(isset($_SESSION['name'])){
    try {
        $admin = "SELECT * FROM member WHERE level=9 ORDER BY id ASC";
        $admin_member = $conn -> query($admin);
        $sql_str = "SELECT * FROM member WHERE level=2 ORDER BY id DESC";
        $RS_member = $conn -> query($sql_str);
        $RS_member_push = $conn -> query($sql_str);
        $total_member = $RS_member -> rowCount();
        $memberArr = array();
        if($total_member > 1){
            foreach($RS_member_push as $n){
                array_push($memberArr,$n['username']);
            }
        }
      } 
      catch ( PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }

      if(isset($_GET['username']) && $_GET['username'] !==""){
        $getname = $_GET['username'];
        echo "ok".$getname;
      }
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    
    <title>Party Go管理後台</title>
    <style>
    .userlist{
        border-bottom:1px #000 solid;
    }
    </style>
</head>
<body>
<h6 id="logo"><p>PartyGo管理後臺</p><p></p></h6>
    <div class="content">
    <?php if($_SESSION['mem_level'] > 2) {?>
       <div class="cms">
            <div class="member">
              
                <?php foreach($admin_member as $item){?>
                    <ul id="max">
                    <div class="search">
                        <input type="text" placeholder="搜尋..." id="searchbox">
                        <button id="searchbtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                        <li>
                            <h4><?php echo $item['username']."-".$item['name']; ?></h4>
                            <ul class="middle">
                            <?php foreach($RS_member as $item2){ ?>
                                <li class="middlelist">
                                    <h5 class="middleusername uname">
                                        <i class="fa-solid fa-caret-right icon" ></i>
                                        <!-- <i class="fa-solid fa-caret-down"></i> -->
                                        <?php echo $item2['username']."-".$item2['name']; ?>
                                        <?php echo "<span class='opacitytext'>-".$item2['money']."-".$item2['chkcode']."-".$item2['up']."-".$item2['mail']."</span>"; ?>
                                    </h5>
                                     <?php 
                                     $sql_upname = "";
                                     $upname="";
                                     $upname = $item2['username'];
                                    //  echo ">>".$upname;
                                     $sql_upname = "SELECT * FROM member WHERE up=:upname ";
                                     $stmtup = $conn -> prepare($sql_upname);
                                     $stmtup -> bindParam(':upname',$upname);
                                     $stmtup -> execute();
                                     $uptotal = 0;
                                     $uptotal = $stmtup -> rowCount();
                                    //  echo "數量:".$uptotal;
                                     if($uptotal>=1){
                                        $row__up_RS = "";
                                        $upuser = "";
                                        // $row__up_RS = $conn -> query($sql_str);
                                        $row__up_RS = $stmtup -> fetchAll(PDO::FETCH_ASSOC);
                                        // $upuser =  $row__up_RS['username'];
                                        // foreach($row__up_RS as $downname){
                                        //     echo "<li>".$downname['username']."</li>";
                                        // }
                                        echo "<ul class='min'>";
                                        foreach($row__up_RS as $upname){
                                            echo "<li class='uname'>";
                                            echo $upname['username']."-".$upname['name'];
                                            echo "<span class='opacitytext'>-".$upname['money']."-".$upname['chkcode']."-".$upname['up']."-".$upname['mail']."</span>";
                                            echo "</li>";
                                        }
                                        echo "</ul>";
                                        // print_r($row__up_RS);
                                    }else{
                                        $row__up_RS = "";
                                        $upuser = "";
                                    }
                                    // print_r($row__up_RS);
                                    
                                    // echo $upuser;
                                    //  $RS_upname = $conn -> query($sql_upname);
                                    //  echo $RS_upname;
                                     
                                     ?>
                                     
                                    
                                </li>
                                <?php } ?>
                            </ul>
                        </li>

                    </ul>

                <?php } ?>
            </div>
            <div class="usercontent">
               <div>
                <h3 id="contentusername">請選擇帳號</h3>
                    <h3 id="contentname"></h3>
                    <h3 id="contentphone"></h3>
                    <h3 id="contentmoney"></h3>
                    <h3 id="contenturl"></h3>
                    <h3 id="contentup"></h3>
                    <div id="qrcode"></div>
               </div>
                <div id="update">編輯</div>
            </div>
       </div>
    <?php }else{ ?>
        <h1 style="color:#fff;text-align:center;width:100%">您沒有權限進入此網站!!!</h1>
    <?php  }?>
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <script src="script.js"></script>
    <script src="cms.js"></script>
    <script>
        
        
            const uname = document.getElementsByClassName('middlelist');
            const mname = document.getElementsByClassName('uname');
            const contentusername = document.getElementById('contentusername');
            const update = document.getElementById('update');
            let showusername = null;
            let showname = null;
            let showmoney = null;
            let showurl = null;
            let showup = null;
            let showphone = null;
            for(let n=0;n<mname.length;n++){
                mname[n].addEventListener('click',postdata);
            }
            function postdata(){
                console.log(this.innerText.split("-"));
                showusername = this.innerText.split("-")[0];
                showname = this.innerText.split("-")[1];
                showmoney = this.innerText.split("-")[2];
                showurl = this.innerText.split("-")[3];
                showup = this.innerText.split("-")[4];
                showphone = this.innerText.split("-")[5];
                contentusername.innerHTML = "帳號:"+showusername;
                contentname.innerHTML = "真實姓名:"+showname;
                contentmoney.innerHTML = "餘額:"+showmoney;
                contentphone.innerHTML = "手機:" + showphone;
                contenturl.innerHTML = "專屬網址"+"http://www.partyboxxxxxx.com/register.php?code="+showurl;
                if(showup==""){
                    contentup.innerHTML = "上線:無";
                }else{
                    contentup.innerHTML = "上線:"+showup;
                }
                $('#qrcode').html('');
                $('#qrcode').qrcode({
                    width: 120,
                    height: 120,
                    text: "http://www.partyboxxxxxx.com/register.php?code="+showurl
                });
                                
            }
            update.addEventListener('click',()=>{
                // window.location.open ='./openuser.php?username='+showusername;
                window.open('./openuser.php?username='+showusername);
            })
            const searchbox = document.getElementById('searchbox');
            const searchbtn = document.getElementById('searchbtn');
            let searchtxt = "";
            let userArr = [];
            for(let u=0;u<uname.length;u++){
                let a = uname[u].innerText.split("-");
                a.length = 2;
                b = a.join(""); 
                userArr.push(b);
            }

            
            searchbtn.addEventListener('click',()=>{
                for(let q=0;q<uname.length;q++){
                    let c = "";
                    let d = ""
                    uname[q].style.display = "none";
                    c = uname[q].innerText.split("-");
                    c.length = 2
                    d = c.join('').trim();
                    searchtxt = searchbox.value;
                    if(d.includes(searchtxt)){
                        uname[q].style.display = "flex";
                    }
                }
            })
            
            
        
    </script>
    
</body>
</html>
<?php
}else{
echo "找不到此頁面。";
?>

<?php } ?>