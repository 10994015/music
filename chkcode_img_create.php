<?php
//產生新4個長度的整數驗證碼
session_start();    //啟動 session
$number = '';       //存放答案的變數
$number_len = 4;    //變數內容的長度(答案的長度)******
//$stuff = '123456789123456789123456789123456789123456789123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$stuff = '1356724890';  //抽樣來源******
$stuff_last = strlen($stuff) - 1;    //抽樣來源$stuff最後一個字元的索引號碼
 
for ($i = 0; $i < $number_len; $i++) {  //這個迴圈代表抽幾次
  $number .= substr($stuff, mt_rand(0, $stuff_last), 1);
  //抽答案 連接進來 取得字串中局部字元(字串, 取隨機值(0,$stuff最後一個字元的索引號碼), 取出一個字元 ) 
}
 
//產生session變數存放答案
$_SESSION['imgchkcode']=$number;
 
//產生驗證碼圖片
//$img = imagecreate(99,32);      //寬99,高32******
$img = imagecreatetruecolor(99, 30);
 
$black = imagecolorallocate($img, 0x36, 0x29, 0x56);     //背景色, 0x表示16進位編碼, 表示:紅36綠29藍56
$white = imagecolorallocate($img, 0xff, 0xff, 0xcc);     //前景色******
imagefill($img, 0, 0, $black);
 
//載入字體
$font = imageloadfont('gjun.gdf');
//將4位元整數驗證碼繪入圖片
imagestring($img, $font, 10, 2, $number, $white);
//imagestring($img, 5, 5, 2, $number, $white);
//imagestring(影像物件, 字體大小, padding-left, padding-top, $number, $white);  //******
 
// 輸出圖片
header("Content-type: image/png");
imagepng($img);      //送出PNG影像
imagedestroy($img);  //釋放主機端暫存影像

?>