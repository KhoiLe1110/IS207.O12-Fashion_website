<?php include('inc/header.php'); ?>
<?php
	$login_check = Session::get('customer_login');
	if(!$login_check){
		header('Location: user.php');
	}
?>
<?php  
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$insertOrder = $ct->insertOrder($customer_id);
		$delCart = $ct->del_all_cart();
		header('Location:success.php');
	}
?>
	<title>Order Received</title>
<?php include('inc/menu.php'); ?>
		<!-- PRECART -->
		<?php include('inc/precart.php'); ?>
	</header>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Thank You!
		</h2>
	</section>	


	<!-- Content page -->
	<?php
	$customer_id = Session::get('customer_id');  
	$get_amount = $ct->getAmountPrice($customer_id);
	if($get_amount){
		$amount = 0;
		while($result = $get_amount->fetch_assoc()){
			$price = $result['price'];
			$amount += $price;
		}
	}
	?>

	<div class="container">
		<div class="jumbotron text-center">
			<p class="lead">Chúng tôi đã nhận được đơn đặt hàng của bạn. Vui lòng kiểm tra email để xác nhận đơn đặt.
			</p>
			<br>
			<span>Đơn sẽ được đóng gói và gửi đi trong vòng 1-3 ngày. Cảm ơn bạn đã tin tưởng ủng hộ Corastore.</span>
			<hr>
			<p>Xem chi tiết đơn? <a href="history-order.php">Bấm vào đây</a></p>
			<br>
			<p class="lead"><a style="background-color: black; line-height: 2.5;" class="btn btn-primary btn-sm" href="index.php" role="button">Continue shopping</a></p>
		</div>
	</div>

<?php include('inc/footer.php'); ?>

<style type="text/css">
.jumbotron{
	background-color: white;
}
</style>
