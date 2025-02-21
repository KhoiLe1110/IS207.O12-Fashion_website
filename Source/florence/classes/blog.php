<?php  
	include_once(dirname(__FILE__) .'/../lib/database.php');
	include_once(dirname(__FILE__) .'/../helpers/format.php');
?>
<?php 
	/**
	 * 
	 */
	class blog
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function insert_blogcategory($blogcatName){
			$blogcatName = $this->fm->validation($blogcatName);
			$blogcatName = mysqli_real_escape_string($this->db->link, $blogcatName);

			if(empty($blogcatName)){
				$alert = "Không được để trống danh mục";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_blogcat(blogcatName) VALUE('$blogcatName')";
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
		public function show_blogcategory(){
			$query = "SELECT * FROM tbl_blogcat order by blogcatId asc";
			$result = $this->db->select($query);
			return $result;
		}
		// Show tất cả danh mục nhưng phân theo trang
		public function blogcatshow($start,$limit){
			$query = "SELECT * FROM tbl_blogcat order by blogcatId asc LIMIT $start,$limit";
			$result = $this->db->select($query);
			return $result;
		}
		// Lấy danh mục bằng id danh mục
		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_blogcat where blogcatId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_category($blogcatName, $id){
			$blogcatName = $this->fm->validation($blogcatName);
			$blogcatName = mysqli_real_escape_string($this->db->link, $blogcatName);
			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($blogcatName)){
				$alert = "Không được để trống danh mục";
				return $alert;
			}else{
				$query = "UPDATE tbl_blogcat SET blogcatName ='$blogcatName' WHERE blogcatId ='$id'";
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
			$query = "DELETE FROM tbl_blogcat where blogcatId ='$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "Xóa danh mục thành công";
					return $alert;
				}else{
					$alert = "Xóa danh mục chưa thành công";
					return $alert;
			}
		}
		public function insert_blog($data,$files){

			$blogName = mysqli_real_escape_string($this->db->link, $data['blogName']);
			$blog_desc = mysqli_real_escape_string($this->db->link, $data['blog_desc']);
			$blog_content = mysqli_real_escape_string($this->db->link, $data['blog_content']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);			
			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($file_name ==""){
				$alert = "Các trường không được rỗng";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO tbl_blog(blogName, blog_desc, blog_content,blogcatId,type, image) VALUE('$blogName','$blog_desc', '$blog_content','$category','$type','$unique_image')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "Thêm bài viết thành công";
						return $alert;
				}else{
					$alert = "Thêm bài viết chưa thành công";
						return $alert;
				}
			}
		}
		public function show_blog(){
			$query = "
			SELECT tbl_blog.*, tbl_blogcat.blogcatName 
			FROM tbl_blog INNER JOIN tbl_blogcat ON tbl_blog.blogcatId = tbl_blogcat.blogcatId 
			ORDER BY blogId asc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_all_blog($start,$limit){
			$query = "
			SELECT tbl_blog.*, tbl_blogcat.blogcatName 
			FROM tbl_blog INNER JOIN tbl_blogcat ON tbl_blog.blogcatId = tbl_blogcat.blogcatId 
			ORDER BY blogId asc LIMIT $start,$limit";
			$result = $this->db->select($query);
			return $result;
		}
		public function search_blog($keyword){
			$keyword = $this->fm->validation($keyword); //kiểm tra từ khóa đã có chưa
			$query = "
			SELECT tbl_blog.*, tbl_blogcat.blogcatName 
			FROM tbl_blog INNER JOIN tbl_blogcat ON tbl_blog.blogcatId = tbl_blogcat.blogcatId 
			WHERE blogName LIKE '%$keyword%' OR blog_desc LIKE '%$keyword%' OR blog_content LIKE '%$keyword%' OR blogcatName LIKE '%$keyword%'
			ORDER BY blogId asc";
			$result = $this->db->select($query);
			return $result;
		}
		public function search_blog_page($keyword, $start, $limit) {
		    $keyword = $this->fm->validation($keyword); // kiểm tra từ khóa đã có chưa
		    $query = "
		        SELECT tbl_blog.*, tbl_blogcat.blogcatName 
		        FROM tbl_blog 
		        INNER JOIN tbl_blogcat ON tbl_blog.blogcatId = tbl_blogcat.blogcatId 
		        WHERE blogName LIKE '%$keyword%' OR blog_desc LIKE '%$keyword%' OR blog_content LIKE '%$keyword%' OR blogcatName LIKE '%$keyword%'
		        ORDER BY blogId ASC
		        LIMIT $start, $limit";
		    $result = $this->db->select($query);
		    return $result;
		}
		public function del_blog($id){
			$query = "DELETE FROM tbl_blog where blogId ='$id'";
			$result = $this->db->delete($query);
			if($result){
					$alert = "Xóa bài viết thành công";
					return $alert;
				}else{
					$alert = "Xóa bài viết chưa thành công";
					return $alert;
			}
		}
		public function getblogtbyId($id){
			$query = "SELECT * FROM tbl_blog where blogId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_blog($data, $file, $id){
			
			$blogName = mysqli_real_escape_string($this->db->link, $data['blogName']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$blog_desc = mysqli_real_escape_string($this->db->link, $data['blog_desc']);
			$blog_content = mysqli_real_escape_string($this->db->link, $data['blog_content']);
			$type = mysqli_real_escape_string($this->db->link, $data['type']);

			$permitted = array('jpg', 'jpeg', 'png', 'gif', 'avif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($blogName ==""|| $category =="" || $type ==""){
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
						$query = "UPDATE tbl_blog SET 

						blogName ='$blogName',
						blogcatId ='$category',
						blog_desc ='$blog_desc',
						blog_content ='$blog_content',
						type ='$type',
						image ='$unique_image'

						WHERE blogId ='$id'";
				}else{
					//Nếu người dùng không chọn ảnh
						$query = "UPDATE tbl_blog SET 

						blogName ='$blogName',
						blogcatId ='$category',
						blog_desc ='$blog_desc',
						blog_content ='$blog_content',
						type ='$type'

						WHERE blogId ='$id'";

				}
			}
				$result = $this->db->insert($query);
				if($result){
					$alert = "Cập nhật bài viết thành công";
					return $alert;
				}else{
					$alert = "Cập nhật bài viết chưa thành công";
					return $alert;
				}
		}
// FRONTEND
		public function show_category_frontend(){
			$query = "SELECT * FROM tbl_blogcat order by blogcatId asc";
			$result = $this->db->select($query);
			return $result;
		}
		// Show tất cả blog theo danh mục tin tức thêm WHERE blogcatId='5'trước AND
		public function get_blog_news(){
			$query = "SELECT * FROM tbl_blog WHERE type='1' ORDER BY blogId desc";
			$result = $this->db->select($query);
			return $result;
		}
		// Show tất cả blog theo danh mục tin tức nhưng phân trang
		public function get_blog_news_page($start,$limit){
			$query = "SELECT * FROM tbl_blog WHERE type='1' ORDER BY blogId desc LIMIT $start,$limit";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_details($id){
			$query = "
			SELECT tbl_blog.*, tbl_blogcat.blogcatName 
			FROM tbl_blog INNER JOIN tbl_blogcat ON tbl_blog.blogcatId = tbl_blogcat.blogcatId 
			WHERE tbl_blog.blogId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}




	}
?>