
<div class="header">
    <div class="colheader">
        <?php
        foreach($k as $key =>$item){
            if($item[1] == $_SESSION['usernameLogin']){
        ?>
        
        <img src="<?php echo $item[6]?>" alt="" value="ảnh ở đây">
        <b>
        <?php
            echo $item[2];
        ?>
        </b>
        <?php
            }
        }
        ?>
        
    </div >
    <a href="index.php?controller=customer&action=index">Thông tin khác hàng</a>
    <a href="index.php?controller=user&action=index">Thông tin người dùng</a>
    <a href="index.php?controller=login&action=logout">Logout</a>
    </div>
</div>