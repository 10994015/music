<?php
//連線資料庫
require_once('./conn.php');

if(isset($_POST['MM_process']) && $_POST['MM_process']=='addmem'){
    try{
        $sql_str = "INSERT INTO member ( mem_name,mem_mail,mem_pwd,mem_chkcode)
                      VALUES (:mem_name,:mem_mail,:mem_pwd,:mem_chkcode)";
        $stmt = $conn -> prepare($sql_str);

        $mem_name = $_POST['mem_name'];
        $mem_mail = $_POST['mem_mail'];
        $mem_pwd = $_POST['mem_pwd'];

        $mem_chkcode = getchkcode();

        $stmt -> bindParam(':mem_name' ,$mem_name);
        $stmt -> bindParam(':mem_mail' ,$mem_mail);
        $stmt -> bindParam(':mem_pwd' ,$mem_pwd);
        $stmt -> bindParam(':mem_chkcode' ,$mem_chkcode);

        $stmt ->execute();

        $result2 = sendMail($mem_mail,$mem_name,$mem_chkcode);

        $msg =1;

        if($result2!=1){$msg = 0;}

        header('Location:?page=mem_addmem_ok&msg='.$msg.'&r='.$result2);
        // header('Location:?page=mem_addmem_ok');
    }
    catch(PDOException $e){
        die("Error!:註冊失敗.....".$e->getMessage());
    }
}
//如果來自註冊表單送來的資料(將資料存入資料庫mem資料表>發信)====================================


//如果接收到msg的訊息是1時, 表示註冊成功, 發信也成功了
if(isset($_GET['msg']) && $_GET['msg']==1){
    echo '<h1 data-no="4" class="display-none">註冊成功</h1>';
    echo '<h2>感謝您註冊新會員成功！<br>
                請前往郵件信箱收信！<br>
                點選驗證連結再回到網站！<br></h2>';
}



//如果接收到msg的訊息是0時, 表示註冊成功, 但發信失敗了
if(isset($_GET['msg']) && $_GET['msg']==0){
    echo '<h1 data-no="4" class="display-none">發信失敗</h1>';
    echo '<h2>由於.........發信失敗, 請重發確認信.......</h2>';

}


//負責發信的自定函式(收件者信箱, 收件者名稱, 確認信的驗證碼)
function sendMail($mailto,$name,$chkcode){
 
    $subject = "=?UTF-8?B?".base64_encode('承諺網站會員功能啟用通知')."?=";
   
    $content = $name.'您好, 感謝申請會員<br>'
              .'TS緹絲坊網站會員功能啟用通知<br>'
              .'請點選<a href="localhost/ts0713/?page=mem_login&mailok=1&mem_mail='
              .$mailto.'&mem_chkcode='.$chkcode.'">此連結回覆確認信箱</a><br>'
              .'此信件為系統自動發送, 請勿點選回覆信件'; 
   
    $header = "From: server@gmail.com\r\n";
    $header .= "Content-type: text/html; charset=utf8";
   
    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    $result = mail($mailto, $subject, $content, $header);
    return $result;
  }

//負責取得驗證碼的自定函式
function getchkcode(){
    $number = '';
    $number_len = 6;
    $stuff = '1234567890';
    $stuff_last = strlen($stuff) -1;

    for($i = 0;$i<$number_len;$i++){
        $number .= substr($stuff,mt_rand(0,$stuff_last),1);
    }
    return $number;
}

?>




