<?php include('partials/header.php'); ?>
<?php include_once('../classes/cart.php'); ?>
<?php include_once('../classes/customer.php'); ?>
<?php include_once('../helpers/format.php'); ?>
<?php  
  if(!isset($_GET['customerid']) || $_GET['customerid']==NULL){
    echo "<script>window.location='quanlydonhang.php'</script>";
  }else{
    $id = $_GET['customerid'];
    $ordercode = $_GET['ordercode'];
  }
  $cs = new customer();
  $fm = new Format();

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
            <a href="quanlydonhang.php" class="nav-link active">
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
            <h1 class="m-0">Chi Tiết Đơn Hàng #<?php echo $ordercode; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Thông tin khách hàng</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <?php  
                $get_customer= $cs->show_customer($id);
                if($get_customer){
                  while($result=$get_customer->fetch_assoc()){
                ?>
                <div class="form-group">
                  <label for="inputEstimatedBudget">Tên khách hàng</label>
                  <input name="name" id="inputEstimatedBudget" value="<?php echo $result['name'] ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label for="inputSpentBudget">Email</label>
                  <input name="email" id="inputSpentBudget"  value="<?php echo $result['email'] ?>" readonly class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputEstimatedDuration">SĐT</label>
                  <input name="phone" id="inputEstimatedDuration"  value="<?php echo $result['phone'] ?>" readonly class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputEstimatedDuration">Tỉnh/Thành</label>
                    <select id="city" name="city" disabled style="color: black; padding: 8px;">
                                              <option value="an-giang" <?php echo ($result['city'] == 'an-giang') ? 'selected' : ''; ?>>An Giang</option>
                                              <option value="ba-ria-vung-tau" <?php echo ($result['city'] == 'ba-ria-vung-tau') ? 'selected' : ''; ?>>Bà Rịa-Vũng Tàu</option>
                                              <option value="bac-giang" <?php echo ($result['city'] == 'bac-giang') ? 'selected' : ''; ?>>Bắc Giang</option>
                                              <option value="bac-kan" <?php echo ($result['city'] == 'bac-kan') ? 'selected' : ''; ?>>Bắc Kạn</option>
                                              <option value="bac-lieu" <?php echo ($result['city'] == 'bac-lieu') ? 'selected' : ''; ?>>Bạc Liêu</option>
                                              <option value="bac-ninh" <?php echo ($result['city'] == 'bac-ninh') ? 'selected' : ''; ?>>Bắc Ninh</option>
                                              <option value="ben-tre" <?php echo ($result['city'] == 'ben-tre') ? 'selected' : ''; ?>>Bến Tre</option>
                                              <option value="binh-dinh" <?php echo ($result['city'] == 'binh-dinh') ? 'selected' : ''; ?>>Bình Định</option>
                                              <option value="binh-duong" <?php echo ($result['city'] == 'binh-duong') ? 'selected' : ''; ?>>Bình Dương</option>
                                              <option value="binh-phuoc" <?php echo ($result['city'] == 'binh-phuoc') ? 'selected' : ''; ?>>Bình Phước</option>
                                              <option value="binh-thuan" <?php echo ($result['city'] == 'binh-thuan') ? 'selected' : ''; ?>>Bình Thuận</option>
                                              <option value="ca-mau" <?php echo ($result['city'] == 'ca-mau') ? 'selected' : ''; ?>>Cà Mau</option>
                                              <option value="cao-bang" <?php echo ($result['city'] == 'cao-bang') ? 'selected' : ''; ?>>Cao Bằng</option>
                                              <option value="dak-lak" <?php echo ($result['city'] == 'dak-lak') ? 'selected' : ''; ?>>Đắk Lắk</option>
                                              <option value="dak-nong" <?php echo ($result['city'] == 'dak-nong') ? 'selected' : ''; ?>>Đắk Nông</option>
                                              <option value="dien-bien" <?php echo ($result['city'] == 'dien-bien') ? 'selected' : ''; ?>>Điện Biên</option>
                                              <option value="dong-nai" <?php echo ($result['city'] == 'dong-nai') ? 'selected' : ''; ?>>Đồng Nai</option>
                                              <option value="dong-thap" <?php echo ($result['city'] == 'dong-thap') ? 'selected' : ''; ?>>Đồng Tháp</option>
                                              <option value="gia-lai" <?php echo ($result['city'] == 'gia-lai') ? 'selected' : ''; ?>>Gia Lai</option>
                                              <option value="ha-giang" <?php echo ($result['city'] == 'ha-giang') ? 'selected' : ''; ?>>Hà Giang</option>
                                              <option value="ha-nam" <?php echo ($result['city'] == 'ha-nam') ? 'selected' : ''; ?>>Hà Nam</option>
                                              <option value="ha-noi" <?php echo ($result['city'] == 'ha-noi') ? 'selected' : ''; ?>>Hà Nội</option>
                                              <option value="ha-tinh" <?php echo ($result['city'] == 'ha-tinh') ? 'selected' : ''; ?>>Hà Tĩnh</option>
                                              <option value="hai-duong" <?php echo ($result['city'] == 'hai-duong') ? 'selected' : ''; ?>>Hải Dương</option>
                                              <option value="hai-phong" <?php echo ($result['city'] == 'hai-phong') ? 'selected' : ''; ?>>Hải Phòng</option>
                                              <option value="hau-giang" <?php echo ($result['city'] == 'hau-giang') ? 'selected' : ''; ?>>Hậu Giang</option>
                                              <option value="hoa-binh" <?php echo ($result['city'] == 'hoa-binh') ? 'selected' : ''; ?>>Hòa Bình</option>
                                              <option value="hung-yen" <?php echo ($result['city'] == 'hung-yen') ? 'selected' : ''; ?>>Hưng Yên</option>
                                              <option value="khanh-hoa" <?php echo ($result['city'] == 'khanh-hoa') ? 'selected' : ''; ?>>Khánh Hòa</option>
                                              <option value="kien-giang" <?php echo ($result['city'] == 'kien-giang') ? 'selected' : ''; ?>>Kiên Giang</option>
                                              <option value="kon-tum" <?php echo ($result['city'] == 'kon-tum') ? 'selected' : ''; ?>>Kon Tum</option>
                                              <option value="lai-chau" <?php echo ($result['city'] == 'lai-chau') ? 'selected' : ''; ?>>Lai Châu</option>
                                              <option value="lam-dong" <?php echo ($result['city'] == 'lam-dong') ? 'selected' : ''; ?>>Lâm Đồng</option>
                                              <option value="lang-son" <?php echo ($result['city'] == 'lang-son') ? 'selected' : ''; ?>>Lạng Sơn</option>
                                              <option value="lao-cai" <?php echo ($result['city'] == 'lao-cai') ? 'selected' : ''; ?>>Lào Cai</option>
                                              <option value="long-an" <?php echo ($result['city'] == 'long-an') ? 'selected' : ''; ?>>Long An</option>
                                              <option value="nam-dinh" <?php echo ($result['city'] == 'nam-dinh') ? 'selected' : ''; ?>>Nam Định</option>
                                              <option value="nghe-an" <?php echo ($result['city'] == 'nghe-an') ? 'selected' : ''; ?>>Nghệ An</option>
                                              <option value="ninh-binh" <?php echo ($result['city'] == 'ninh-binh') ? 'selected' : ''; ?>>Ninh Bình</option>
                                              <option value="ninh-thuan" <?php echo ($result['city'] == 'ninh-thuan') ? 'selected' : ''; ?>>Ninh Thuận</option>
                                              <option value="phu-tho" <?php echo ($result['city'] == 'phu-tho') ? 'selected' : ''; ?>>Phú Thọ</option>
                                              <option value="phu-yen" <?php echo ($result['city'] == 'phu-yen') ? 'selected' : ''; ?>>Phú Yên</option>
                                              <option value="quang-binh" <?php echo ($result['city'] == 'quang-binh') ? 'selected' : ''; ?>>Quảng Bình</option>
                                              <option value="quang-nam" <?php echo ($result['city'] == 'quang-nam') ? 'selected' : ''; ?>>Quảng Nam</option>
                                              <option value="quang-ngai" <?php echo ($result['city'] == 'quang-ngai') ? 'selected' : ''; ?>>Quảng Ngãi</option>
                                              <option value="quang-ninh" <?php echo ($result['city'] == 'quang-ninh') ? 'selected' : ''; ?>>Quảng Ninh</option>
                                              <option value="quang-tri" <?php echo ($result['city'] == 'quang-tri') ? 'selected' : ''; ?>>Quảng Trị</option>
                                              <option value="soc-trang" <?php echo ($result['city'] == 'soc-trang') ? 'selected' : ''; ?>>Sóc Trăng</option>
                                              <option value="son-la" <?php echo ($result['city'] == 'son-la') ? 'selected' : ''; ?>>Sơn La</option>
                                              <option value="tay-ninh" <?php echo ($result['city'] == 'tay-ninh') ? 'selected' : ''; ?>>Tây Ninh</option>
                                              <option value="ho-chi-minh-city" <?php echo ($result['city'] == 'ho-chi-minh-city') ? 'selected' : ''; ?>>TP.HCM</option>
                                              <option value="thai-binh" <?php echo ($result['city'] == 'thai-binh') ? 'selected' : ''; ?>>Thái Bình</option>
                                              <option value="thai-nguyen" <?php echo ($result['city'] == 'thai-nguyen') ? 'selected' : ''; ?>>Thái Nguyên</option>
                                              <option value="thanh-hoa" <?php echo ($result['city'] == 'thanh-hoa') ? 'selected' : ''; ?>>Thanh Hóa</option>
                                              <option value="thua-thien-hue" <?php echo ($result['city'] == 'thua-thien-hue') ? 'selected' : ''; ?>>Thừa Thiên-Huế</option>
                                              <option value="tien-giang" <?php echo ($result['city'] == 'tien-giang') ? 'selected' : ''; ?>>Tiền Giang</option>
                                              <option value="tra-vinh" <?php echo ($result['city'] == 'tra-vinh') ? 'selected' : ''; ?>>Trà Vinh</option>
                                              <option value="tuyen-quang" <?php echo ($result['city'] == 'tuyen-quang') ? 'selected' : ''; ?>>Tuyên Quang</option>
                                              <option value="vinh-long" <?php echo ($result['city'] == 'vinh-long') ? 'selected' : ''; ?>>Vĩnh Long</option>
                                              <option value="vinh-phuc" <?php echo ($result['city'] == 'vinh-phuc') ? 'selected' : ''; ?>>Vĩnh Phúc</option>
                                              <option value="yen-bai" <?php echo ($result['city'] == 'yen-bai') ? 'selected' : ''; ?>>Yên Bái</option>
                    </select> 
                </div>
                <div class="form-group">
                  <label for="inputEstimatedDuration">Địa chỉ</label>
                  <input name="address" id="inputEstimatedDuration"  value="<?php echo $result['address'] ?>" readonly class="form-control">
                </div>
                <?php  
                  }
                }
                ?>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
          <table class="table table-bordered table-hover" style="margin-top: 20px;">
              <thead>
                <tr style="text-align: center;">
                  <th>STT</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Ảnh Sản Phẩm</th>
                  <th>Giá Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Thành tiền</th>                      
                  </tr>
              </thead>
              <tbody>
                <?php  
                  $get_order = $cs->show_order($id,$ordercode);
                  if($get_order){
                    $subtotal = 0;
                    $total = 0;
                    $i = 0;
                    while($result=$get_order->fetch_assoc()){
                      $i++;
                      $subtotal=$result['price']/$result['quantity'];
                      
                      $total += $result['price'];
                ?>
                <tr style="text-align: center;">
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $result['productName'];?></td>
                  <td><img style="width:80px;max-height:80px" src="uploads/<?php echo $result['image'] ?>"></td>
                  <td><?php echo $fm->format_currency($subtotal);?>đ</td>
                  <td><?php echo $result['quantity'];?></td>
                  <td><?php echo $fm->format_currency($result['price']);?>đ</td>
                </tr>
                <?php  
                  }
                }
                ?>
              </tbody>
          </table>
        <div class="row">
          <div class="col-12"><span class="float-right" style="font-size:20px;"><strong>Tổng cộng: <?php echo $fm->format_currency($total); ?> VND</strong></span></div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">    
            <a href="quanlydonhang.php" class="btn btn-primary float-right">Back</a>
          </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include('partials/footer.php'); ?>