		<div class="wrap-header-cart js-panel-cart">
			<div class="s-full js-hide-cart"></div>

			<div class="header-cart flex-col-l p-l-65 p-r-25">
				<div class="header-cart-title flex-w flex-sb-m p-b-8">
					<span class="mtext-103 cl2">
						Your Cart
					</span>
					<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
						<i class="zmdi zmdi-close"></i>
					</div>
				</div>
					<?php
						$check_cart =$ct->check_cart();  
							if(($check_cart)){
					?>
					<?php 
						$get_product_cart = $ct->get_product_cart(); 
						if($get_product_cart){
							$subtotal = 0;
							while($result = $get_product_cart->fetch_assoc()){

					?>
				<div class="header-cart-content flex-w js-pscroll">
					<ul class="header-cart-wrapitem w-full">
						<li class="header-cart-item flex-w flex-t m-b-12">
							<div class="header-cart-item-img">
								<img src="admin/uploads/<?php echo $result['image'] ?>" alt="IMG">
							</div>

							<div class="header-cart-item-txt p-t-8">
								<a href="sproduct.php?proid=<?php echo $result['productId'] ?>">
									<?php echo $result['productName'] ?>
								</a>

								<span class="header-cart-item-info">
									<?php echo $result['quantity'] ?> x <?php echo $fm->format_currency($result['price']) ?>đ
								</span>
							</div>
						</li>
						<?php 
							$total = $result['price']*$result['quantity'];
							$subtotal += $total;
								}	
							}
						?>
					</ul>
					<br><br><br><br><br>
					<div class="w-full">
						<div class="header-cart-total w-full p-tb-40">
							<p>Tổng giỏ hàng</p>
						<?php echo $fm->format_currency($subtotal);?>đ
						<?php Session::set('sum',$subtotal); ?>
						</div>

						<div class="header-cart-buttons flex-w w-full">
							<a href="cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
								View Cart
							</a>

							<a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php
				}else{
					echo "<span><strong>Không có sản phẩm nào trong giỏ hàng.</strong></span>";
				}  
			?>
		</div>