<?php
session_start();
$chk_code_input = $_POST['chk_code_input'];
if($chk_code_input == $_SESSION['imgchkcode']){
    echo '1';
}else{
    echo '0';
}


?>