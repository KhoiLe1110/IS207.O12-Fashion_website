<?php include('partials/header.php'); ?>
<?php include_once('../classes/product.php'); ?>
<?php include_once('../classes/customer.php'); ?>
<?php include_once('../helpers/format.php'); ?>
<!-- Phân Trang -->
<?php
  $cs = new customer();
  $fm = new Format();
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $search_comment = $cs->search_comment($keyword);
  }
?>
<?php
    if(isset($_GET['delcomment'])){
    $id = $_GET['delcomment'];
    $delcomment = $cs->delcomment($id);
    }  
    if(isset($_GET['typeslide'])&&isset($_GET['type'])){
    $id = $_GET['typeslide'];
    $type = $_GET['type'];
    $update_type_slider = $cs->update_type_comment($id,$type);
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
            <a href="quanlybinhluan.php" class="nav-link active">
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
            <h1 class="m-0">Kết Quả Tìm Kiếm Bình Luận <strong><?php echo $keyword; ?></strong></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Review</li>
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
            <div id="example1_filter" class="dataTables_filter"><form action="timkiembinhluan.php" method="post"><label>Search:<input type="search" name="keyword" class="form-control form-control-sm" placeholder="Nhập nội dung cần tìm..." aria-controls="example1"></label></form></div>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover" style="margin-top: 20px;">
              <thead>
                <tr style="text-align: center;">
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Ảnh Sản Phẩm</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Nội Dung</th>
                  <th>Ngày</th>                      
                  <th style="text-align: center;" colspan="2">Quản lý</th>
                  </tr>
              </thead>
              <tbody>
                <?php  
                  $search_comment = $cs->search_comment($keyword);
                  if($search_comment){
                    $i = 0;
                    while($result=$search_comment->fetch_assoc()){
                      $i++;
                ?>
                <tr style="text-align: center;">
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $result['nameComment'];?></td>
                  <td><?php echo $result['emailComment'];?></td>
                  <td><img style="width:100px;max-height:100px" src="uploads/<?php echo $result['image'] ?>"></td>
                  <td><?php echo $result['productName'];?></td>
                  <td style="text-align: left;"><?php echo $result['comment'];?></td>
                  <td><?php echo $fm->formatDate($result['date_created']);?></td>
                  <td>
                    <?php  
                      if($result['typeComment']==1){
                    ?>
                    <a href="?typeslide=<?php echo $result['idComment'];?>&type=0"><button class="btn btn-warning">Ẩn</button></a>
                    <?php  
                    } else{
                    ?>
                    <a href="?typeslide=<?php echo $result['idComment'];?>&type=1"><button class="btn btn-success">Hiện</button></a>
                    <?php  
                    }
                    ?>
                  </td>
                  <td>  
                    <a href="?delcomment=<?php echo $result['idComment'];?>"><button class="btn btn-danger">Xóa</button></a>
                  </td>
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