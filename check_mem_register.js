$(document).ready(function(){	
  //變數設定為各個要被檢查的物件------------------------------------------
  var chk_mail         = $(".mem_mail");      //email
  var chk_username     = $(".username");      //帳號
  var chk_pwd          = $(".mem_pwd");       //密碼
  var chk_confirm_pwd  = $(".confirm_pwd");   //密碼再次輸入
  var chk_code         = $(".chkcode");       //驗證碼的輸入

  //變數設定為各個檢查後的結果--------------------------------------------
  var test_mail        = false;  //設定帳號的輸入是否正確,預設為否
  var test_username    = false;  //設定帳號的輸入是否正確,預設為否
  var test_pwd         = false;  //設定密碼的輸入是否正確,預設為否
  var test_confirm_Pwd = false;	 //設定確認密碼的輸入是否正確,預設為否
  var test_chk_code    = false;  //設定驗證碼的輸入是否正確,預設為否

  //變數設定為 msg 顯示的位置--------------------------------------------
  var msg_mail         = $('.msg_mail');
  var msg_username     = $('.msg_username');
  var msg_pwd          = $('.msg_pwd');
  var msg_confirm_pwd  = $('.msg_confirm_pwd');
  var msg_chkcode      = $('.msg_chkcode');

  //變數設定為 msg 顯示時輔助的設定--------------------------------------
  var msg_blue_start   = '<span style="color:blue">';
  var msg_blue_end     = '</span>';
  var m1               = '<span class="str1"></span>';
  var m0               = '<span class="str0"></span>';

  //==========檢測帳號=================================================================

  chk_username.bind("blur",function(){
    if($(this).val()!=""){
      var chk_username_val = $(this).val();	
      var reg_username = /[a-zA-Z]|\d{,5}$/;
      if( !reg_username.test(chk_username_val) ){
        $(msg_username).html('只能輸入英文或數字!');
        test_username = false;
      }else{
        $.ajax({
          url   : 'mem_chk_username.php'
          ,type :'POST'
          ,data :{ mem_username:chk_username_val }
        }).done(function(msg){
          if(msg==1){   //當收到的值==1, 表示資料庫中已有此帳號
            $(msg_username).html('帳號已存在,不能使用！');
            test_username = false;
            
          }else{
            $(msg_username).html(msg_blue_start+'帳號可以使用！'+msg_blue_end);
            test_username = true;
            
          }
        })
      }
    }
  })
  //當游標離開帳號欄位時
  chk_mail.bind("blur",function(){
    //假如欄位內的值不是空的
    if($(this).val()!=""){
      var chk_mail_val = $(this).val();	//取得目前輸入的內容值
      //以 reg 變數設定檢查E-Mail格式的正則表達式(描述字元規則的檢查物件)
      // var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
      var reg = /^0[9]\d{8}$/;

      //以 reg 物件檢查 chk_mail_val, 符合規則得到true
      if( !reg.test(chk_mail_val) ){
        $(msg_mail).html('手機號碼格式錯誤!');
        test_mail = false;
      }else{

        //使用AJAX技術取得外部mem_chk_member.php來處理判斷帳號--------------------
        $.ajax({
          //呼叫 mem_chk_member.php 進來工作, 以POST方式傳入 chk_mail_val 變數的值
          url   : 'mem_chk_member.php'
          ,type :'POST'
          ,data :{ mem_mail:chk_mail_val }

          //完成ajax的工作後, 執行以下function----------------------------------
        }).done(function(msg){    
          //mem_chk_member.php完成工作會回傳值, 以 msg 收下回傳的值
          //console.log('=========='+msg);
          if(msg==1){   //當收到的值==1, 表示資料庫中已有此帳號
            $(msg_mail).html('此手機號碼已註冊過');
            test_mail = false;
            
          }else{
            $(msg_mail).html(msg_blue_start+'此手機可以使用！'+msg_blue_end);
            test_mail = true;
            
          }
        });//done end ajax end

      }//if reg chk end
    }//if($(this).val()!="") end
  });//blue end

  //當游標點入帳號欄位時
  chk_mail.bind("focus",function(){
    $(msg_mail).html('');	//將訊息區塊的內容清除
  });


  //==========檢查密碼============================================================
  //當游標在密碼欄位,並且鍵盤有按下放開時
  chk_pwd.bind("keyup",function(){
    var strength=0;					      //strength變數負責密碼正確時的積分
    checkStrength(chk_pwd.val());	//將密碼欄位的值傳給checkStrength函數執行函數內的工作

    function checkStrength(pwd){
      //假如密碼欄位內容值的長度小於6
      if(pwd.length<6){
        $(msg_pwd).html('密碼未達6個字元(應輸入6~20字元)！');
        test_pwd=false;	//設定test_pwd變數為false否定(負責判斷密碼是否正確)
      }
      //假如密碼欄位內容值的長度大於20
      else if(pwd.length>20){
        $(msg_pwd).html('密碼超過20個字元(應輸入6~20字元)！');
        test_pwd=false;	//設定密碼格式不正確
      }	
      else{
        //表示密碼格式正確, 設定pdTest變數記錄密碼格式正確
        test_pwd=true;
        strength += 1;		//strength變數累加1,表示積分有1分
        //假如密碼內容包含有英文字母時,積分再加1分
        if (pwd.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) { strength += 1 }
        //假如密碼內容包含有英文字母及數字時,積分再加1分
        if (pwd.match(/([a-zA-Z])/) && pwd.match(/([0-9])/)) { strength += 1 }
        //假如密碼內容包含有特殊符號時,積分再加1分
        if (pwd.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) { strength += 1 }
        //假如密碼內容包含有二個以上的特殊符號時,積分再加1分
        if (pwd.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) 
        { strength += 1 }

        //判斷strength變數記錄積分
        switch(strength){
          case 1: //表示積分為1分時
            $(msg_pwd).html(msg_blue_start+
                            '密碼強度: '+msg_blue_end+m1+m0+m0+m0+m0);	break;
          case 2: //表示積分為2分時
            $(msg_pwd).html(msg_blue_start+
                            '密碼強度: '+msg_blue_end+m1+m1+m0+m0+m0);	break;
          case 3: //表示積分為3分時
            $(msg_pwd).html(msg_blue_start+
                            '密碼強度: '+msg_blue_end+m1+m1+m1+m0+m0);	break;
          case 4: //表示積分為4分時
            $(msg_pwd).html(msg_blue_start+
                            '密碼強度: '+msg_blue_end+m1+m1+m1+m1+m0);	break;
          case 5: //表示積分為5分時
            $(msg_pwd).html(msg_blue_start+
                            '密碼強度: '+msg_blue_end+m1+m1+m1+m1+m1);	break;
        }
      }
    }
  });
  //當游標點入密碼欄位時
  chk_pwd.bind("focus",function(){
    $(msg_pwd).html('');	//將訊息區塊的內容清除
  });		


  //==========二次密碼核對===================================================
  function chk2pwd(){
    if(chk_confirm_pwd.val()==chk_pwd.val()){
      $(msg_confirm_pwd).html(msg_blue_start+'密碼相符！'+msg_blue_end);
      test_confirm_Pwd=true;
    }
    else{
      $(msg_confirm_pwd).html('密碼不符！');
      test_confirm_Pwd=false;
    }
  }
  
  chk_pwd.bind('keyup',function(){
    if( chk_confirm_pwd.val()!='' ){
      chk2pwd();
    }
  });

  chk_confirm_pwd.bind("keyup",function(){
    if( chk_pwd.val()!='' && chk_confirm_pwd.val()!='' ){
      chk2pwd();
    }
  });
 

  //==========重讀驗證碼=====================================================
  $('.re-chkcode').on('click',function(){
    $('.chkcodeimg').attr('src','./chkcode_img_create.php');
    $(msg_chkcode).html('');	//將訊息區塊的內容清除
    test_chk_code = false;
  }); 


  //==========圖形驗證碼核對=================================================
  chk_code.bind("keyup",function(){
    if( chk_code.val()!='' ){
      var chk_code_input = $(this).val();	//取得目前內容
      $.ajax(
        {	//要載入的是chkcode_img_check.php, 以POST方式傳入chk_code_input變數的值
          url:"./chkcode_img_check.php"
          ,type:"POST"
          ,data:{chk_code_input:chk_code_input}
        }
      ).done(function(msg){  //處理完成後執行以下function函數
        if(msg==1){
          $(msg_chkcode).html(msg_blue_start+'驗證碼正確！'+msg_blue_end);
          test_chk_code=true;  //變數記錄帳號不正確
        }
        else{
          $(msg_chkcode).html('驗證碼不正確！');
          test_chk_code=false;  //變數記錄帳號是正確的
        }
      });
    }else{
      //當驗證碼的輸入都清除時，讓訊息也清除
      $(msg_chkcode).html('');
    }
  });



  //==========按下註冊鈕時的判斷==========================================
  $(".mem-addmem-area").bind("submit",function(){	
    //當4個test變數皆為true, 表示各欄位的檢查皆過關
    if( test_username && test_mail && test_pwd && test_confirm_Pwd && test_chk_code ){
      return true;		//傳回true, 表示進行submit的工作, 也就示傳出表單
    }
    else{	//否則表示有任何一個錯誤時, 顯示訊息提示
      var result = '';
      var msg2_username    = '此帳號無法使用！\r';
      var msg2_mail        = '手機號碼必須符合格式申請或已有人使用！\r';
      var msg2_pwd         = '密碼必須以6~20個字元填寫！\r';
      var msg2_confirm_pwd = '確認密碼必須 = 密碼的輸入！\r';
      var msg2_chkcode     = '必須依左下方的數字圖案填寫驗證碼！\r';

      if(!test_username)    { result+=msg2_username;    }
      if(!test_mail)        { result+=msg2_mail;        }
      if(!test_pwd)         { result+=msg2_pwd;         }
      if(!test_confirm_Pwd) { result+=msg2_confirm_pwd; }
      if(!test_chk_code)    { result+=msg2_chkcode;     }

      // $('#info-modal .info-content').html(result);
      // $('#info-modal').css('display','block');
      alert(result);

      return false; 		//傳回false, 表示不進行submit的工作
    }
  });

});