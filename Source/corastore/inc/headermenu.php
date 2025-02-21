		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Đổi trả miễn phí trong vòng 3 ngày
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="about.php" class="flex-c-m trans-04 p-lr-25">
							Hỗ trợ
						</a>

						<a href="user.php" class="flex-c-m trans-04 p-lr-25">
							Tài khoản
						</a>
					</div>
				</div>
			</div>

		<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<!-- <img src="images/icons/logo-01.png" alt="IMG-LOGO"> -->
						<img src="images/icons/florence-logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="product.php">Shop</a>
								<ul class="sub-menu">
									<?php  
									$getall_category = $cat->show_category_frontend();
									if($getall_category){
										while ($result_allcat = $getall_category->fetch_assoc()){
									?>
									<li><a href="product.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName'] ?></a></li>
									<?php  
										}
									}
									?>
								</ul>
							</li>

							<li class="label1" data-label1="hot">
								<a href="feature.php">Nổi Bật</a>
							</li>

							<li>
								<a href="blog.php">Blog</a>
							</li>

							<li>
								<a href="about.php">About</a>
							</li>

							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="wishlist.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>	
		</div>
		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="search.php" method="post">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input style="font-family: Arial;" type="text" name="keyword" placeholder="Search..">
					<input style="display: none;" name="search-product" type="submit" value="Tìm kiếm">
				</form>
			</div>
		</div>