<?php include('inc/header.php'); ?>
<?php
    $login_check = Session::get('customer_login');
    if(!$login_check){
        header('Location: user.php');
    }
?>
    <title>Wishlist</title>
<?php include('inc/menu.php'); ?>
        <!-- Cart -->
        <?php include('inc/precart.php'); ?>
    </header>

    <!-- breadcrumb -->

    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
        <h2 class="ltext-105 cl0 txt-center">
            Your Wishlist
        </h2>
    </section>  

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php  
                    $customer_id =Session::get('customer_id');
                    if(isset($_GET['delid'])){
                        $id = $_GET['delid'];
                        $delWish = $product->del_wishlist($id);
                    }
                    $get_wishlist=$product->get_wishlist($customer_id);
                    if($get_wishlist){
                        $i = 0;
                        while($result = $get_wishlist->fetch_assoc()){
                            $i++;
                ?>
                <tr>
                    <td><?php echo $i;  ?></td>
                    <td><img src="admin/uploads/<?php echo $result['image']?>" alt=""></td>
                    <td><?php echo $result['productName']?></td>
                    <td><?php echo $fm->format_currency($result['price'])?>đ</td>
                    <td>
                        <strong><a href="sproduct.php?proid=<?php echo $result['productId']?>" class="btn-view">Xem sản phẩm</a></strong>
                         <span>|</span>

                        <strong><a onclick="return confirm('Bạn có muốn xóa sản phẩm khỏi danh sách yêu thích không?')" href="?delid=<?php echo $result['productId']?>" class="btn-del">Xóa</a></strong>
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>

        </table>
    </section>

    <section id="cart-add" class="section-p1">

    </section>

<?php include('inc/footer.php'); ?>
<?php include('inc/style.php'); ?>
<style type="text/css">
.btn-view {
    padding: 8px;
    color: #fff;
    background-color: black;
    border-color: #868e96;
}
.btn-del{
    padding: 8px;
    color: #fff;
    background-color: red;
}
</style>
