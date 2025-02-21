<?php include('inc/header.php'); ?>
<?php
	if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid'];
        $delcart = $ct->del_product_cart($cartid);
    }

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
		$cartId = $_POST['cartId'];
    	$quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
    } 
?>
	<title>Your Cart</title>
<?php include('inc/menu.php'); ?>

		<!-- Cart -->
		<?php include('inc/precart.php'); ?>
	</header>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	<section id="page-header" class="about-header">

		<h2>#Your_Cart</h2>

		<p>LEAVE A MESSAGE, We love to hear from you!</p>
	</section>

	<section id="cart" class="section-p1">
		<?php
			$check_cart =$ct->check_cart();  
				if(($check_cart)){
		?>
		<table width="100%">
			<thead>
				<tr>
					<td>Remove</td>
					<td>Image</td>
					<td>Product</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Subtotal</td>
				</tr>
			</thead>
			<tbody>
				<?php 
					$get_product_cart = $ct->get_product_cart(); 
					if($get_product_cart){
						$subtotal = 0;
						while($result = $get_product_cart->fetch_assoc()){
				?>
				<?php 
					if(isset($delcart)){
						echo $delcart;
					}

				?>
				<tr>
					<td><a href="?cartid=<?php echo $result['cartId']; ?>"><i class="fa fa-times-circle-o" style="color:black;" aria-hidden="true"></i></a></td>
					<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $fm->format_currency($result['price']) ?>đ</td>
					<td style="text-align: center;">
						<form style="display: flex;" action="" method="POST">
							<input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>">
							<input type="number" style="border: 1px solid black; margin-right: 10px;" name="quantity" min="1" max="<?php echo $result['stock'] ?>" value="<?php echo $result['quantity'] ?>">
							<input type="submit" style="width: 100px; padding: 10px 15px 10px 15px; background-color: black; color: #fff;  cursor: pointer;" value="Update" name="submit">
						</form>
					</td>
					<td><?php 
					$total = $result['price']*$result['quantity'];
					echo $fm->format_currency($total); 
					?>đ</td>
				</tr>
			</tbody>
			<?php
				$subtotal += $total;
					}	
				}
			?>
		</table>
	</section>

	<section id="cart-add" class="section-p1">
		<div id="coupon">
			<h3>Apply Coupon</h3>
			<div>
				<input type="text" placeholder="Enter Your Coupon">
				<button class="normal">Apply</button>
			</div>
		</div>

		<div id="subtotal">
			<h3>Cart Totals</h3>
			<table>
				<tr>
					<td>Cart Subtotal</td>
					<td>
						<?php echo $fm->format_currency($subtotal);?>đ
						<?php Session::set('sum',$subtotal); ?>
					</td>
				</tr>
				<tr>
					<td>Shipping</td>
					<td><?php echo $fm->format_currency($ship=20000);?>đ</td>
				</tr>
				<tr>
					<td><strong>Total</strong></td>
					<td><strong><?php echo $fm->format_currency($subtotal+$ship);?>đ</strong></td>
				</tr>
			</table>
			<button class="normal" onclick="window.location.href='checkout.php'">Proceed to checkout</button>
		</div>
		<?php
			}else{
				echo "<span><strong>Không có sản phẩm nào trong giỏ hàng.</strong></span>";
			}  
		?>
	</section>

<?php include('inc/footer.php'); ?>
<?php include('inc/style.php'); ?>
