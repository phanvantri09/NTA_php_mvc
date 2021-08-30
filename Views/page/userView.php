<div class="section">
  <h1>Thông tin người dùng</h1>
<table>
  <tr>
    <th>Họ Tên</th>
    <th>Tên tài khoản</th>
    <th>Email</th>
    <th>Ngày Sinh</th>
    <th>Ảnh</th>
  </tr>
  <?php 
   foreach($k as $key => $item){
     if($item[1] == $_SESSION['usernameLogin']){
    ?>
  <tr>
    <td><?php echo $item[2]?></td>
    <td><?php echo $item[1]?></td>
    <td><?php echo $item[3]?></td>
    <td><?php echo $item[5]?></td>
    <td><img style="height: 50px;
    width: 50px;" src="<?php echo $item[6]?>" alt=""></td>
  </tr>
  <?php 
     }
   }
  ?>
</table>
<form action="" method="POST" enctype="multipart/form-data" class="updatefile">
  <label for="">Thay đổi ảnh đại diện của bạn</label>
  <input type="file" name="choesefile" value="Chọn file avatar">
  <input type="hidden" name="nameuser" value="<?php echo $_SESSION['usernameLogin']?>">
  <a href="index.php?controller=user&action=index"><input class="submit" type="submit"></a>
</form>
</div>