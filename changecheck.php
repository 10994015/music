<?php
include_once('./conn.php');
if(isset($_POST['hidden']) && $_POST['hidden']=="changepwdpage"){
    try{
        $sql_str = "UPDATE member SET pwd = :newpwd WHERE username  = :username";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
     
        //接收表單輸入的資料
        // $pwd    = $_POST['pwd'];
        $newpwd      = $_POST['newpwd'];
        $phppwd      = $_POST['phppwd'];
        $username      = $_POST['username'];
     
        //設定準備好的$stmt物件中對應的參數值
        $stmt->bindParam(':username'    ,$username);
        $stmt->bindParam(':newpwd' ,$newpwd);
     
        //執行準備好的$stmt物件工作
        $stmt->execute();
        // $_SESSION['money'] = $money;
        header('Location:./');
      }
      catch (PDOException $e ){
        die("Error!: ". $e->getMessage());
      }
}