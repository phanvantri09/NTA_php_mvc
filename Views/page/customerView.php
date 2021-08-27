<div class="section">
<h1>Danh sách thông tin khách hàng</h1>
<form action="" method="POST" class="formsearch">
  <input type="text" name="textsearch" placeholder="Tìm kiếm theo sdt hoặc email">
  <button type="submit" name="btnsearch"> <i class="fas fa-search"> <a href="index.php?controller=customer&action=search"></a></i> </button>
</form>
<table>
  <tr>
    <th>STT</th>
    <th>Họ Tên</th>
    <th>SDT</th>
    <th>Email</th>
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