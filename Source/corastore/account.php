<?php include('inc/header.php'); ?>
<?php
	$login_check = Session::get('customer_login');
	if(!$login_check){
		header('Location: user.php');
	}
?>
<?php
    if(isset($_GET['action']) && $_GET['action']=='logoutc'){
       Session_destroy();
       header("Location:user.php");
    }  
?>
<?php
    $id = Session::get('customer_id');  
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $UpdateCustomer = $cs->update_customer($_POST,$id);
    } 
?>
	<title>My Account</title>
<?php include('inc/menu.php'); ?>

		<!-- PRECART -->
		<?php include('inc/precart.php'); ?>
	</header>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			My Account
		</h2>
	</section>	


	<!-- Content page -->
    <div class="container">
        <div class="row gutters">
            <?php
            $id = Session::get('customer_id');  
            $get_customer = $cs->show_customer($id);
            if($get_customer){
                while($result = $get_customer->fetch_assoc()){
            ?>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name"><?php echo $result['name'] ?></h5>
                                <h6 class="user-email"><?php echo $result['email'] ?></h6>
                                <br>
                                <a href="history-order.php">Theo Dõi Đơn Hàng</a>
                            </div>
                            <div class="about">
                                <button type="button" class="btn btn-danger" style="width: 50%; margin: 0 auto;">
                                   <a style="color:white;" href="?action=logoutc">Logout</a>
                                </button>
                            </div>                           
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <form action="" method="post" >
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="name" value="<?php echo $result['name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $result['email'] ?>" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $result['phone'] ?>"  pattern="\d{10}" title="Vui lòng nhập 10 số" required>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mt-3 mb-2 text-primary">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Street">Street</label>
                                    <input type="name" class="form-control" id="Street" name="address" value="<?php echo $result['address'] ?>" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="city">City</label>
                                        <select id="city" name="city">
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
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    
                                        <button type="submit" id="submit" name="update" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
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



<?php include('inc/footer.php'); ?>

<style type="text/css">

select {
    width: 100%;
    padding: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    appearance: none;
    background-image: linear-gradient(45deg, transparent 50%, #ccc 50%), linear-gradient(135deg, #ccc 50%, transparent 50%);
    background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) calc(1em + 2px);
    background-size: 5px 5px, 5px 5px;
    background-repeat: no-repeat;
    cursor: pointer;
}

.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}


</style>
