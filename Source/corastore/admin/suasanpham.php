<?php include('partials/header.php'); ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/product.php'; ?>
<?php
    $pd = new product();
    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
    echo "<script>window.location='quanlysanpham.php'</script>";
  }else{
    $id = $_GET['productid'];
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $updateProduct = $pd->update_product($_POST,$_FILES,$id);
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-film"></i>
              <p>
                Quản lý sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="quanlysanpham.php" class="nav-link active">
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
            <h1 class="m-0">Sửa Sản Phẩm</h1>
            <br>
            <?php
              if (isset($updateProduct)) {
                 echo $updateProduct;
              }
            ?>
            <?php  
              $get_product_by_id = $pd->getproductbyId($id);
              if($get_product_by_id){
              while ($result_product = $get_product_by_id->fetch_assoc()) {
            ?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
          <a class="float-right" style="color: black;" href="../sproduct.php?proid=<?php echo $result_product['productId']  ?>"><button>Xem sản phẩm trên web</button></a>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin sản phẩm</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div><form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Tên sản phẩm</label>
                  <input type="text" name="productName" value="<?php echo $result_product['productName']?>" id="inputName" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputName">Số lượng tồn kho</label>
                  <input type="number"  name="productQuantity" value="<?php echo $result_product['productQuantity']?>" id="inputName" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Mô tả sản phẩm</label>
                  <textarea id="inputDescription" name="product_desc" class="form-control" rows="4"><?php echo $result_product['product_desc']?></textarea>
                </div>
                <div class="form-group">
                  <label>Danh mục</label>
                  <select id="select" name="category" value="<?php echo $result_product['productName']?>" class="form-control custom-select">
                    <option>---Chọn danh mục---</option>
                      <?php 
                        $cat = new category();
                        $catlist = $cat->show_category();

                        if($catlist){
                          while($result = $catlist->fetch_assoc()){
                        ?>
                    <option
                      <?php  
                        if($result['catId']==$result_product['catId']){ echo 'selected';}
                      ?>
                      value="<?php echo $result['catId'] ?>"><?php echo $result['catName']?>                             
                    </option>
                      <?php
                          }
                       }
                      ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="inputStatus">Loại sản phẩm</label>
                  <select id="select" name="type" class="form-control custom-select">
                    <option>---Chọn loại---</option>
                    <?php
                      if($result_product['type']==0){ 
                    ?>
                    <option selected value="0">Non-Featured</option>
                    <option value="1">Featured</option>
                    <?php  
                    }else{
                    ?>
                    <option selected value="1">Featured</option>
                    <option value="0">Non-Featured</option>
                    <?php  
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputName">Ảnh sản phẩm</label>
                  <br>
                  <img src="uploads/<?php echo $result_product['image'] ?>" width="150">
                  <input type="file" name="image"  class="form-control">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Giá sản phẩm</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputEstimatedBudget">Giá nhập sản phẩm</label>
                  <input type="number" name="pricenhap" value="<?php echo $result_product['pricenhap']?>" id="inputEstimatedBudget" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputSpentBudget">Giá bán sản phẩm</label>
                  <input type="number" name="price"  value="<?php echo $result_product['price']?>" id="inputSpentBudget" class="form-control">
                </div>
                <!--<div class="form-group">
                  <label for="inputEstimatedDuration">Chiết khấu</label>
                  <input type="number" id="inputEstimatedDuration" class="form-control">
                </div> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-secondary">
              <div class="card-header" style="background-color:#717fe0;">
                <h3 class="card-title">Chi tiết sản phẩm</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <textarea class="form-control" rows="5" name="product_longdesc" id="description"><?php echo $result_product['product_longdesc']?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="quanlysanpham.php" class="btn btn-primary float-left">Back</a>        
            <input type="submit" name="submit" value="Cập nhật" class="btn btn-success float-right">
          </div>
          <?php 
                  
              }
            }
          ?>
        </div></form>
    </section>
  </div>
  <br>
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