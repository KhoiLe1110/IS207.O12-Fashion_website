<?php include('partials/header.php'); ?>
<?php include_once('../classes/product.php'); ?>
<?php  
    $product = new product();
    if(isset($_GET['typeslide'])&&isset($_GET['type'])){
    $id = $_GET['typeslide'];
    $type = $_GET['type'];
    $update_type_slider = $product->update_type_slider($id,$type);
    }
?>
<?php
    if(isset($_GET['delslide'])){
    $id = $_GET['delslide'];
    $delSlide = $product->del_slider($id);
    }  
?>
<!-- Phân Trang -->
<?php
  $product = new product();
  $get_slider = $product->show_all_slider();  
  $totalrow = mysqli_num_rows($get_slider);
  $limit = 5; //bao nhiêu phần tử trên 1 trang
  $page = ceil($totalrow/$limit);
  $cr_page = (isset($_GET['page']) ? $_GET['page'] : 1);
  $start = ($cr_page-1)*$limit;
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
            <a href="quanlyslide.php" class="nav-link active">
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
            <h1 class="m-0">Quản lý Slide</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Slide</li>
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
            <a href="themslide.php"><button>Thêm slide</button></a>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover" style="margin-top: 20px;">
              <thead>
                <tr style="text-align: center;">
                  <th>STT</th>
                  <th>Tên slide</th>
                  <th>Ảnh</th>
                  <th>Type</th>
                  <th >Quản lý</th>
                  </tr>
              </thead>
              <tbody>
                <?php  
                $get_slider = $product->show_all_slide_page($start,$limit);
                if($get_slider){
                  if($cr_page==1){
                  $i = 0;}else{
                    $i = ($cr_page-1)*5;
                  }
                  while ($result_slider = $get_slider->fetch_assoc()) {
                    $i++;
                ?>
                <tr style="text-align: center;">
                  <td><?php echo $i; ?></td>
                  <td><?php echo $result_slider['sliderName'];?></td>
                  <td><img style="width:350px;max-height:220px" src="uploads/<?php echo $result_slider['slider_image'];?>"></td>
                  <td>
                    <?php  
                      if($result_slider['type']==1){
                    ?>
                    <a href="?typeslide=<?php echo $result_slider['sliderid'];?>&type=0"><button class="btn btn-warning">Tắt</button></a>
                    <?php  
                    } else{
                    ?>
                    <a href="?typeslide=<?php echo $result_slider['sliderid'];?>&type=1"><button class="btn btn-success">Bật</button></a>
                    <?php  
                    }
                    ?>
                  </td>
                  <td>  
                    <a href="?delslide=<?php echo $result_slider['sliderid'];?>"><button class="btn btn-danger">Xóa</button></a>
                  </td>
                </tr>
                <?php
                    }
                  }
                ?>

              </tbody>
            </table>
            <br>
          </div>
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              <?php if($cr_page-1>0){ ?>
              <li class="page-item"><a class="page-link" href="quanlyslide.php?page=<?php echo $cr_page-1; ?>">«</a></li>
              <?php }?>
              <?php    
              for ($i=1;$i<=$page;$i++){ 
              ?>
              <li class="page-item <?php echo ($cr_page ==$i)? 'active' : '' ?> "><a class="page-link" href="quanlyslide.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
              <?php
              }
              ?>
              <?php if($cr_page+1<=$page){ ?>
              <li class="page-item"><a class="page-link" href="quanlyslide.php?page=<?php echo $cr_page+1; ?>">»</a></li>
              <?php }?>
              </ul>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include('partials/footer.php'); ?>