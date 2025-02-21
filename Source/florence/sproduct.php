<?php include('inc/header.php'); ?>
<?php

    if(!isset($_GET['proid']) || $_GET['proid']==NULL){
		echo "<script>window.location = '404.php' </script>";
	}else{
		$id = $_GET['proid'];
    } 

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    	$productStock = $_POST['productStock'];
    	$quantity = $_POST['quantity'];
    	if($quantity<=$productStock){
       		$AddtoCart = $ct->add_to_cart($quantity, $productStock, $id);
       	}else{
       		$Add =0;
       	}
    }

    $customer_id = Session::get('customer_id');

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){

    	$login_check = Session::get('customer_login');
		if(!$login_check){
			header('Location: user.php');
		}
		else{
    	$productid = $_POST['productid'];
        $insertWishlist = $product->insertWishlist($productid, $customer_id);
    	}
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment_submit'])){
    	$comment = $cs ->insertComment();
    }

?>
<?php include('inc/header2.php'); ?>


	<!-- breadcrumb -->
	<div class="container">
		<?php

		$get_product_details = $product->get_details($id);
		if($get_product_details){
			while($result_details = $get_product_details->fetch_assoc()){

		?>
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php?catid=<?php echo $result_details['catId']?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo $result_details['catName']?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $result_details['productName']?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="admin/uploads/<?php echo $result_details['image'] ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="admin/uploads/<?php echo $result_details['image'] ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $result_details['productName']?>
						</h4>

						<span class="mtext-106 cl2">
							<?php echo $fm->format_currency($result_details['price'])?>đ
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $result_details['product_desc']?>
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option selected disabled>Freesize</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="flex-w flex-r-m p-b-10">
										<form action="" method="post" style="display: flex;">
											<input type="hidden" name="productStock" value="<?php echo $result_details['productQuantity']?>">
											<?php  
											if(($result_details['productQuantity'])>0){
											?>											
											<input style="width: 100px; margin-right: 10px; border: 1px solid #ccc; padding:5px" type="number" name ="quantity" value="1" min="1">
											<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" type="submit" name ="submit">Thêm Vào Giỏ</button>	
											<?php  
											}else{
											?>
											<button class="btn btn-secondary" disabled>Sản Phẩm Hết Hàng</button>	
											<?php  
											}
											?>													
										</form>
									</div>	
									<span style="color: cadetblue;">
										<strong>
											<?php if(isset($AddtoCart))
											{
												echo 'Sản phẩm đã có trong giỏ';
											}
											?>
										</strong>
									</span> 
									<span style="color: cadetblue;">
										<strong>
										    <?php if(isset($Add) && $Add === 0)
										    	{
										        	echo 'Số lượng bạn đặt vượt quá số lượng trong kho. Vui lòng thêm lại.';
										    	}
										    ?>
										</strong>
									</span>
								</div>
							</div>	
						</div>

						<!-- THÊM VÀO WISHLIST  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<form action="" method="POST">
								<input type="hidden" name="productid" value="<?php echo $result_details['productId']?>">
								<div class="flex-m bor9 p-r-10 m-r-11">
									
										<button type="submit" name="wishlist"><i class="zmdi zmdi-favorite"></i></a></button>
									
								</div>
							</form>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>							
						</div>
							<span style="color: cadetblue;"><strong>
								<?php if(isset($insertWishlist))
									{
										echo $insertWishlist;
									}
								?></strong>
							</span> 
					</div>
				</div>
			</div>
			<span style="color: cadetblue;"><strong><p style="text-align: center;">
				<?php if(isset($comment))
					{
						echo $comment;
					}
				?></p></strong>
			</span> 
			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6"><?php echo $result_details['product_longdesc']?></p>
							</div>
						</div>


						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
											<?php  
											$productbycomment = $cs->get_comment_by_product($id);
											if($productbycomment){
											while($result = $productbycomment->fetch_assoc()){	
											?>
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="images/pacman.png" alt="AVATAR">
											</div>
											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														<?php echo $result['nameComment'] ?>
													</span>

													<span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
													</span>
												</div>

												<p class="stext-102 cl6">
													<?php echo $result['comment'] ?>
												</p>
											</div>
										</div>
											<?php  
												}
											}
											?>										
										<!-- Add review -->
										<form action="" method="POST" class="w-full">
											<h5 class="mtext-108 cl2 p-b-7">
												Thêm bình luận
											</h5>

											<p class="stext-102 cl6">
												Nếu cần tư vấn xin hãy để lại email để chúng tôi có thể liên hệ hỗ trợ. Email của bạn sẽ không công khai.
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>

											<div class="row p-b-25">
												<input type="hidden" value="<?php echo $result_details['productId']?>" name="productid_comment">
												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="nameComment" type="text" name="nameComment" required>
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="emailComment" required>
												</div>												
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="comment" required></textarea>
												</div>
												<br>
												<input type="submit" name="comment_submit" value="Gửi" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">										
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				Danh mục: <?php echo $result_details['catName']?>
			</span>
		</div>
				<?php  
				}
			}
		?>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Sản Phẩm Nổi Bật
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php 
						$product_featured = $product->getproduct_featured(); 
						if($product_featured){
							while($result = $product_featured->fetch_assoc()){

					?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<a style="text-decoration: none;" href="sproduct.php?proid=<?php echo $result['productId'] ?>">
								<img src="admin/uploads/<?php echo $result['image'] ?>" alt="">
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="sproduct.php?proid=<?php echo $result['productId'] ?>" class="" style="color: black;">
										<?php echo $result['productName']?>
									</a>
									<span class="stext-105 cl3">
										<?php echo $fm->format_currency($result['price'])?>đ
									</span>
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
	</section>
		
<?php include('inc/footer2.php'); ?>