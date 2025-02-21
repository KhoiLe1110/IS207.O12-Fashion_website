<?php  
	include_once(dirname(__FILE__) .'/../lib/database.php');
	include_once(dirname(__FILE__) .'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class category
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_category($catName){
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);

			if(empty($catName)){
				$alert = "Không được để trống danh mục";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName) VALUE('$catName')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "Thêm danh mục thành công";
						return $alert;
				}else{
					$alert = "Thêm danh mục không thành công";
						return $alert;
				}
			}
		}
		// Show tất cả danh mục
		public function show_category(){
			$query = "SELECT * FROM tbl_category order by catId asc";
			$result = $this->db->select($query);
			return $result;
		}
		// Show tất cả danh mục nhưng phân theo trang
		public function show($start,$limit){
			$query = "SELECT * FROM tbl_category order by catId asc LIMIT $start,$limit";
			$result = $this->db->select($query);
			return $result;
		}
		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_category where catId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category($catName, $id){
			$catName = $this->fm->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName)){
				$alert = "Không được để trống danh mục";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName ='$catName' WHERE catId ='$id'";
				$result = $this->db->insert($query);
				if($result){
					$alert = "Cập nhật danh mục thành công";
					return $alert;
				}else{
					$alert = "Cập nhật danh mục chưa thành công";
					return $alert;
				}
			}
		}
		public function del_category($id){
			$query = "DELETE FROM tbl_category where catId ='$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "Xóa danh mục thành công";
					return $alert;
				}else{
					$alert = "Xóa danh mục chưa thành công";
					return $alert;
			}
		}
// FRONTEND
		public function show_category_frontend(){
			$query = "SELECT * FROM tbl_category order by catId asc";
			$result = $this->db->select($query);
			return $result;
		}
		// Show tất cả sản phẩm theo danh mục
		public function get_product_by_cat($id){
			$query = "SELECT * FROM tbl_product WHERE catId='$id' ORDER BY productId desc";
			$query1 = "SELECT * FROM tbl_product";
			if($id==0){
			$result = $this->db->select($query1);
			}else{
			$result = $this->db->select($query);
			}
			return $result;
		}
		// Show tất cả sản phẩm theo danh mục nhưng phân trang
		public function get_product_by_cat_page($id,$start,$limit){
			$query = "SELECT * FROM tbl_product WHERE catId='$id' ORDER BY productId desc LIMIT $start,$limit";
			$query1 = "SELECT * FROM tbl_product ORDER BY productId desc LIMIT $start,$limit";
			if($id==0){
			$result = $this->db->select($query1);
			}else{
			$result = $this->db->select($query);
			}
			return $result;
		}




	}
?>