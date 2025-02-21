<?php include('inc/header.php'); ?>
<?php
    if(!isset($_GET['blogid']) || $_GET['blogid']==NULL){
		echo "<script>window.location = '404.php' </script>";
	}else{
		$id = $_GET['blogid'];
    } 
?>
	<title>Blog Detail</title>
<?php include('inc/menu.php'); ?>

		<!-- Cart -->
		<?php include('inc/precart.php'); ?>
	</header>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="blog.php" class="stext-109 cl8 hov-cl1 trans-04">
				Blog
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<?php

			$get_blog_details = $blog->get_details($id);
			if($get_blog_details){
				while($result_details = $get_blog_details->fetch_assoc()){

			?>			
			<span class="stext-109 cl4">
				<?php echo $result_details['blogName']?>
			</span>
		</div>
	</div>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						<!--  -->
						<div class="wrap-pic-w how-pos5-parent">
							<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="IMG-BLOG">
						</div>

						<div class="p-t-32">
							<span class="flex-w flex-m stext-111 cl2 p-b-19">
								<span>
									<?php echo $fm->formatDate($result_details['date'])?>
								</span>
							</span>

							<h4 class="ltext-109 cl2 p-b-28">
								<?php echo $result_details['blogName']?>
							</h4>

							<p class=" cl6 p-b-26">
								<?php echo $result_details['blog_desc']?>
							</p>

							<p class="stext-117 cl6 p-b-26">
								<?php echo $result_details['blog_content']?>
							</p>
						</div>
					</div>
				</div>

			<?php  
				}
			}
			?>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu">
						<div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>

						<div class="p-t-55">
							<h4 class="mtext-112 cl2 p-b-33">
								Categories
							</h4>

							<ul>
								<?php  
								$getall_category = $blog->show_category_frontend();
								if($getall_category){
									while ($result_allcat = $getall_category->fetch_assoc()){
								?>								
								<li class="bor18">
									<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										<?php echo $result_allcat['blogcatName'] ?>
									</a>
								</li>
								<?php  
									}
								}
								?>
							</ul>
						</div>

						<div class="p-t-65">
							<h4 class="mtext-112 cl2 p-b-33">
								Featured Products
							</h4>
							<ul>
								<?php 
									$product_featured = $product->getproduct_featured(); 
									if($product_featured){
										while($result = $product_featured->fetch_assoc()){

								?>
								<li class="flex-w flex-t p-b-30">
									<a href="sproduct.php?proid=<?php echo $result['productId'] ?>" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
										<img style="max-width: 80px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="PRODUCT">
									</a>

									<div class="size-215 flex-col-t p-t-8">
										<a href="sproduct.php?proid=<?php echo $result['productId'] ?>" class="stext-116 cl8 hov-cl1 trans-04">
											<?php echo $result['productName']?>
										</a>

										<span class="stext-116 cl6 p-t-20">
											<?php echo $fm->format_currency($result['price'])?>đ
										</span>
									</div>
								</li>
								<?php  
										}
									}
								?>								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
<?php include('inc/footer.php'); ?>