<?php  
	include_once(dirname(__FILE__) .'/../lib/database.php');
	include_once(dirname(__FILE__) .'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class customer
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_customers($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));

			$check_name = "SELECT * FROM tbl_customer WHERE name= '$name' LIMIT 1";
			$check_email = "SELECT * FROM tbl_customer WHERE email= '$email' LIMIT 1";
			$check_phone = "SELECT * FROM tbl_customer WHERE phone= '$phone' LIMIT 1";
			$result_check_name = $this->db->select($check_name);
			$result_check_mail = $this->db->select($check_email);
			$result_check_phone = $this->db->select($check_phone);
			if(($result_check_mail) ||($result_check_phone)){
				$alert = "Email hoặc số điện thoại đã tồn tại.";
				return $alert;
			}elseif($result_check_name){
				$alert = "Username đã tồn tại.";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_customer(name, address, city, phone, email, password) VALUES('$name','$address','$city','$phone','$email','$password')";
				$result = $this->db->insert($query);
				$alert = "Đăng ký thành công. Vui lòng đăng nhập.";
				return $alert;
			}

		}
		public function insertComment(){
			$productid = $_POST['productid_comment'];
			$nameComment = $_POST['nameComment'];
			$emailComment = $_POST['emailComment'];
			$comment = $_POST['comment'];
			$query = "INSERT INTO tbl_comment(productId, nameComment, emailComment, comment, typeComment) VALUES ('$productid','$nameComment','$emailComment','$comment','0')";
			$result = $this->db->insert($query);
			$alert = "Bình luận đã gửi và đang chờ duyệt. Xin cảm ơn.";
			return $alert;
		}
		public function login_customers($data){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));

			$check_login = "SELECT * FROM tbl_customer WHERE name= '$name' and password ='$password'";
			$result_check = $this->db->select($check_login);
			if ($result_check != FALSE){
				$value = $result_check->fetch_assoc();
				Session::set('customer_login',true);
				Session::set('customer_id', $value['id']);
				Session::set('customer_name',$value['name']);
				Session::set('customer_email',$value['email']);
				header('Location: account.php');
			}else{
				$alert = "Thông tin đăng nhập không hợp lệ.";
				return $alert;
			}
		}

		public function show_customer($id){
			$query = "SELECT * FROM tbl_customer WHERE id= '$id' ";
			$result = $this->db->select($query);
			return $result;

		}
		public function get_allcustomer(){
			$query = "SELECT * FROM tbl_customer";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_all_page_customer($start,$limit){
			$query = "SELECT * FROM tbl_customer ORDER BY id asc LIMIT $start,$limit";
			$result = $this->db->select($query);
			return $result;
		}
		public function search_customer($keyword){
		    $keyword = $this->fm->validation($keyword); 
		    $query = "
		    SELECT * FROM tbl_customer 
		    WHERE name LIKE '%$keyword%' OR email LIKE '%$keyword%' OR phone LIKE '%$keyword%' OR address LIKE '%$keyword%'
		    ORDER BY id ASC";

		    $result = $this->db->select($query);
		    return $result;            
		}
		public function show_admin($id){
			$query = "SELECT * FROM tbl_admin WHERE adminId= '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
	
		public function update_customer($data,$id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			

			$query = "UPDATE tbl_customer SET name='$name', address='$address', email='$email', phone='$phone', city='$city' WHERE id='$id'";
			$result = $this->db->insert($query);
			if($result){
				$alert = "Cập nhật thông tin thành công.";
				return $alert;
			}else{
				$alert = "Cập nhật thông tin chưa thành công.";
				return $alert;
			}
		}
		public function update_admin($data,$id){
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$username = mysqli_real_escape_string($this->db->link, $data['username']);

			$query = "UPDATE tbl_admin SET adminName='$name', adminEmail='$email', adminUser='$username' WHERE adminId='$id'";
			$result = $this->db->insert($query);
			if($result){
				$alert = "Cập nhật thông tin thành công.";
				return $alert;
			}else{
				$alert = "Cập nhật thông tin chưa thành công.";
				return $alert;
			}
		}			

		
		public function show_order($id,$ordercode){
			$query = "SELECT * FROM tbl_order WHERE order_code= '$ordercode' ";
			$result = $this->db->select($query);
			return $result;

		}

		public function get_comment(){
			$query = "SELECT * FROM tbl_comment";
			$result = $this->db->select($query);
			return $result;
		}		

		public function getpage_comment($start,$limit){
			$query="
			SELECT tbl_comment.*, tbl_product.* 
			FROM tbl_comment INNER JOIN tbl_product ON tbl_comment.productId = tbl_product.productId ORDER BY date_created desc LIMIT $start,$limit ";
			$getpage_comment = $this->db->select($query);
			return $getpage_comment;			
		}
		public function search_comment($keyword){
			$keyword = $this->fm->validation($keyword); //kiểm tra từ khóa đã có chưa
			$query = "
			SELECT tbl_comment.*, tbl_product.* 
			FROM tbl_comment INNER JOIN tbl_product ON tbl_comment.productId = tbl_product.productId 
			WHERE productName LIKE '%$keyword%' OR comment LIKE '%$keyword%' OR emailComment LIKE '%$keyword%' OR nameComment LIKE '%$keyword%'
			ORDER BY date_created desc";
			$result = $this->db->select($query);
			return $result;			
		}
		public function update_type_comment($id,$type){
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_comment SET typeComment = '$type' WHERE idComment='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function delcomment($id){
			$query = "DELETE FROM tbl_comment where idComment ='$id'";
			$result = $this->db->delete($query);
		}
// FRONTEND
		// Show tất cả sản phẩm theo danh mục
		public function get_comment_by_product($id){
			$query = "SELECT * FROM tbl_comment WHERE productId='$id' AND typeComment='1' ORDER BY date_created desc";
			$result = $this->db->select($query);
			return $result;
		}



	}
?>