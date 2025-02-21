<?php include('partials/header.php'); ?>
<?php include '../classes/blog.php'; ?>
<?php
  $blog = new blog();
  if(!isset($_GET['blogid']) || $_GET['blogid']==NULL){
    echo "<script>window.location='quanlybaiviet.php'</script>";
  }else{
    $id = $_GET['blogid'];
    }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $updateBlog = $blog->update_blog($_POST,$_FILES,$id);
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
            <h1 class="m-0">Sửa Bài Viết</h1>
            <br>
              <?php
                if (isset($updateBlog)) {
                   echo $updateBlog;
                }
              ?>
              <?php  
                $get_blog_by_id = $blog->getblogtbyId($id);
                if($get_blog_by_id){
                while ($result_blog = $get_blog_by_id->fetch_assoc()) {
              ?>
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
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header" style="background-color: black;">
                <h3 class="card-title">Thông tin bài viết</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Tiêu đề bài viết</label>
                  <input type="text" name="blogName" value="<?php echo $result_blog['blogName']?>" id="inputName" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Danh mục bài viết</label>
                  <select id="select" name="category" class="form-control custom-select">
                    <option>---Chọn danh mục---</option>
                    <?php 
                    $catlist = $blog->show_blogcategory();
                    if($catlist){
                      while($result = $catlist->fetch_assoc()){ 
                    ?>
                    <option
                      <?php  
                        if($result['blogcatId']==$result_blog['blogcatId']){ echo 'selected';}
                      ?>
                      value="<?php echo $result['blogcatId'] ?>"><?php echo $result['blogcatName']?>                             
                    </option>
                      <?php
                          }
                       }
                      ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Tóm tắt</label>
                  <textarea id="inputDescription" name="blog_desc" class="form-control" rows="4"><?php echo $result_blog['blog_desc']?></textarea>
                </div>
                <div class="form-group">
                  <label for="pwd">Nội Dung:</label>
                  <textarea class="form-control" rows="5" name="blog_content" id="description"><?php echo $result_blog['blog_content']?></textarea>
                </div>
                <div class="form-group">
                  <label for="inputName">Ảnh bài viết</label>
                  <br>
                  <img src="uploads/<?php echo $result_blog['image'] ?>" width="150">
                  <input type="file" name="image"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputStatus">Hiển thị/ Ẩn</label>
                  <select id="select" name="type" class="form-control custom-select">
                    <option>---Chọn loại---</option>
                    <?php
                      if($result_blog['type']==0){ 
                    ?>
                    <option selected value="0">Ẩn</option>
                    <option value="1">Hiện</option>
                    <?php  
                    }else{
                    ?>
                    <option selected value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                    <?php  
                    }
                    ?>                  
                  </select>
                </div>
              </div>
              <?php  
                }}
              ?>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="quanlybaiviet.php" class="btn btn-primary float-left">Back</a>  
            <input type="submit" name="submit" value="Cập Nhật" class="btn btn-success float-right">
          </div>
        </div></form>
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include('partials/footer.php'); ?>
<script type="text/javascript">
    $('#description').summernote({
    placeholder: 'Nhập nội dung dữ liệu',
    tabsize: 2,
    height: 300,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });
</script>