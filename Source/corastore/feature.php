<?php include('inc/header.php'); ?>
	<title>Product</title>
<?php include('inc/menu.php'); ?>
<?php
	if(isset($_GET['wishid'])){
		$customer_id = Session::get('customer_id');
		if($customer_id){
        $productid = $_GET['wishid'];
        $insertWishlist = $product->insertWishlist($productid, $customer_id);
        	header('Location: wishlist.php');
    	}else{
        	header('Location: user.php');
        }
    }

?>
		<!-- PRECART -->
		<?php include('inc/precart.php'); ?>

	</header>				
	<?php  
		$get_slider = $product->show_slider();
		if($get_slider){
			while ($result_slider = $get_slider->fetch_assoc()) {
				if($result_slider['sliderName']=='Happy Holiday'){
	?>
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="height: 500px; background-image: url(admin/uploads/<?php echo $result_slider['slider_image'];?>);">
		<h2 class="ltext-105 cl0" style="margin-left: -675px;">
			SẢN PHẨM CỦA TUẦN
		</h2>
		<br><br>
		<span style="font-size: 20px; color: white; margin-left: -675px;">Dành tặng những người bạn yêu thương - Dịp lễ này!</span>
		<br><br><br><br>
		<button class="rounded-button" onclick="scrollToSection()">Buy Now</button>
	<?php  
			}
		}
	}
	?>
	</section>	
	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140" id="target-section">
		<div class="container">
			<div class="row isotope-grid">
				<?php 
					$product_featured = $product->getallproduct_featured(); 
					if($product_featured){
						while($result = $product_featured->fetch_assoc()){

				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<a href="sproduct.php?proid=<?php echo $result['productId'] ?>">
							<img src="admin/uploads/<?php echo $result['image'] ?>" alt="IMG-PRODUCT">
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="sproduct.php?proid=<?php echo $result['productId'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $result['productName']?>
								</a>

								<span class="stext-105 cl3">
									<?php echo $fm->format_currency($result['price'])?>đ
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="?wishid=<?php echo $result['productId'] ?>" class="btn-addwish-b2 dis-block pos-relative ">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php  
					}
				}
				?>
			</div>
		</div>
	</div>
<style type="text/css">
.rounded-button {
	font-size: 16px;
	margin-left: -700px;
    border-radius: 23px;
    background-color: #717fe0;
    color: white;
    padding: 15px 30px;
    border: none; 
    cursor: pointer;
}
</style>
<script type="text/javascript">
	function scrollToSection() {
    var targetSection = document.getElementById('target-section');
    targetSection.scrollIntoView({ behavior: 'smooth' });
}
</script>

<?php include('inc/footer.php'); ?>