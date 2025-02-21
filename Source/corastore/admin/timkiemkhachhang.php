<?php include('partials/header.php'); ?>
<?php include_once('../classes/customer.php'); ?>
<?php include_once('../classes/cart.php'); ?>
<?php include_once('../helpers/format.php'); ?>
<!-- Phân Trang -->
<?php
  $ct = new cart();
  $cs = new customer();
  $fm = new Format();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $search_customer = $cs->search_customer($keyword);
  }
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
            <a href="quanlykhachhang.php" class="nav-link active">
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
            <h1 class="m-0">Kết Quả Tìm Kiếm Thành Viên <strong><?php echo $keyword; ?></strong></h1>
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
          <div class="card-header">
            <div id="example1_filter" class="dataTables_filter"><form action="timkiemkhachhang.php" method="post"><label>Search:<input type="search" name="keyword" class="form-control form-control-sm" placeholder="Nhập nội dung cần tìm..." aria-controls="example1"></label></form></div>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover" style="margin-top: 20px;">
              <thead>
                <tr style="text-align: center;">
                  <th>STT</th>
                  <th>Tên Người Dùng</th>
                  <th>Email</th>
                  <th>Số Điện Thoại</th>
                  <th>Địa Chỉ</th>  
                  <th>Loại</th>                      
                  <th style="text-align: center;">Quản lý</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $cs = new customer();  
                  $search_customer = $cs->search_customer($keyword);
                  if($search_customer){
                    $i=0;
                    while($result=$search_customer->fetch_assoc()){
                      $i++;
                ?>
                <tr style="text-align: center;">
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $result['name'];?></td>
                  <td><?php echo $result['email'];?></td>
                  <td><?php echo $result['phone'];?></td>
                  <td><?php echo $result['address'];?></td>
                  <td>
                  <?php 
                  $customer_id = $result['id'];
                  $get_inbox_cart = $ct->get_inbox_cart_history($customer_id);
                  if($get_inbox_cart){
                      echo "Khách hàng";
                  ?>
                  </td>                      
                  <td>  
                    <a href="quanlylichsukhachhang.php?id=<?php echo $result['id'];?>"><button class="">Đơn đặt hàng</button></a>
                  </td>
                  <?php                
                   }else{
                    echo "Người đăng ký";
                  ?>
                  </td>                      
                  <td>Chưa có đơn hàng</td>
                  <?php  
                  }
                  ?>
                </tr>
                <?php  
                  }
                }
                ?>

              </tbody>
            </table>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include('partials/footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#live_search").keyup(function(){
      var input = $(this).val();
      // alert(input);
      if(input != ""){
        $.ajax({
          url: "livesearch.php",
          method: "POST",
          data: {input: input},
          success: function(data){
            $('#searchresult').html(data);
          }
        });
      } else {
        $("#searchresult").css("display", "none");
      }
    });
  });
</script>