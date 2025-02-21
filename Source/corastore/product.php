<?php include('inc/header.php'); ?>
	<title>Product</title>
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
<?php include('inc/menu.php'); ?>
<?php 
	if(isset($_GET['catid'])){
	$id = $_GET['catid'];
	}else{
	$id=0;
	}	
?>
<!-- Phân Trang -->
<?php
	$count_product = $cat->get_product_by_cat($id);
	if($count_product){  
	$totalrow = mysqli_num_rows($count_product);
	$limit = 12; //bao nhiêu phần tử trên 1 trang
	$page = ceil($totalrow/$limit);
	$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
	$start = ($cr_page-1)*$limit;}else{$page=0;}
?>
		<!-- PRECART -->
		<?php include('inc/precart.php'); ?>

	</header>
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			SHOP
		</h2>
	</section>	
	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						<a style="color: black;" href="?catid=0">All Products</a>
					</button>
					<?php  
					$getall_category = $cat->show_category_frontend();
					if($getall_category){
						while ($result_allcat = $getall_category->fetch_assoc()){
					?>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $result_allcat['catId'] ?>">
						<a style="color: black;" href="?catid=<?php echo $result_allcat['catId']?>">
						<?php echo $result_allcat['catName'] ?></a>
					</button>
					<?php  
						}
					}
					?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
<!-- 					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div> -->

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<form action="search.php" method="post">
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="keyword" placeholder="Search">
						</form>
					</div>	
				</div>

				<!-- Filter -->
<!-- 				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<div class="row isotope-grid">
				<?php
				if($count_product){ //nếu tồn tại count_product mới hiển thị danh sách sản phẩm theo phân trang 
				$productbycat = $cat->get_product_by_cat_page($id,$start,$limit);
				if($productbycat){
					while($result = $productbycat->fetch_assoc()){	
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
				}
				?>
			</div>

			<!-- Load more -->
			<?php  
			if($count_product){
			?>
			<div class="flex-c-m flex-w w-full p-t-45">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($cr_page-1>0){ ?>
                    <li class="page-item"><a class="page-link" href="product.php?catid=<?php echo $id; ?>&page=<?php echo $cr_page-1; ?>">«</a></li>
                    <?php }?>
                   <?php    
                    for ($i=1;$i<=$page;$i++){ 
                   ?>
					<li class="page-item <?php echo ($cr_page == $i) ? 'active' : ''; ?>">
					    <a class="page-link" href="product.php?catid=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
					</li>

                    <?php
                    }
                    ?>
                    <?php if($cr_page+1<=$page){ ?>
                    <li class="page-item"><a class="page-link" href="product.php?catid=<?php echo $id; ?>&page=<?php echo $cr_page+1; ?>">»</a></li>
                    <?php }?>
                </ul>
			</div>
			<?php  
			}
			?>
		</div>
	</div>

<?php include('inc/footer.php'); ?>