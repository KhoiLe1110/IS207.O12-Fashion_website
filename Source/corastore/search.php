<?php include('inc/header.php'); ?>
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
	<title>Kết quả tìm kiếm</title>
<?php include('inc/menu.php'); ?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$keyword = $_POST['keyword'];
		$search_product = $product->search_product($keyword);
	}
?>

		<!-- PRECART -->
		<?php include('inc/precart.php'); ?>

	</header>
	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<span>Kết quả tìm kiếm cho: <strong><?php echo $keyword; ?></strong></span>
			<br><br>
			<div class="row isotope-grid">
				<?php  
				if($search_product){
					while($result = $search_product->fetch_assoc()){

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
								<a href="?wishid=<?php echo $result['productId'] ?>" class="btn-addwish-b2 dis-block pos-relative">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php  
					}
				}else{
				?>
			</div>
			<p style="text-align: center;">
				<?php echo "Không có sản phẩm bạn cần tìm. Vui lòng thử lại" ?>
			</p>
				<?php  
					}
				?>
		</div>
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="index.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Trang chủ
			</a>
		</div>
		<br><br>
	</div>		
<?php include('inc/footer.php'); ?>