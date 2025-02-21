<?php include('inc/header.php'); ?>
<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$keyword = $_POST['keyword'];
		$search_blog = $blog->search_blog($keyword);
	}else{
		header("Location:blog.php");
	}
?>
<!-- Phân Trang -->
<?php
	$count_blog = $blog->search_blog($keyword);
	if($count_blog){  
	$totalrow = mysqli_num_rows($count_blog);
	$limit = 3; //bao nhiêu phần tử trên 1 trang
	$page = ceil($totalrow/$limit);
	$cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
	$start = ($cr_page-1)*$limit;}else{$page=0;}
?>

	<title>Blog</title>
<?php include('inc/menu.php'); ?>
		<!-- PRECART -->
		<?php include('inc/precart.php'); ?>

	</header>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Blog
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
							<div class="p-r-45 p-r-0-lg">
						<?php
						if($count_blog){ //nếu tồn tại count_blog mới hiển thị danh sách tin tức theo phân trang 
						$blognews = $blog->search_blog_page($keyword,$start,$limit);
						if($blognews){
							while($result = $blognews->fetch_assoc()){	
						?>
						<div class="p-b-63">
							<a href="blog-detail.php?blogid=<?php echo $result['blogId'] ?>" class="hov-img0 how-pos5-parent">
								<img style="max-height: 350px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="IMG-BLOG">

								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										24
									</span>

									<span class="stext-109 cl3 txt-center">
										Dec 2023
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a href="blog-detail.php?blogid=<?php echo $result['blogId'] ?>" class="ltext-108 cl2 hov-cl1 trans-04">
										<?php echo $result['blogName'] ?>
									</a>
								</h4>

								<p class=" cl6">
									<?php echo $result['blog_desc'] ?>
								</p>

								<div class="flex-w flex-sb-m p-t-18">

									<a href="blog-detail.php?blogid=<?php echo $result['blogId'] ?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
										Continue Reading

										<i class="fa fa-long-arrow-right m-l-9"></i>
									</a>
								</div>
							</div>
						</div>
						<?php  
								}
							}
						}
						?>
						<!-- Pagination -->
						<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
						<?php  
						for ($i=1;$i<=$page;$i++){ 
						?>
							<a href="searchblog.php?page=<?php echo $i; ?>" class="flex-c-m how-pagination1 trans-04 m-all-7 <?php echo ($cr_page == $i) ? 'active-pagination1' : ''; ?>">
								<?php echo $i; ?>
							</a>
						<?php  
						}
						?>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="side-menu"><form class="form-inline" action="searchblog.php" method="post">
						<div class="bor17 of-hidden pos-relative">
							<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="keyword" placeholder="Nhập bài viết cần tìm...">

							<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div></form>

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
									<a href="?catid=<?php echo $result_allcat['blogcatId']?>" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
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