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

	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<?php include('inc/headermenu.php'); ?>

		<!-- PRECART -->
		<?php include('inc/precart.php'); ?>
	</header>
		
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<?php  
					$get_slider = $product->show_slider();
					if($get_slider){
						while ($result_slider = $get_slider->fetch_assoc()) {
							if ($result_slider['sliderName'] == 'Slide BST Đông' && $result_slider['sliderName'] != 'Happy Holiday'){
				?>
				<div class="item-slick1" style="background-image: url(admin/uploads/<?php echo $result_slider['slider_image'];?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									BST Áo Khoác Siêu Nhẹ
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									WINTER 2023
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.php?catid=56" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php
				}elseif($result_slider['sliderName'] != 'Happy Holiday'){
				?>
				<div class="item-slick1" style="background-image: url(admin/uploads/<?php echo $result_slider['slider_image'];?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									New Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>				
				<?php
							}
						}
					}
				?> 
				<!-- <div class="item-slick1" style="background-image: url(images/slide-02.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div> -->

				<!-- <div class="item-slick1" style="background-image: url(images/slide-03.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2018
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>

	<!-- New Product -->
	<section id="product1" class="section-p1">
		<h3 class="ltext-103 cl5">New Products</h3>
		<p>Sản Phẩm Mới - Đừng Bỏ Lỡ!</p>
		<div class="pro-container-slider">
			<?php 
				$product_new = $product->getproduct_new(); 
				if($product_new){
					while($result_new = $product_new->fetch_assoc()){

			?>
			<div class="pro">
				<a style="text-decoration: none;" href="sproduct.php?proid=<?php echo $result_new['productId'] ?>">
				<img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="">
				<div class="des">
					<span><?php echo $result_new['catName']?></span>
					<h5><?php echo $result_new['productName']?></h5>
					<div class="star">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<h4><?php echo $fm->format_currency($result_new['price'])?>đ</h4>
				</div>
				</a>
				<a href="?wishid=<?php echo $result_new['productId']; ?>"><i class="fa fa-heart cart" aria-hidden="true"></i></a>
			</div>

			<?php  
					}
				}
			?>
		</div>
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="product.php">
				<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
					Xem thêm
				</button>
			</a>
		</div>
	</section>

	<!-- Featured Product -->
	<section id="product1" class="section-p1">
		<h3 class="ltext-103 cl5">Featured Products</h3>
		<p>Những Sản Phẩm Nổi Bật Tuần Này</p>
		<div class="pro-container">
			<?php 
				$product_featured = $product->getproduct_featured(); 
				if($product_featured){
					while($result = $product_featured->fetch_assoc()){

			?>
			<div class="pro">
				<a style="text-decoration: none;" href="sproduct.php?proid=<?php echo $result['productId'] ?>">
				<img src="admin/uploads/<?php echo $result['image'] ?>" alt="">
				<div class="des">
					<span><?php echo $result['catName']?></span>
					<h5><?php echo $result['productName']?></h5>
					<div class="star">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<h4><?php echo $fm->format_currency($result['price'])?>đ</h4>
				</div>
				</a>
				<a href="?wishid=<?php echo $result['productId']; ?>"><i class="fa fa-heart cart" aria-hidden="true"></i></a>
			</div>
			<?php  
					}
				}
			?>
		</div>
	</section>
	<section id="sm-banner" class="section-p1">
		<div class="banner-box">
			<h4 style="background-color:#2C3A47;">crazy deals</h4>
			<h2 style="background-color:#2C3A47;">buy 1 get 1 free</h2>
			<span style="background-color:#2C3A47;">Khám phá bộ sưu tập mới nhất</span>
			<a href="product.php?catid=58"> <button class="white" style="background-color:#717fe0">Collection</button></a>
		</div>
		<div class="banner-box banner-box2">
			<h4>winter/spring</h4>
			<h2>upcoming season</h2>
			<span>Khám phá tin tức thời trang mới nhất</span>
			<a href="blog.php"><button class="white" style="background-color: #717fe0">Learn More</button></a>
		</div>
	</section>
		<!-- Banner -->
	<section id="banner3">
			<div class="banner-box">
				<h2>HOTLINE</h2>
				<h3>03 2838 3979 -03 3319 3979</h3>
			</div>
			<div class="banner-box banner-box2">
				<h2>LIFEWEAR COLLECTION</h2>
				<h3>Spring / Summer 2024</h3>
			</div>
			<div class="banner-box banner-box3">
				<h2>T-SHIRTS</h2>
				<h3>New Trendy Prints</h3>
			</div>
	</section>


<?php include('inc/footer.php'); ?>
<?php include('inc/style.php'); ?>