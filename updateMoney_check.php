<?php
include_once('./conn.php');
session_start();
if( isset($_POST['update']) && $_POST['update'] == "update"){
  try{
    $sql_str = "UPDATE member SET money = :money WHERE username  = :username";
    //執行$conn物件中的prepare()預處理器
    $stmt = $conn->prepare($sql_str);
 
    //接收表單輸入的資料
    $username    = $_POST['username'];
    $money      = $_POST['money'];
 
    //設定準備好的$stmt物件中對應的參數值
    $stmt->bindParam(':username'    ,$username);
    $stmt->bindParam(':money' ,$money);
 
    //執行準備好的$stmt物件工作
    $stmt->execute();
    $_SESSION['money'] = $money;
    header('Location:./cms.php');
  }
  catch (PDOException $e ){
    die("Error!: ". $e->getMessage());
  }
}