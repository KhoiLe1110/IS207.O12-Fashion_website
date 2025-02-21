<?php include('partials/header.php'); ?>
<?php include_once('../classes/customer.php'); ?>
<?php include_once('../classes/cart.php'); ?>
<?php include_once('../helpers/format.php'); ?>
<!-- Phân Trang -->
<?php
  $ct = new cart();
  $cs = new customer();
  $fm = new Format();
  if (isset($_GET['id'])) {
  $customer_id =  $_GET['id'];}
?>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-briefcase"></i>
              <p>
                Quản lý danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="quanlydanhmuc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themdanhmuc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-film"></i>
              <p>
                Quản lý sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="quanlysanpham.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="themsanpham.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="quanlydonhang.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-truck"></i>
              <p>
                Quản lý đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="quanlyslide.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-layer-group"></i>
              <p>
                Quản lý slide
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-solid fa-book"></i>
              <p>
                Quản lý bài viết
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="quanlydanhmucbaiviet.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="quanlybaiviet.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bài viết</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="quanlybinhluan.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-envelope"></i>
              <p>
                Quản lý bình luận
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Quản lý thành viên
              </p>
            </a>
          </li>

          <li class="nav-header">ADMIN</li>
          <li class="nav-item">
            <a href="option.php" class="nav-link">
              <i class="nav-icon fas fa-solid fa-bomb"></i>
              <p>Option</p>
            </a>
          </li>
    <?php include('partials/side.php'); ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php 
            $get_inbox_cart = $ct->get_inbox_cart_history($customer_id);
            if($get_inbox_cart){
                $result_customer = $get_inbox_cart->fetch_assoc();
            ?>
                <h1 class="m-0">Danh Sách Đơn Hàng Đã Đặt Của <strong><?php echo $result_customer['name']; ?></strong></h1>
            <?php  
            }
            ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">

          <div class="card-body">
            <table class="table table-bordered table-hover" style="margin-top: 20px;">
              <thead>
                <tr style="text-align: center;">
                  <th>STT</th>
                  <th>Mã Đơn</th>
                  <th>Thời Gian Đặt Hàng</th>
                  <th>Tổng Giá Trị Đơn</th>
                  <th>Tình Trạng</th>                      
                  <th style="text-align: center;">Quản lý</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                    $get_inbox_cart = $ct->get_inbox_cart_history($customer_id);
                    if($get_inbox_cart){
                      $all = 0;
                      $i = 0;
                      while($result=$get_inbox_cart->fetch_assoc()){
                        $i++;
                ?>
                <tr style="text-align: center;">
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $result['order_code'];?></td>
                  <td><?php echo $result['date_created'];?></td>
                  <td>
                    <?php
                      $id  =  $_GET['id'];
                      $ordercode = $result['order_code'];
                      $get_order = $cs->show_order($id,$ordercode);
                      if($get_order){
                        $subtotal = 0;
                        $total = 0;
                        while($resultmoney=$get_order->fetch_assoc()){
                          $subtotal=$resultmoney['price']/$resultmoney['quantity'];                      
                          $total += $resultmoney['price'];
                      }
                      echo $fm->format_currency($total);
                      $all += $total;
                    }
                    ?>đ
                  </td>
                  <td>
                    <?php  
                      if($result['status'] ==0){
                        echo "Chờ xác nhận";}
                      elseif($result['status']==1){
                        echo "Đang giao hàng";
                      }
                      else{
                        echo "Đã giao";
                      }
                    ?>
                    </td>                  
                  <td>  
                    <a href="chitietdonhang.php?customerid=<?php echo $result['customer_id'];?>&ordercode=<?php echo $result['order_code'];?>"><button class="">Xem đơn hàng</button></a>
                  </td>
                </tr>
                <?php  
                  }
                }
                ?>
              </tbody>
            </table>
            <br>
            <div><strong>Tổng giá trị đơn đã đặt: <?php echo $fm->format_currency($all); ?>đ</strong></div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include('partials/footer.php'); ?>