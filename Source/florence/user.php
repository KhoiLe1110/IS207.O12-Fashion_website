<?php include('inc/header.php'); ?>
<!-- Code check login nếu vào trang my account: nếu đã login: account.php, chưa login thì vẫn ở user.php -->
<?php
	$login_check = Session::get('customer_login');
	if($login_check){
		header('Location: account.php');
	}
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $insertCustomers = $cs->insert_customers($_POST);
    }  
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-log'])){

        $loginCustomers = $cs->login_customers($_POST);
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


	<section id="log-container">
        <form class="form-container" action="" method="post">
            <h4>Login</h4>
            <br>
			<?php
            if(isset($loginCustomers)){
            	echo $loginCustomers;
            	echo "<br><br>";
            }

            ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="name" placeholder="Enter username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" name="submit-log">Login</button>
        </form>

        <!-- Registration Form -->
        <form class="form-container" action="#" method="post">
            <h4>Register</h4>
            <br>
            <?php
            if(isset($insertCustomers)){
            	echo $insertCustomers;
            	echo "<br><br>";
            }

            ?>
            <label for="reg-username">Username</label>
            <input type="text" id="reg-username" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="reg-password">Password</label>
            <input type="password" id="reg-password" name="password" required>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" pattern="\d{10}" title="Vui lòng nhập 10 số" required>

            <label for="city">City</label>
           	<select id="city" name="city" required>
                <option value="an-giang">An Giang</option>
                <option value="ba-ria-vung-tau">Bà Rịa-Vũng Tàu</option>
                <option value="bac-giang">Bắc Giang</option>
                <option value="bac-kan">Bắc Kạn</option>
                <option value="bac-lieu">Bạc Liêu</option>
                <option value="bac-ninh">Bắc Ninh</option>
                <option value="ben-tre">Bến Tre</option>
                <option value="binh-dinh">Bình Định</option>
                <option value="binh-duong">Bình Dương</option>
                <option value="binh-phuoc">Bình Phước</option>
                <option value="binh-thuan">Bình Thuận</option>
                <option value="ca-mau">Cà Mau</option>
                <option value="cao-bang">Cao Bằng</option>
                <option value="dak-lak">Đắk Lắk</option>
                <option value="dak-nong">Đắk Nông</option>
                <option value="dien-bien">Điện Biên</option>
                <option value="dong-nai">Đồng Nai</option>
                <option value="dong-thap">Đồng Tháp</option>
                <option value="gia-lai">Gia Lai</option>
                <option value="ha-giang">Hà Giang</option>
                <option value="ha-nam">Hà Nam</option>
                <option value="ha-noi">Hà Nội</option>
                <option value="ha-tinh">Hà Tĩnh</option>
                <option value="hai-duong">Hải Dương</option>
                <option value="hai-phong">Hải Phòng</option>
                <option value="hau-giang">Hậu Giang</option>
                <option value="hoa-binh">Hòa Bình</option>
                <option value="hung-yen">Hưng Yên</option>
                <option value="khanh-hoa">Khánh Hòa</option>
                <option value="kien-giang">Kiên Giang</option>
                <option value="kon-tum">Kon Tum</option>
                <option value="lai-chau">Lai Châu</option>
                <option value="lam-dong">Lâm Đồng</option>
                <option value="lang-son">Lạng Sơn</option>
                <option value="lao-cai">Lào Cai</option>
                <option value="long-an">Long An</option>
                <option value="nam-dinh">Nam Định</option>
                <option value="nghe-an">Nghệ An</option>
                <option value="ninh-binh">Ninh Bình</option>
                <option value="ninh-thuan">Ninh Thuận</option>
                <option value="phu-tho">Phú Thọ</option>
                <option value="phu-yen">Phú Yên</option>
                <option value="quang-binh">Quảng Bình</option>
                <option value="quang-nam">Quảng Nam</option>
                <option value="quang-ngai">Quảng Ngãi</option>
                <option value="quang-ninh">Quảng Ninh</option>
                <option value="quang-tri">Quảng Trị</option>
                <option value="soc-trang">Sóc Trăng</option>
                <option value="son-la">Sơn La</option>
                <option value="tay-ninh">Tây Ninh</option>
                <option value="ho-chi-minh-city">TP.HCM</option>
                <option value="thai-binh">Thái Bình</option>
                <option value="thai-nguyen">Thái Nguyên</option>
                <option value="thanh-hoa">Thanh Hóa</option>
                <option value="thua-thien-hue">Thừa Thiên-Huế</option>
                <option value="tien-giang">Tiền Giang</option>
                <option value="tra-vinh">Trà Vinh</option>
                <option value="tuyen-quang">Tuyên Quang</option>
                <option value="vinh-long">Vĩnh Long</option>
                <option value="vinh-phuc">Vĩnh Phúc</option>
                <option value="yen-bai">Yên Bái</option>
            </select>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>

            <button type="submit" name="submit">Register</button>
        </form>
	</section>


<?php include('inc/footer.php'); ?>

<style type="text/css">
/*USER PAGE*/
#log-container {
  max-width: 1050px;
  margin: 0 auto;
  padding: 20px;
  display: flex;
  justify-content: space-between;
}
#log-container .form-container{
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%; /* Adjust the width as needed */
}

#log-container label {
  display: block;
  margin-bottom: 8px;
  font-weight: 600;
}

#log-container input {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

#log-container button {
  width: 100%;
  padding: 15px;
  color: #fff;
  background-color: black;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: 600;
  transition: background-color 0.3s ease;
}

#log-container button:hover {
  background-color: lightblack;
}

#log-container select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  appearance: none; /* Remove default arrow */
  background-image: linear-gradient(45deg, transparent 50%, #ccc 50%), linear-gradient(135deg, #ccc 50%, transparent 50%);
  background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) calc(1em + 2px);
  background-size: 5px 5px, 5px 5px;
  background-repeat: no-repeat;
  cursor: pointer;
}

#log-container option {
  padding: 10px;
  font-size: 14px;
  background-color: #fff;
  color: #333;
}

/*My Account Page*/
.normal-title{
    background-color: #f7f7f7;
    border-top: 1px solid #ececec;
    border-bottom: 1px solid #ececec;
}
#page-wrapper {
    padding-top: 30px;
    padding-bottom: 30px;
}
.container {
    padding-left: 15px;
    padding-right: 15px;
}
</style>