<?php
    // basename($_SERVER['HTTP_REFERER']);;
?>
<style>
    section.content{
        margin: 5% 15px 0 227px !important;
    }
</style>
    <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="card" style="margin-bottom:9px;">
                    <div class="body pb-0">
                        <div class="col-md-10">
                            <H5>LIỆT KÊ TỔNG SỐ LƯỢNG</H5>
                        </div>
                        <div class="row">
                            <?php if (getPath('index.php?controller=category')) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="../../admin/category/">
                                        <div class="info-box bg-pink hover-expand-effect">
                                            <div class="icon">
                                                <i class="fas fa-list-ol"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text">DANH MỤC SẢN PHẨM</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $data['getAllCate']; ?>" data-speed="15" data-fresh-interval="20">THỂ LOẠI</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (getPath('index.php?controller=product')) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="../../admin/product/">
                                        <div class="info-box bg-cyan hover-expand-effect">
                                            <div class="icon">
                                                <i class="fab fa-product-hunt"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text">SẢN PHẨM</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $data['getAllPro']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (getPath('index.php?controller=news')) { ?> 
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="../../admin/news/">
                                        <div class="info-box bg-light-green hover-expand-effect">
                                            <div class="icon">
                                                <i class="fas fa-newspaper"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text">BÀI VIẾT</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $data['getAllNews']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (getPath('index.php?controller=order')) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="../../admin/order/">
                                        <div class="info-box bg-orange hover-expand-effect">
                                            <div class="icon">
                                                <i class="fab fa-shopify"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text">ĐƠN HÀNG</div>
                                                <div class="number count-to" data-from="0" data-to="<?php echo $data['getAllOrder']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (getPath('index.php?controller=productInventory')) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="../../admin/productInventory/">
                                        <div class="info-box bg-secondary hover-expand-effect">
                                            <div class="icon">
                                                <i class="fas fa-warehouse"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text text-white">NHẬP KHO</div>
                                                <div class="number count-to text-white" data-from="0" data-to="<?php echo $data['getAllImportPro']; ?>" data-speed="15" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (getPath('index.php?controller=contact')) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="../../admin/contact/">
                                        <div class="info-box bg-success hover-expand-effect">
                                            <div class="icon">
                                                <i class="fas fa-file-signature"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text text-white">LIÊN HỆ</div>
                                                <div class="number count-to text-white" data-from="0" data-to="<?php echo $data['getAllContact']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if (getPath('index.php?controller=member')) { ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="../../admin/member/">
                                        <div class="info-box bg-dark hover-expand-effect">
                                            <div class="icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text text-white">QUẢN LÝ THÀNH VIÊN</div>
                                                <div class="number count-to text-white" data-from="0" data-to="<?php echo $data['getAllMember']; ?>" data-speed="1000" data-fresh-interval="20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-0">
                                    <a href="#">
                                        <div class="info-box bg-light hover-expand-effect">
                                            <div class="icon">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                            <div class="content">
                                                <div class="text"> <div id="MyClockDisplay" class="clock" onload="showTime()"></div></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
        <style>
.clock {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    color: black;
    letter-spacing: 7px;
    margin-left:10%;
}
</style>
<script>
    function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
</script>


        <div class="row clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-md-10 mb-0">
                            <H5>ĐƠN HÀNG MỚI NHẤT</H5>
                        </div>
                        <div class="col-md-2 mb-0 float-end">
                            <a class="page-link text-center" href="../../admin/order&trang=1" style="background: rgb(255, 100, 7); color: white;">Xem tiếp</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container">
                          <table class="table">
                            <thead>
                              <tr>  
                                <th scope="col">#</th>
                                <th scope="col">Thời gian đặt hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Tổng tiền</th> 
                                <th scope="col">Trạng thái</th>  
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 0;
                            foreach($data['selectOrders'] as $value) {
                              $i++;
                              ?>
                              <tr>
                                  <th scope="row"><?php echo $value[0]; ?></th>
                                  <td><?php echo $value['Created_time']; ?></td>
                                  <td><?php echo $value['HoVaTen']; ?></td>
                                  <td><?php echo "0".$value['SoDienThoai']; ?></td>
                                  <td><?php echo $value['DiaChi']; ?></td>
                                  <td><?php echo number_format($value['TongTien'], 0, '', ',')." VNĐ"; ?></td>
                                  <td>

                                    <?php
                                    if($value['status'] == 1){
                                        echo "<div class='btn btn-secondary'>Chưa giao hàng</div>";
                                    }else if($value['status'] == 2){
                                        echo "<div class='btn btn-warning'>Đã in (chưa giao hàng)</div>";
                                    }else{
                                        echo "<div class='btn btn-success'>Đã giao hàng</div>";
                                    }
                                    ?>

                                </td>
                                <td>
                                    <a href="../../admin/order/info/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['HoVaTen']).".html"; ?>" class="btn btn-primary">Chi tiết</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <style>
                .pagination-style-three a { 
                  padding: 5px 15px; 
                  background: #ffffff; 
                  color: #ff6407; 
                  border-radius: 25px;
                  box-shadow: 0px 5px 10px 0px rgba(0,0,0,.1);
                  margin: 0px 5px;
              }

              .pagination-style-three a.selected, .pagination-style-three a:hover, .pagination-style-three a:active, .pagination-style-three a:focus { background: #ff6407;color: white; }

          </style>
      </div>
  </div>
</div>
</div>
</div>

</div>
</div>
</section>

