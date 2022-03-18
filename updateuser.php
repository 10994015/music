<?php 
include_once('./conn.php');
if(isset($_POST['updateuser']) && $_POST['updateuser'] =="updateuser"){
    try{
        $sql_str = "UPDATE member SET money = :money,username = :username,name =:name, pwd=:pwd  WHERE username  = :username";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
     
        //接收表單輸入的資料
        $username    = $_POST['username'];
        $money      = $_POST['money'];
        $name      = $_POST['name'];
        $pwd      = $_POST['pwd'];
     
        //設定準備好的$stmt物件中對應的參數值
        $stmt->bindParam(':username'    ,$username);
        $stmt->bindParam(':money' ,$money);
        $stmt->bindParam(':name' ,$name);
        $stmt->bindParam(':pwd' ,$pwd);
     
        //執行準備好的$stmt物件工作
        $stmt->execute();
        // $_SESSION['money'] = $money;
        echo "<script>alert('編輯成功!');location.href='./ContentManagementSystem.php';</script>";
        // header('Location:./ContentManagementSystem.php');
      }
      catch (PDOException $e ){
        die("Error!: ". $e->getMessage());
      }
}