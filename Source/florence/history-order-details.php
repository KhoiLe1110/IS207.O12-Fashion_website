<?php include('inc/header.php'); ?>
<?php
	$login_check = Session::get('customer_login');
	if(!$login_check){
		header('Location: user.php');
	}
?>
<?php  
	$id = $_GET['customerid'];
	$ordercode = $_GET['ordercode'];
?>
	<title>Order Details</title>
<?php include('inc/menu.php'); ?>

		<!-- Cart -->
		<?php include('inc/precart.php'); ?>
	</header>

	<section id="cart" class="section-p1">
		<h3>Chi tiết đơn hàng #<?php echo $ordercode; ?></h3>
		<br>
		<table width="100%">
			<thead>
				<tr>
					<td>STT</td>
					<td>Tên Sản Phẩm</td>
					<td>Ảnh Sản Phẩm</td>
					<td>Giá Bán</td>
					<td>Số Lượng</td>
					<td>Thành Tiền</td>
				</tr>
			</thead>
			<tbody>
                <?php  
                  $get_order = $cs->show_order($id,$ordercode);
                  if($get_order){
                    $subtotal = 0;
                    $total = 0;
                    $i = 0;
                    while($result=$get_order->fetch_assoc()){
                      $i++;
                      $subtotal=$result['price']/$result['quantity'];
                      $total += $result['price'];
                ?>
				<tr>
					<td><?php echo $i;  ?></td>
                  	<td><?php echo $result['productName'];?></td>
                  	<td><img style="width:80px;max-height:80px" src="admin/uploads/<?php echo $result['image'] ?>"></td>
                  	<td><?php echo $fm->format_currency($subtotal);?>đ</td>
                  	<td><?php echo $result['quantity'];?></td>
                  	<td><?php echo $fm->format_currency($result['price']);?>đ</td>
				</tr>
			</tbody>
				<?php
						}
					}
				?>
		</table>
		<div class="row">
          <div class="col-12">
          	<span class="float-right" style="font-size:16px;">
          		<strong>Tổng cộng: <?php echo $fm->format_currency($total); ?> VND</strong>
          	</span>
          </div>
          <div class="col-12">
          	<span class="float-right" style="font-size:16px;">
          		<strong>Phí Ship: <?php $ship=20000; echo $fm->format_currency($ship); ?> VND</strong>
          	</span>
          </div>  
          <br>
          <div class="col-12">
          	<span class="float-right" style="font-size:16px; color: white; background-color:#717fe0 ;">
          		<strong>Thành Tiền: <?php echo $fm->format_currency($ship+$total); ?> VND</strong>
          	</span>
          </div>           
        </div>
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="history-order.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Quay Về
			</a>
		</div>
	</section>


<?php include('inc/footer.php'); ?>
<?php include('inc/style.php'); ?>