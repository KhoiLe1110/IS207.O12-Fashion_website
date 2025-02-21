<?php  
	include_once(dirname(__FILE__) .'/../lib/database.php');
	include_once(dirname(__FILE__) .'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class product
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_product($data,$files){

			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$product_longdesc = mysqli_real_escape_string($this->db->link, $data['product_longdesc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$pricenhap = mysqli_real_escape_string($this->db->link, $data['pricenhap']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($productName ==""|| $category =="" || $product_desc ==""|| $price =="" || $pricenhap=="" || $type =="" || $file_name ==""){
				$alert = "Các trường không được rỗng";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_product(productName, productQuantity, catId,product_desc,product_longdesc,price,type,pricenhap, image) VALUE('$productName','$productQuantity', '$category','$product_desc','$product_longdesc','$price','$type','$pricenhap','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "Thêm sản phẩm thành công";
						return $alert;
				}else{
					$alert = "Thêm sản phẩm chưa thành công";
						return $alert;
				}
			}
		}
		public function show_product(){
			$query = "
			SELECT tbl_product.*, tbl_category.catName 
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
			ORDER BY productId asc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_all_product($start,$limit){
			$query = "
			SELECT tbl_product.*, tbl_category.catName 
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
			ORDER BY productId desc LIMIT $start,$limit";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductbyId($id){
			$query = "SELECT * FROM tbl_product where productId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_product($data, $file, $id){
			
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
			$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
			$product_longdesc = mysqli_real_escape_string($this->db->link, $data['product_longdesc']);
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$pricenhap = mysqli_real_escape_string($this->db->link, $data['pricenhap']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif', 'avif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($productName ==""|| $category =="" || $product_desc ==""|| $price =="" || $pricenhap =="" || $type ==""){
				$alert = "Các trường không được rỗng";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if($file_size>1024000)
						{
							$alert = "Image size should be less than 2MB!";
							return $alert;
						}
					elseif(in_array($file_ext, $permitted)===false)
						{
							// echo "You can upload only: - ".implode(',',$permitted)."";
							$alert = "Không hỗ trợ file định dạng này";
							return $alert;
						}
						move_uploaded_file($file_temp,$uploaded_image);
						$query = "UPDATE tbl_product SET 

						productName ='$productName',
						productQuantity ='$productQuantity',
						catId ='$category',
						product_desc ='$product_desc',
						product_longdesc ='$product_longdesc',
						type ='$type',
						price ='$price',
						pricenhap ='$pricenhap',
						image ='$unique_image'

						WHERE productId ='$id'";
				}else{
					//Nếu người dùng không chọn ảnh
						$query = "UPDATE tbl_product SET 

						productName ='$productName',
						productQuantity ='$productQuantity',
						catId ='$category',
						product_desc ='$product_desc',
						product_longdesc ='$product_longdesc',
						type ='$type',
						pricenhap ='$pricenhap',
						price ='$price'

						WHERE productId ='$id'";

				}
			}
				$result = $this->db->insert($query);
				if($result){
					$alert = "Cập nhật sản phẩm thành công";
					return $alert;
				}else{
					$alert = "Cập nhật sản phẩm chưa thành công";
					return $alert;
				}
		}
		public function del_product($id){
			$query = "DELETE FROM tbl_product where productId ='$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "Xóa sản phẩm thành công";
					return $alert;
				}else{
					$alert = "Xóa sản phẩm chưa thành công";
					return $alert;
			}
		}

		public function insert_slider($data,$files){

			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($sliderName ==""|| $type =="" || $file_name ==""){
				$alert = "Các trường không được rỗng";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_slider(sliderName, type, slider_image) VALUE('$sliderName','$type','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "Thêm slide thành công.";
						return $alert;
				}else{
					$alert = "Thêm slide chưa thành công.";
						return $alert;
				}
			}
		}
		public function show_slider(){
			$query = "SELECT * FROM tbl_slider WHERE type=1 ORDER BY sliderId asc";

			$result = $this->db->select($query);
			return $result;
		}
		public function show_all_slider(){
			$query = "SELECT * FROM tbl_slider ORDER BY sliderId asc";

			$result = $this->db->select($query);
			return $result;
		}
		public function show_all_slide_page($start,$limit){
			$query = "SELECT * FROM tbl_slider ORDER BY sliderId asc LIMIT $start,$limit";

			$result = $this->db->select($query);
			return $result;			
		}
		public function update_type_slider($id,$type){
			$type = mysqli_real_escape_string($this->db->link, $type);
			$query = "UPDATE tbl_slider SET type = '$type' WHERE sliderId='$id'";
			$result = $this->db->update($query);
			return $result;
		}
		public function del_slider($id){
			$query = "DELETE FROM tbl_slider where sliderid ='$id'";
			$result = $this->db->delete($query);
		}
	//END BACKEND

		// public function getproduct_featured(){
		// 	$query = "SELECT * FROM tbl_product where type ='1'";
		// 	$result = $this->db->select($query);
		// 	return $result;			
		// }

		public function getproduct_featured(){
			$query = "
			SELECT tbl_product.*, tbl_category.catName 
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
			WHERE type ='1' ORDER BY productId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function getallproduct_featured(){
			$query = "
			SELECT tbl_product.*, tbl_category.catName 
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
			WHERE type ='1' ORDER BY productId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getproduct_new(){
			$query = "SELECT *, tbl_category.catName
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
			ORDER BY productId desc LIMIT 8 ";
			$result = $this->db->select($query);
			return $result;			
		}
		public function getproduct_all(){
			$query = "SELECT *, tbl_category.catName FROM tbl_product INNER JOIN tbl_category 
			ON tbl_product.catId = tbl_category.catId
			ORDER BY productId desc";
			$result = $this->db->select($query);
			return $result;			
		}
		public function get_details($id){
			$query = "
			SELECT tbl_product.*, tbl_category.catName 
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
			WHERE tbl_product.productId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function insertWishlist($productid, $customer_id){
			$productid = mysqli_real_escape_string($this->db->link, $productid);
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);

			$check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id = '$customer_id' ";
			$result_check_wlist = $this->db->select($check_wlist);

			if($result_check_wlist){
				$msg = "Sản phẩm đã có trong danh sách yêu thích";
				return $msg;
			}else{
				$query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
				$result = $this->db->select($query)->fetch_assoc();

				$productName = $result["productName"];
				$price = $result["price"];
				$image = $result["image"];

				$query_insert = "INSERT INTO tbl_wishlist(productId, price, image, customer_id, productName) VALUES ('$productid','$price','$image','$customer_id','$productName')";
				$insert_wlist = $this->db->insert($query_insert);
				$msg = "Đã thêm sản phẩm vào danh sách yêu thích.";
				return $msg;
			}
		}

		public function get_wishlist($customer_id){
			$query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' ORDER BY productId asc";
			$result = $this->db->select($query);
			return $result;
		}

		public function del_wishlist($id){
			$query = "DELETE FROM tbl_wishlist where productId ='$id'";
			$result = $this->db->delete($query);
		}

		public function search_product($keyword){
			$keyword = $this->fm->validation($keyword); //kiểm tra từ khóa đã có chưa
			$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$keyword%'";
			$result = $this->db->select($query);
			return $result;
		}

		public function search_productcat($keyword){
			$keyword = $this->fm->validation($keyword); //kiểm tra từ khóa đã có chưa
			$query = "
			SELECT tbl_product.*, tbl_category.catName 
			FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
			WHERE productName LIKE '%$keyword%' OR catName LIKE '%$keyword%'";
			$result = $this->db->select($query);
			return $result;
		}



	}
?>