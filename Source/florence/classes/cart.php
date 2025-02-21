<?php  
	include_once(dirname(__FILE__) .'/../lib/database.php');
	include_once(dirname(__FILE__) .'/../helpers/format.php');
?>
<?php 
    include_once(dirname(__FILE__) .'/../carbon/autoload.php');
	use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
?>
<?php 
	/**
	 * 
	 */
	class cart
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		// public function add_to_cart($quantity, $id){

		// 	$quantity = $this->fm->validation($quantity);
		// 	$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		// 	$id = mysqli_real_escape_string($this->db->link, $id);
		// 	$sId = session_id();

		// 	$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		// 	$result = $this->db->select($query)->fetch_assoc();

		// 	$image = $result["image"];
		// 	$price = $result["price"];
		// 	$productName = $result["productName"];

		// 	$query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) VALUE('$id','$quantity','$sId','$image','$price','$productName')";
		// 	$insert_cart = $this->db->insert($query_insert);
		// 	if($result){
		// 		header('Location:cart.php');
		// 	}else{
		// 		header('Location:404.php');
		// 		}
		// }

		public function add_to_cart($quantity, $productStock, $id) {
	    	$quantity = $this->fm->validation($quantity);
	    	$quantity = mysqli_real_escape_string($this->db->link, $quantity);

	    	$productStock = $this->fm->validation($productStock);
	    	$productStock = mysqli_real_escape_string($this->db->link, $productStock);

	    	$id = mysqli_real_escape_string($this->db->link, $id);
	    	$sId = session_id();

	    	// Sử dụng prepared statement để tránh SQL Injection
	   		$query = "SELECT * FROM tbl_product WHERE productId = ?";
	    	$stmt = $this->db->link->prepare($query);
	    	$stmt->bind_param("s", $id);
	    	$stmt->execute();
	    	$result = $stmt->get_result();
	    
	    	if($result->num_rows > 0){
	        	$row = $result->fetch_assoc();
	        	$image = $row["image"];
	        	$price = $row["price"];
	        	$productName = $row["productName"];

	        	$checkcart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$sId' ";
 				$check_cart = $this->db->select($checkcart);
	        	if($check_cart){
	        		$msg = "Sản phẩm đã được thêm vào giỏ hàng";
	        		return $msg;
	        	}else{
		        	$query_insert = "INSERT INTO tbl_cart(productId, stock, quantity, sId, image, price, productName) VALUES(?, ?, ?, ?, ?, ?, ?)";
		        	$stmt_insert = $this->db->link->prepare($query_insert);
		        	$stmt_insert->bind_param("sssssss", $id, $productStock, $quantity, $sId, $image, $price, $productName);
		       		$insert_cart = $stmt_insert->execute();
			        if ($insert_cart){
			            header('Location:cart.php');
			        }else{
			            echo "Error: " . $stmt_insert->error;
			            // header('Location:404.php');
			        		}
		    			}
		    		}
		    else{
		        echo "Product not found";
		        // header('Location:404.php');
		    	}
		    $stmt->close();
		    $stmt_insert->close();
		
		}

		public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_quantity_cart($quantity, $cartId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
	    	$cartId = mysqli_real_escape_string($this->db->link, $cartId);
	    	$query = "UPDATE tbl_cart SET quantity ='$quantity' WHERE cartId ='$cartId'";
	    	$result = $this->db->update($query);
			return $result;
		}

		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$cartid' ";
			$result = $this->db->delete($query);
			if ($result) {
				header('Location:cart.php');
			}
		}

		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function del_all_cart(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId ='$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function insertOrder($customer_id){
		    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
		    $sId = session_id();
		    $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		    $get_product = $this->db->select($query);
		    $order_code = rand(0000,9999);
		    $customer_id = $customer_id;
		    $total_doanhthu = 0;
		    $total_soluong = 0;
		    $total_donhang = 0;
		    $total_profit = 0; 
		    				    
			$query_placed = "INSERT INTO tbl_placed(customer_id, order_code, status) VALUES('$customer_id', '$order_code', 0)";
			$insert_place = $this->db->insert($query_placed);

		    if ($get_product) {

		        while ($result = $get_product->fetch_assoc()) {
		            $productid = $result['productId'];
		            $productName = $result['productName'];
		            $quantity = $result['quantity'];
		            $price = $result['price'] * $quantity;
		            $image = $result['image'];
		            $customer_id = $customer_id;

		            // Lấy giá lợi nhuận từ tbl_product
		            $profit_query = "SELECT pricenhap FROM tbl_product WHERE productId = '$productid'";
		            $profit_result = $this->db->select($profit_query);
		            $profit_row = $profit_result->fetch_assoc();
		            $profit = $profit_row['pricenhap'];

		            // Tính giá trị lợi nhuận cho sản phẩm hiện tại
		            $product_profit = ($result['price'] - $profit) * $quantity;
		            $total_profit += $product_profit; // Cộng vào tổng lợi nhuận

		            $update_inventory_query = "UPDATE tbl_product SET productQuantity = productQuantity - '$quantity' WHERE productId = '$productid'";
		            $this->db->update($update_inventory_query);

		            $query_order = "INSERT INTO tbl_order(order_code, productId, productName, quantity, price, image, customer_id) VALUES('$order_code','$productid', '$productName', '$quantity', '$price', '$image', '$customer_id')";
		            $insert_order = $this->db->insert($query_order);

		            $total_doanhthu += $price;
		            $total_soluong += $quantity;
		        }

		        // Update tbl_thongke
		        $update_thongke_query = "INSERT INTO tbl_thongke (doanhthu, soluong, donhang, profit, date_thongke) 
		                                 VALUES ('$total_doanhthu', '$total_soluong', '1', '$total_profit', '$now')
		                                 ON DUPLICATE KEY UPDATE 
		                                     doanhthu = doanhthu + '$total_doanhthu', 
		                                     soluong = soluong + '$total_soluong', 
		                                     donhang = donhang + '1',
		                                     profit = profit + '$total_profit'";
		        $this->db->update($update_thongke_query);
		    }
		}

		public function get_thongke(){
			$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
			$query = "SELECT * FROM tbl_thongke WHERE date_thongke ='$now'";
			$get_thongke = $this->db->select($query);
			return $get_thongke;
		}
		public function get_inbox_cart(){
			$query = "SELECT * FROM tbl_placed,tbl_customer WHERE tbl_placed.customer_id=tbl_customer.id ORDER BY date_created";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}

		public function getpage_inbox_cart($start,$limit){
			$query = "SELECT * FROM tbl_placed,tbl_customer WHERE tbl_placed.customer_id=tbl_customer.id ORDER BY date_created desc LIMIT $start,$limit";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;			
		}
		public function get_inbox_cart_history($customer_id){
			$query = "SELECT * FROM tbl_placed,tbl_customer WHERE tbl_placed.customer_id=tbl_customer.id AND tbl_placed.customer_id = $customer_id ORDER BY date_created";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		public function search_cart($keyword){
			$keyword = $this->fm->validation($keyword); //kiểm tra từ khóa đã có chưa
			$query = "SELECT * FROM tbl_placed,tbl_customer WHERE tbl_placed.customer_id=tbl_customer.id AND (order_code LIKE '%$keyword%' OR name LIKE '%$keyword%' OR address LIKE '%$keyword%')";
			$result = $this->db->select($query);
			return $result;
		}
		public function getAmountPrice($customer_id){
			$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' AND date_order = now()";
			$get_price = $this->db->select($query);
			return $get_price;
		}

		public function get_cart_ordered($customer_id){
			$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function shifted($id) {
		    $id = mysqli_real_escape_string($this->db->link, $id);
		    $query = "UPDATE tbl_placed SET status = status+1 WHERE order_code = '$id'";
		    $result = $this->db->update($query);
		}
		




	}
?>