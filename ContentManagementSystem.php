<?php
session_start();
include_once('./conn.php');
if(isset($_SESSION['name'])){
    
    try {
        $admin = "SELECT * FROM member WHERE level=9 ORDER BY id ASC";
        $admin_member = $conn -> query($admin);
        $sql_str = "SELECT * FROM member WHERE level=2 ORDER BY id ASC";
        $RS_member = $conn -> query($sql_str);
        $RS_member_push = $conn -> query($sql_str);
        $total_member = $RS_member -> rowCount();
        $memberArr = array();
        if($total_member > 1){
            foreach($RS_member_push as $n){
                array_push($memberArr,$n['username']);
            }
        }
        print_r($memberArr);
        
        
        // print_r($memberArr);
        // foreach($memberArr as $item){

        // }



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

    <div class="content">
    <?php if($_SESSION['mem_level'] > 2) {?>
       <div class="cms">
            <div class="member">
                <?php foreach($admin_member as $item){?>
                    <ul id="max">
                        <li>
                            <h4><?php echo $item['username']."-".$item['name']; ?></h4>
                            <ul id="middle">
                            <?php foreach($RS_member as $item){ ?>
                                <li>
                                    <?php echo $item['username']."-".$item['name']; ?>
                                    <ul>
                                      <?php
                                      for($i=0;$i<count($memberArr);$i++){
                                        $selectname = $memberArr[$i];
                                        $selectsql = "SELECT * FROM `$selectname` WHERE level=2 ORDER BY id ASC";
                                        $RS_user = $conn -> query($selectsql);
                                        foreach($RS_user as $us){
                                            echo $us['down'];
                                        }
                                        }

                                      ?>
                                    
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>

                    </ul>

                <?php } ?>
            </div>
       </div>
    <?php }else{ ?>
        <h1>您沒有權限進入此網站!!!</h1>
    <?php  }?>
    </div>

    <?php include_once('./footer.php'); ?>
    <script src="script.js"></script>
</body>
</html>
<?php
}else{
echo "找不到此頁面。";
?>

<?php } ?>