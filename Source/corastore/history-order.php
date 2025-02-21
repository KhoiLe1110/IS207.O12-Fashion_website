<?php include('inc/header.php'); ?>
<?php
	$login_check = Session::get('customer_login');
	if(!$login_check){
		header('Location: user.php');
	}
?>
	<title>History Orders</title>
<?php include('inc/menu.php'); ?>

		<!-- Cart -->
		<?php include('inc/precart.php'); ?>
	</header>

		

	<section id="page-header" class="about-header">

		<h2>Lịch Sử Mua Hàng</h2>

		<p>Xem tình trạng và lịch sử của những đơn hàng bạn đã mua</p>
	</section>

	<section id="cart" class="section-p1">
		<table width="100%">
			<thead>
				<tr>
					<td>ID</td>
					<td>Mã Đơn Hàng</td>
					<td>Địa Chỉ Giao</td>
					<td>Thời Gian Đặt Hàng</td>
					<td>Tình Trạng</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				<?php
					$customer_id = Session::get('customer_id');
	                $get_inbox_cart = $ct->get_inbox_cart_history($customer_id);
	                  if($get_inbox_cart){
	                  	$i = 0;
	                    while($result=$get_inbox_cart->fetch_assoc()){
	                      $i++;
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $result['order_code'] ?></td>
					<td><?php echo $result['address'] ?></td>
					<td><?php echo $fm->formatDate($result['date_created'])?></td>
					<td>
						<?php
						if ($result['status'] == '0') {
						    echo '<span style="background-color: #f0932b; color: #fff; padding:5px;">Chờ Xác Nhận</span>';
						} elseif ($result['status'] == '1') {
						    echo '<span style="background-color: #6ab04c; color: #fff; padding:5px;">Đang Vận Chuyển</span>';
						} else {
						    echo '<span style="background-color: #30336b; color: #fff; padding:5px;">Đã Giao</span>';
						}
						?>
					</td>
					<td><a href="history-order-details.php?customerid=<?php echo $result['customer_id'];?>&ordercode=<?php echo $result['order_code'];?>"><button style="color: cadetblue;">Xem Đơn Hàng</button></a></td>
				</tr>
			</tbody>
			<?php
					}
				}
			?>
		</table>
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="index.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Về Trang Chủ
			</a>
		</div>
	</section>

<?php include('inc/footer.php'); ?>
<?php include('inc/style.php'); ?>