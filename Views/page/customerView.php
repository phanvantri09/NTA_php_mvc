
<div class="section">

<form action="" method="POST" class="formsearch">
  <input type="text" name="textsearch" placeholder="Tìm kiếm theo sdt hoặc email">
  <button type="submit" name="btnsearch"> <i class="fas fa-search"> <a href="index.php?controller=customer&action=index"></a></i> </button>
</form>

<?php
  if(isset($textsearch)){
    ?>
    <h1>Thông tin khách hàng <?php echo $textsearch; ?> </h1>
    <table>
    <tr>
    <th>STT</th>
    <th>Họ Tên</th>
    
    <th>Email</th>
    <th>SDT</th>
    <th>Ngày Sinh</th>
  </tr>
    <?php
    foreach($kc as $key => $item){
      if($textsearch == $item[3])
      {
        ?>
        <tr>
    <td><?php echo $item[0]?></td>
    <td><?php echo $item[1]?></td>
    <td><?php echo $item[2]?></td>
    <td><?php echo $item[3]?></td>
    <td><?php echo $item[4]?></td>
  </tr>
      <?php  
      }
    } 
  }
  ?>
</table>
<h1>Danh sách thông tin khách hàng</h1>
<table>
  <tr>
    <th>STT</th>
    <th>Họ Tên</th>
    
    <th>Email</th>
    <th>SDT</th>
    <th>Ngày Sinh</th>
  </tr>
  <?php
    foreach($kc as $key => $item){
    ?>
  <tr>
    <td><?php echo $item[0]?></td>
    <td><?php echo $item[1]?></td>
    <td><?php echo $item[2]?></td>
    <td><?php echo $item[3]?></td>
    <td><?php echo $item[4]?></td>
  </tr>
  <?php 
      }
  ?>
</table>
</div>