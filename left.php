<div class="left">
            <div class="list">
                <div class="item">
                    <img src="./images/0009.png" alt="">
                    <?php if(!isset($_SESSION['name'])){ ?>
                    <a href="./login.php">會員登入</a>
                    <?php }else{ ?>
                    <a href="./">首頁</a>
                    <?php  } ?>
                </div>
                <div class="item">
                    <img src="./images/0012.png" alt="">
                    <a href="./newbie.php">新手教學</a>
                </div>
                <div class="item">
                    <img src="./images/0011.png" alt="">
                    <a href="./earn.php">點擊賺取</a>
                </div>
                <div class="item">
                    <img src="./images/0010.png" alt="">
                    <a href="./gold.php">儲存金幣</a>
                </div>
                <div class="item">
                    <img src="./images/0013.png" alt="">
                    <a href="./contact.php">聯繫客服</a>
                </div>    
                <div class="item">
                    <img src="./images/0014.png" alt="">
                    <a href="./changepwd.php">帳號保護機制</a>
                </div>  
            </div>
            <div class="guide">
                <h2>快速升級指南</h2>
            </div>
        </div>