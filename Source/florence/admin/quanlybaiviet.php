<?php include('partials/header.php'); ?>
<?php include_once('../classes/blog.php'); ?>
<?php  
    $blog = new blog();
    $fm = new Format();
    if(isset($_GET['blogid'])){
        $id = $_GET['blogid'];
        $delblog = $blog->del_blog($id);
    }
?>
<!-- Phân Trang -->
<?php
  $show_blog = $blog->show_blog();  
  $totalrow = mysqli_num_rows($show_blog);
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
          <li class="nav-item menu-open">
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
                <a href="quanlybaiviet.php" class="nav-link active">
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
            <h1 class="m-0">Danh Sách Bài Viết</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
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
            <div id="example1_filter" class="dataTables_filter"><form action="timkiembaiviet.php" method="post"><label>Search:<input type="search" name="keyword" class="form-control form-control-sm" placeholder="Nhập nội dung cần tìm..." aria-controls="example1"></label></form></div>
          </div>

          <div class="card-body">
            <a class="float-right" href="thembaiviet.php"><button>Thêm bài viết mới</button></a><br>
            <table class="table table-bordered table-hover" style="margin-top: 20px;">
              <thead>
                <tr style="text-align: center;">
                  <th>STT</th>
                  <th>Tên bài viết</th>
                  <th>Ảnh</th>
                  <th>Danh mục</th>
                  <th>Tóm tắt</th>                      
                  <th>Trạng thái</th>
                  <th style="text-align: center;" colspan="2">Quản lý</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $bloglist = $blog->show_all_blog($start,$limit);
                  if($bloglist){
                    if($cr_page==1){
                  $i = 0;}else{
                    $i = ($cr_page-1)*10;
                  }
                  while ($result = $bloglist->fetch_assoc()){
                  $i++;
                ?>
                <tr style="text-align: center;">
                  <td><?php echo $i ?></td>
                  <td><?php echo $result['blogName'] ?></td>
                  <td><img style="width:100px;max-height:100px" src="uploads/<?php echo $result['image'] ?>"></td>
                  <td><?php echo $result['blogcatName'] ?></td>
                  <td style="text-align: left;"><?php echo $fm->textShorten($result['blog_desc'], 300)?></td>
                  <td>
                    <?php 
                      if($result['type']==1){
                        echo 'ON';
                          }else{
                        echo 'OFF';
                        }
                    ?>
                  </td>
                  <td>
                    <a href="suabaiviet.php?blogid=<?php echo $result['blogId']?>"><button class="btn btn-warning">Sửa</button></a> 
                  </td>
                  <td>  
                    <a href="?blogid=<?php echo $result['blogId']?>"><button class="btn btn-danger">Xóa</button></a>
                  </td>
                </tr>
               <?php 
                    }
                  }     
                ?>
              </tbody>
            </table>
            <br>
            <div class="row">
              <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                  Hiển thị <?php if ($cr_page == 1) { echo 1; } else { echo (($cr_page - 1) * 10) + 1; } ?> tới <?php echo $cr_page*10; ?> trên toàn bộ <?php echo $totalrow; ?> bài viết
                </div>
              </div>
              <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                  <ul class="pagination">
                    <?php if($cr_page-1>0){ ?>
                    <li class="page-item"><a class="page-link" href="quanlybaiviet.php?page=<?php echo $cr_page-1; ?>">Prev</a></li>
                    <?php }?>
                    <?php    
                    for ($i=1;$i<=$page;$i++){ 
                    ?>
                    <li class="paginate_button page-item  <?php echo ($cr_page ==$i)? 'active' : '' ?> ">
                      <a href="quanlybaiviet.php?page=<?php echo $i; ?>" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link"><?php echo $i; ?></a>
                    </li>
                    <?php
                    }
                    ?>
                    <?php if($cr_page+1<=$page){ ?>
                    <li class="paginate_button page-item next" id="example2_next">
                      <a href="quanlybaiviet.php?page=<?php echo $cr_page+1; ?>" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                    </li>
                    <?php }?>
                  </ul>
                </div>
              </div>
            </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include('partials/footer.php'); ?>