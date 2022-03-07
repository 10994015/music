<?php
/*
 * 這個檔案負責在會員註冊時, 檢查會員帳號是否已存在已有人使用
 */

//連線資料庫
require_once('./conn.php');
//到資料庫查詢取得會員資料, 比對註冊的帳號email是否已存在=>建立為資料集
try{
    //準備SQL語法
    $sql_str = "SELECT * FROM member
    WHERE username = :mem_username";
    $stmt = $conn -> prepare($sql_str);
    //接收資料
    $username = $_POST['mem_username'];
  

    //綁定資料
    $stmt -> bindParam(':mem_username',$username);
  

    //執行
    $stmt -> execute();
    $total = $stmt -> rowCount();

    echo $total;
}
catch(PDOException $e){
    die('Error!:'.$e->getMessage());
  }
?>