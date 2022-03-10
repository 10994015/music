<?php
require_once('./conn.php');
session_start();
try {
    $sql_str = "SELECT * FROM member
                WHERE username=:username AND pwd=:pwd AND level > 1";
    $RS = $conn -> prepare($sql_str);
   
    $username = $_POST['username'];  //接收登入的帳號
    $pwd  = $_POST['pwd'];   //接收登入的密碼  
   
    $RS -> bindParam(':username', $username);
    $RS -> bindParam(':pwd', $pwd);
   
    $RS -> execute();
    $total = $RS -> rowCount();
    
    //$total是資料集的筆數, 如果>=1表示有查詢到資料，是符合登入的會員
    if( $total >= 1 ){
      $row_RS = $RS -> fetch(PDO::FETCH_ASSOC);
     
      $_SESSION['id']    = $row_RS['id'];     //將會員ID記錄到SESSION系統變數
      $_SESSION['name']  = $row_RS['name'];   //將會員名稱記錄到SESSION系統變數
      $_SESSION['username']  = $row_RS['username'];   //將會員名稱記錄到SESSION系統變數
      $_SESSION['mail']  = $row_RS['mail'];   //將會員名稱記錄到SESSION系統變數
      $_SESSION['money']  = $row_RS['money'];   //將會員名稱記錄到SESSION系統變數
      $_SESSION['mem_level'] = $row_RS['level'];  //將會員等級記錄到SESSION系統變數
      $url = './';  //登入成功要前往的位址
   
    }else{
      //登入失敗..............登入失敗要前往的位址，並加上msg參數
      $url = './login.php?msg=1';
    }
   
    header('Location:'.$url);  
  } 
  catch ( PDOException $e ){
    die("ERROR!!!: ". $e->getMessage());
  }
  ?>