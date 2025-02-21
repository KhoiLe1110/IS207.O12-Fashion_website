<?php include('partials/header.php'); ?>
<?php include'../classes/category.php'; ?>
<?php
    $cat = new category();
    if(isset($_GET['delId'])){
    $id = $_GET['delId'];
    $delCat = $cat->del_category($id);
    }
?>
<!-- Phân Trang -->
<?php
  $show_cate = $cat->show_category();  
  $totalrow = mysqli_num_rows($show_cate);
  $limit = 10; //bao nhiêu phần tử trên 1 trang
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

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-briefcase"></i>
              <p>
                Quản lý danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="quanlydanhmuc.php" class="nav-link active">
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
            <h1 class="m-0">Danh Mục Sản Phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="text-align: center; width: 10px">#</th>
                        <th style="text-align: center;">Tên danh mục</th>
                        <th style="text-align: center; width: 45%" colspan="2">Quản lý</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                        $show = $cat->show($start,$limit);
                        if($show){
                          $i = 0;
                          while ($result = $show->fetch_assoc()){ 
                            $i++;
                      ?>
                      <tr style="text-align: center;">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['catName']; ?></td>
                        <td style="text-align: center;">
                          <button type="button" class="btn btn-warning" style="width: 50%; margin: 0 auto;"><a style="color: black;" style="text-decoration: none;" href="suadanhmuc.php?catid=<?php echo $result['catId']?>">Sửa</a></button>
                        </td>
                        <td style="text-align: center;">
                          <button type="button" class="btn btn-danger" style="width: 50%; margin: 0 auto;"><a style="color: white;" onclick="return confirm('Bạn có muốn xóa danh mục này không?')" href="?delId=<?php echo $result['catId']?>">Xóa</a></button>
                        </td>
                      </tr>
                      <?php 
                          } 
                        }
                      ?>
                    </tbody>
                  </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($cr_page-1>0){ ?>
                    <li class="page-item"><a class="page-link" href="quanlydanhmuc.php?page=<?php echo $cr_page-1; ?>">«</a></li>
                    <?php }?>
                    <?php    
                    for ($i=1;$i<=$page;$i++){ 
                    ?>
                    <li class="page-item <?php echo ($cr_page ==$i)? 'active' : '' ?> "><a class="page-link" href="quanlydanhmuc.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                    <?php if($cr_page+1<=$page){ ?>
                    <li class="page-item"><a class="page-link" href="quanlydanhmuc.php?page=<?php echo $cr_page+1; ?>">»</a></li>
                    <?php }?>
                  </ul>
                </div>
              </div>
              <!-- /.card -->

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('partials/footer.php'); ?>