<?php include('inc/header.php'); ?>
<?php require('mail/sendmail.php') ?>
<?php
	$login_check = Session::get('customer_login');
	if(!$login_check){
		header('Location: user.php');
	}
?>
<?php  
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$insertOrder = $ct->insertOrder($customer_id);
		$mail = new Mailer();
		$maildathang = Session::get('customer_email');
		$mail->dathangmail($maildathang);
		$delCart = $ct->del_all_cart();
		header('Location:success.php');
	}
?>
	<title>Check Out</title>
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
				Checkout
			</span>
		</div>
	</div>
		

	<section id="page-header" class="about-header">

		<h2>#Checkout</h2>

		<p>LEAVE A MESSAGE, We love to hear from you!</p>
	</section>



		<div class="container-fluid pt-5">
		        <div class="row px-xl-5">
			       	<?php
		            $id = Session::get('customer_id');  
		            $get_customer = $cs->show_customer($id);
		            if($get_customer){
		                while($result = $get_customer->fetch_assoc()){
		            ?>
		            <div class="col-lg-8">
		                <div class="mb-4">
		                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
		                    <p>Click vào <a href="account.php" style="color: #717fe0;">đây</a> để đổi thông tin nhận hàng.</p>
		                    <div class="row">
		                        <div class="col-md-6 form-group">
		                            <label>Tên</label>
		                            <input class="form-control" name="name" value="<?php echo $result['name'] ?>" readonly>
		                        </div>
		                        <div class="col-md-6 form-group">
		                            <label>E-mail</label>
		                            <input class="form-control" name="email" value="<?php echo $result['email'] ?>" readonly>
		                        </div>
		                        <div class="col-md-6 form-group">
		                            <label>Số điện thoại</label>
		                            <input class="form-control" name="phone" value="<?php echo $result['phone'] ?>" readonly>
		                        </div>
		                        <div class="col-md-6 form-group">
		                            <label>Tỉnh/Thành</label>
	                                    <select id="city" name="city" disabled style="color: black; padding: 8px;">
	                                            <option value="an-giang" <?php echo ($result['city'] == 'an-giang') ? 'selected' : ''; ?>>An Giang</option>
	                                            <option value="ba-ria-vung-tau" <?php echo ($result['city'] == 'ba-ria-vung-tau') ? 'selected' : ''; ?>>Bà Rịa-Vũng Tàu</option>
	                                            <option value="bac-giang" <?php echo ($result['city'] == 'bac-giang') ? 'selected' : ''; ?>>Bắc Giang</option>
	                                            <option value="bac-kan" <?php echo ($result['city'] == 'bac-kan') ? 'selected' : ''; ?>>Bắc Kạn</option>
	                                            <option value="bac-lieu" <?php echo ($result['city'] == 'bac-lieu') ? 'selected' : ''; ?>>Bạc Liêu</option>
	                                            <option value="bac-ninh" <?php echo ($result['city'] == 'bac-ninh') ? 'selected' : ''; ?>>Bắc Ninh</option>
	                                            <option value="ben-tre" <?php echo ($result['city'] == 'ben-tre') ? 'selected' : ''; ?>>Bến Tre</option>
	                                            <option value="binh-dinh" <?php echo ($result['city'] == 'binh-dinh') ? 'selected' : ''; ?>>Bình Định</option>
	                                            <option value="binh-duong" <?php echo ($result['city'] == 'binh-duong') ? 'selected' : ''; ?>>Bình Dương</option>
	                                            <option value="binh-phuoc" <?php echo ($result['city'] == 'binh-phuoc') ? 'selected' : ''; ?>>Bình Phước</option>
	                                            <option value="binh-thuan" <?php echo ($result['city'] == 'binh-thuan') ? 'selected' : ''; ?>>Bình Thuận</option>
	                                            <option value="ca-mau" <?php echo ($result['city'] == 'ca-mau') ? 'selected' : ''; ?>>Cà Mau</option>
	                                            <option value="cao-bang" <?php echo ($result['city'] == 'cao-bang') ? 'selected' : ''; ?>>Cao Bằng</option>
	                                            <option value="dak-lak" <?php echo ($result['city'] == 'dak-lak') ? 'selected' : ''; ?>>Đắk Lắk</option>
	                                            <option value="dak-nong" <?php echo ($result['city'] == 'dak-nong') ? 'selected' : ''; ?>>Đắk Nông</option>
	                                            <option value="dien-bien" <?php echo ($result['city'] == 'dien-bien') ? 'selected' : ''; ?>>Điện Biên</option>
	                                            <option value="dong-nai" <?php echo ($result['city'] == 'dong-nai') ? 'selected' : ''; ?>>Đồng Nai</option>
	                                            <option value="dong-thap" <?php echo ($result['city'] == 'dong-thap') ? 'selected' : ''; ?>>Đồng Tháp</option>
	                                            <option value="gia-lai" <?php echo ($result['city'] == 'gia-lai') ? 'selected' : ''; ?>>Gia Lai</option>
	                                            <option value="ha-giang" <?php echo ($result['city'] == 'ha-giang') ? 'selected' : ''; ?>>Hà Giang</option>
	                                            <option value="ha-nam" <?php echo ($result['city'] == 'ha-nam') ? 'selected' : ''; ?>>Hà Nam</option>
	                                            <option value="ha-noi" <?php echo ($result['city'] == 'ha-noi') ? 'selected' : ''; ?>>Hà Nội</option>
	                                            <option value="ha-tinh" <?php echo ($result['city'] == 'ha-tinh') ? 'selected' : ''; ?>>Hà Tĩnh</option>
	                                            <option value="hai-duong" <?php echo ($result['city'] == 'hai-duong') ? 'selected' : ''; ?>>Hải Dương</option>
	                                            <option value="hai-phong" <?php echo ($result['city'] == 'hai-phong') ? 'selected' : ''; ?>>Hải Phòng</option>
	                                            <option value="hau-giang" <?php echo ($result['city'] == 'hau-giang') ? 'selected' : ''; ?>>Hậu Giang</option>
	                                            <option value="hoa-binh" <?php echo ($result['city'] == 'hoa-binh') ? 'selected' : ''; ?>>Hòa Bình</option>
	                                            <option value="hung-yen" <?php echo ($result['city'] == 'hung-yen') ? 'selected' : ''; ?>>Hưng Yên</option>
	                                            <option value="khanh-hoa" <?php echo ($result['city'] == 'khanh-hoa') ? 'selected' : ''; ?>>Khánh Hòa</option>
	                                            <option value="kien-giang" <?php echo ($result['city'] == 'kien-giang') ? 'selected' : ''; ?>>Kiên Giang</option>
	                                            <option value="kon-tum" <?php echo ($result['city'] == 'kon-tum') ? 'selected' : ''; ?>>Kon Tum</option>
	                                            <option value="lai-chau" <?php echo ($result['city'] == 'lai-chau') ? 'selected' : ''; ?>>Lai Châu</option>
	                                            <option value="lam-dong" <?php echo ($result['city'] == 'lam-dong') ? 'selected' : ''; ?>>Lâm Đồng</option>
	                                            <option value="lang-son" <?php echo ($result['city'] == 'lang-son') ? 'selected' : ''; ?>>Lạng Sơn</option>
	                                            <option value="lao-cai" <?php echo ($result['city'] == 'lao-cai') ? 'selected' : ''; ?>>Lào Cai</option>
	                                            <option value="long-an" <?php echo ($result['city'] == 'long-an') ? 'selected' : ''; ?>>Long An</option>
	                                            <option value="nam-dinh" <?php echo ($result['city'] == 'nam-dinh') ? 'selected' : ''; ?>>Nam Định</option>
	                                            <option value="nghe-an" <?php echo ($result['city'] == 'nghe-an') ? 'selected' : ''; ?>>Nghệ An</option>
	                                            <option value="ninh-binh" <?php echo ($result['city'] == 'ninh-binh') ? 'selected' : ''; ?>>Ninh Bình</option>
	                                            <option value="ninh-thuan" <?php echo ($result['city'] == 'ninh-thuan') ? 'selected' : ''; ?>>Ninh Thuận</option>
	                                            <option value="phu-tho" <?php echo ($result['city'] == 'phu-tho') ? 'selected' : ''; ?>>Phú Thọ</option>
	                                            <option value="phu-yen" <?php echo ($result['city'] == 'phu-yen') ? 'selected' : ''; ?>>Phú Yên</option>
	                                            <option value="quang-binh" <?php echo ($result['city'] == 'quang-binh') ? 'selected' : ''; ?>>Quảng Bình</option>
	                                            <option value="quang-nam" <?php echo ($result['city'] == 'quang-nam') ? 'selected' : ''; ?>>Quảng Nam</option>
	                                            <option value="quang-ngai" <?php echo ($result['city'] == 'quang-ngai') ? 'selected' : ''; ?>>Quảng Ngãi</option>
	                                            <option value="quang-ninh" <?php echo ($result['city'] == 'quang-ninh') ? 'selected' : ''; ?>>Quảng Ninh</option>
	                                            <option value="quang-tri" <?php echo ($result['city'] == 'quang-tri') ? 'selected' : ''; ?>>Quảng Trị</option>
	                                            <option value="soc-trang" <?php echo ($result['city'] == 'soc-trang') ? 'selected' : ''; ?>>Sóc Trăng</option>
	                                            <option value="son-la" <?php echo ($result['city'] == 'son-la') ? 'selected' : ''; ?>>Sơn La</option>
	                                            <option value="tay-ninh" <?php echo ($result['city'] == 'tay-ninh') ? 'selected' : ''; ?>>Tây Ninh</option>
	                                            <option value="ho-chi-minh-city" <?php echo ($result['city'] == 'ho-chi-minh-city') ? 'selected' : ''; ?>>TP.HCM</option>
	                                            <option value="thai-binh" <?php echo ($result['city'] == 'thai-binh') ? 'selected' : ''; ?>>Thái Bình</option>
	                                            <option value="thai-nguyen" <?php echo ($result['city'] == 'thai-nguyen') ? 'selected' : ''; ?>>Thái Nguyên</option>
	                                            <option value="thanh-hoa" <?php echo ($result['city'] == 'thanh-hoa') ? 'selected' : ''; ?>>Thanh Hóa</option>
	                                            <option value="thua-thien-hue" <?php echo ($result['city'] == 'thua-thien-hue') ? 'selected' : ''; ?>>Thừa Thiên-Huế</option>
	                                            <option value="tien-giang" <?php echo ($result['city'] == 'tien-giang') ? 'selected' : ''; ?>>Tiền Giang</option>
	                                            <option value="tra-vinh" <?php echo ($result['city'] == 'tra-vinh') ? 'selected' : ''; ?>>Trà Vinh</option>
	                                            <option value="tuyen-quang" <?php echo ($result['city'] == 'tuyen-quang') ? 'selected' : ''; ?>>Tuyên Quang</option>
	                                            <option value="vinh-long" <?php echo ($result['city'] == 'vinh-long') ? 'selected' : ''; ?>>Vĩnh Long</option>
	                                            <option value="vinh-phuc" <?php echo ($result['city'] == 'vinh-phuc') ? 'selected' : ''; ?>>Vĩnh Phúc</option>
	                                            <option value="yen-bai" <?php echo ($result['city'] == 'yen-bai') ? 'selected' : ''; ?>>Yên Bái</option>
	                                    </select>	                            
		                        </div>
		                        <div class="col-md-6 form-group">
		                            <label>Địa chỉ nhận hàng</label>
		                            <input class="form-control" name="address" value="<?php echo $result['address'] ?>" readonly>
		                        </div>
		                        <br>
		                        <div class="col-md-12 form-group">
		                            <span>(*) Vui lòng kiểm tra lại thông tin nhận hàng trước khi đặt</span>
		                        </div>                     
		                    </div>
		                </div>
		            </div>
		            <?php  
		        		}
		        	}
		            ?>
		            <div class="col-lg-4">
		                <div class="card border-secondary mb-5">
		                    <div class="card-header bg-secondary border-0">
		                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
		                    </div>
		                    <div class="card-body">
		                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
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
		                        <div class="d-flex justify-content-between">
		                            <p><?php echo $result['productName'] ?> x <?php echo $result['quantity'] ?></p>
		                            <p>
		                            <?php 
									$total = $result['price']*$result['quantity'];
									echo $fm->format_currency($total); 
									?>đ
									</p>
		                        </div>
					           <?php
								$subtotal += $total;
										}	
									}
								?>
		                        <hr class="mt-0">
		                        <div class="d-flex justify-content-between mb-3 pt-1">
		                            <h6 class="font-weight-medium">Tạm tính</h6>
		                            <h6 class="font-weight-medium"><?php echo $fm->format_currency($subtotal) ?>đ</h6>
		                        </div>
		                        <div class="d-flex justify-content-between">
		                            <h6 class="font-weight-medium">Phí ship</h6>
		                            <h6 class="font-weight-medium"><?php echo $fm->format_currency($ship = 20000); ?>đ</h6>
		                        </div>
		                    </div>
		                    <div class="card-footer border-secondary bg-transparent">
		                        <div class="d-flex justify-content-between mt-2">
		                            <h5 class="font-weight-bold">Tổng cộng</h5>
		                            <h5 class="font-weight-bold"><?php echo $fm->format_currency($subtotal + $ship) ?>đ</h5>
		                        </div>
		                    </div>

		                </div>
		                <div class="card border-secondary mb-5">
		                    <div class="card-header bg-secondary border-0">
		                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
		                    </div>
		                    <div class="card-body">
		                        <div class="form-group" style="display: block;">
		                            <div class="custom-control custom-radio">
		                                <input type="radio" name="payment" id="directcheck" checked>
		                                <label style="margin-bottom: 0;" class="" for="directcheck">Thanh Toán Tiền Mặt (COD)</label>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="card-footer border-secondary bg-transparent">
		                        <a style="color:white;" href="?orderid=order"><button style="background-color:#717fe0;" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt Hàng</button></a>
		                    </div>
		                    <?php
								}else{
									echo "<span><strong>Không có sản phẩm nào trong giỏ hàng.</strong></span>";
								}  
							?>
		                </div>
		            </div>
		        </div>
		    </div>


<?php include('inc/footer.php'); ?>
<?php include('inc/style.php'); ?>
