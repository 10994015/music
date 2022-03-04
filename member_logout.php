<?php
include_once('./conn.php');
session_start();
$_SESSION['id']    ='';     //將會員ID記錄到SESSION系統變數
$_SESSION['name']  = '';    //將會員名稱記錄到SESSION系統變數
$_SESSION['username']  ='';    //將會員名稱記錄到SESSION系統變數
$_SESSION['money']  = ''; 
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['username']);
unset($_SESSION['money']);
 
header('Location:./');
?>