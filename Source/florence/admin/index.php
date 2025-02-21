<?php  
  require('../carbon/autoload.php');
  use Carbon\Carbon;
  use Carbon\CarbonInterval;
?>
<?php include('partials/header.php'); ?>
<?php include_once('../classes/product.php'); ?>
<?php include_once('../classes/category.php'); ?>
<?php include_once('../classes/cart.php'); ?>
<?php include_once('../classes/customer.php'); ?>
<?php include_once('../helpers/format.php'); ?>


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/florence-logo.png" alt="AdminLTELogo">
  </div>
<?php 
  $pd = new product();
  $ct = new cart();
  $cs = new customer();
  $fm = new Format();
  $get_inbox_cart = $ct->get_inbox_cart();
  $totalroworder = mysqli_num_rows($get_inbox_cart);
  $show_product = $pd->show_product();  
  $totalrowproduct = mysqli_num_rows($show_product);
  $get_allcustomer = $cs->get_allcustomer();
  $totalrowcustomer = mysqli_num_rows($get_allcustomer);
?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link active">
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
            <a href="quanlykhachhang.php" class="nav-link">
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totalroworder; ?></h3>

                <p>Đơn Hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="quanlydonhang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <?php  
                    $get_thongke = $ct->get_thongke();
                    if ($get_thongke) {
                      $result = $get_thongke->fetch_assoc();
                  ?>

                <h3><?php echo $fm->format_currency($result['profit']); ?><sup style="font-size: 20px">đ</sup></h3>
                <?php  
                }
                ?>
                <p>Lợi Nhuận Hôm Nay</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalrowcustomer; ?></h3>

                <p>Người Đăng Ký</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="quanlykhachhang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $totalrowproduct; ?></h3>

                <p>Sản Phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="quanlysanpham.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    <div class="grid_10">
      <div class="box ground first grid">
        <h2>Thống kê đơn hàng <?php echo Carbon::now()->timezone('Asia/Ho_Chi_Minh');?></h2>
        <div class="row">
<!--           <div class="col-md-3">
            Từ ngày: <input class="form-control" type="text" id="datepicker_from">
          </div>
          <div class="col-md-3">
            Tới ngày: <input class="form-control" type="text" id="datepicker_to">
          </div> -->
          <div class="col-md-3">
            Lọc theo: <span id="text-date"></span>
            <select class="form-control select-thongke">
              <option>Chọn</option>
              <option value="7ngay">Lọc theo 7 ngày</option>
              <option value="30ngay">Lọc theo 30 ngày</option>
              <option value="90ngay">Lọc theo 90 ngày</option>
              <option value="365ngay">Lọc theo 1 năm</option>
            </select>
          </div>
        </div>

      <div class="row">
        <div class="col-md-12">
          <div id="myfirstchart" style="height: 250px;"></div>
        </div>
      </div>

      </div>
    </div>



    </section>
    <!-- /.content -->
  </div>


<?php include('partials/footer.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
  $(function(){
    $("#datepicker_from").datepicker({
      dateFormat: 'yy/mm/dd',
      duration: "slow"
    });
    $("#datepicker_to").datepicker({
      dateFormat: 'yy/mm/dd',
      duration: "slow"
    });
  });
</script>
<script>
  $(document).ready(function(){
    day365();
    var chart = new Morris.Bar({
      element: 'myfirstchart',
      parseTime: false,
      xkey: 'date',
      ykeys: ['order', 'revenue', 'quantity','profit'],
      labels: ['Số đơn hàng', 'Doanh thu', 'Số lượng sản phẩm','LN']
    });

    $('.select-thongke').change(function(){
      var thoigian = $(this).val();
      var text = '';
      if(thoigian=='7ngay'){
        text = '7 ngày qua';
      } else if(thoigian=='30ngay'){
        text = '30 ngày qua';
      } else if(thoigian=='90ngay'){
        text = '90 ngày qua';
      } else if(thoigian=='365ngay'){
        text = '1 năm qua';
      }
      $('#text-date').text(text);
      $.ajax({
        url: '../ajax/thongke.php',
        type: 'post',
        dataType: "JSON",
        data:{thoigian:thoigian},
         success: function(data) 
        {
          chart.setData(data);
        }       
      });
    })

    function day365() {
      var text = '365 ngày qua';
      $('#text-date').text(text);
      $.ajax({
        url: "../ajax/thongke.php",
        method: "POST",
        dataType: "JSON",
        cache: false,
        success: function(data) 
        {
          chart.setData(data);
        }
      });
    }
  });
</script>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
