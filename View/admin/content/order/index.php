
<!-- #Top Bar -->


<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-6">
                <h2>QUẢN LÝ ĐƠN HÀNG</h2>
              </div>
              <div class="col-xs-12 col-sm-6">
                <a href="../../admin/order/" class="btn btn-primary float-end">Load lại trang</a>
             </div>
           </div>
         </div>
         <div class="body">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                
                <form action="" method="post" accept-charset="utf-8">
                  <div class="row">
                    <input type='name' class="form-control" placeholder="Tìm kiếm theo số điện thoại" name="info" style="width:250px;"/>
                    <input type='date' class="form-control" name="date" style="width:200px;margin-left:10px;"/>
                    <button type="submit" class="btn btn-danger" name="searchdonhang" style="width:100px;margin-left:10px;">Search</button>
                    </div>
                </form>
                <?php echo "Tổng số: ".$total = count($data['selectAll'])." đơn hàng"; ?>
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
               if(isset($data['search'])){
                $i=0;
                foreach($data['search'] as $value) {
                    $i++;
                    ?>
                    <tr id="load_<?php echo $value[0]; ?>">
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
                        <a href="../../admin/order/photo/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['HoVaTen']).".html"; ?>" target="_blank" class="btn btn-info">In</a>
                        <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      </td>
                    </tr>
                    <?php
                }
              }else{
                  if(!isset($_GET['trang'])){
                   $i = 0;
                   foreach($data['selectOrders'] as $value) {
                    $i++;
                    ?>
                    <tr id="load_<?php echo $value[0]; ?>">
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
                        <a href="../../admin/order/photo/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['HoVaTen']).".html"; ?>" target="_blank" class="btn btn-info">In</a>
                        <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      </td>
                    </tr>
                    <?php
                  }
                }else{
                 $i = 0;
                 foreach($data['pagiOrders'] as $value) {
                  $i++;
                  ?>
                 <tr id="load_<?php echo $value[0]; ?>">
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
                        <a href="../../admin/order/photo/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['HoVaTen']).".html"; ?>" target="_blank" class="btn btn-info">In</a>
                        <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      </td>
                    </tr>
                  <?php
                }
              }
            }
              ?>
                </tbody>
              </table>
              <script>
                function check(id){

                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                      },
                      buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({ 
                      title: 'Bạn có chắc chắn muốn xoá không?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Có, tôi đồng ý!',
                      cancelButtonText: 'Không, thoát!',
                      reverseButtons: true
                    }).then((result) => {

                      if (result.value) {
                        $.get('index.php?controller=order&action=delete&id='+id, function(data) {
                          if(data){
                            $("tr#load_"+id).load(window.location.href+" tr#load_"+id+" > *");
                            sleep(1);
                            swalWithBootstrapButtons.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                              )
                          }
                        });
                      }
                    })
                  }
          </script>
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
                       <div class="pagination pagination-style-three m-t-20">
            <?php
          $total = count($data['selectAll']);
          $a = ceil($total/5);
          if(isset($_GET['trang'])){
            if($_GET['trang'] < 2){
              echo "";
            }else{
              echo '<a class="page-link" href="../../admin/order&page='.($_GET['trang']-1).'">Prev</a>';
            }

            echo '<a class="page-link" href="../../admin/order&page=1">Trand đầu</a>';

            if(($_GET['trang'] - 3) > 0){
              for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

                if(($b > $b - 3) && ($b < $b + 3)){
                  if($b > $a) {
                    break;
                  }
                  echo '<a class="page-link" href="../../admin/order&page='.$b.'">'.$b.'</a>';
                }
                
              }
            }
            else{

             for($b = 1; $b <= $a;$b++){

              if(($b > $b - 3) && ($b < $b + 3)){
                echo '<a class="page-link" href="../../admin/order&page='.$b.'">'.$b.'</a>';
              }

            }
          }

          echo '<a class="page-link" href="../../admin/order&page='.$a.'">Trang cuối</a>';

          if(isset($_GET['trang'])){
            if($_GET['trang'] < ($a - 2)){
              echo '<a class="page-link" href="../../admin/order&page='.($_GET['trang']+1).'">Next</a>';
            }
          }

        }else{
         for($b = 1; $b <= $a;$b++){

          if(($b > $b - 3) && ($b < $b + 3)){
            echo '<a class="page-link" href="../../admin/order&page='.$b.'">'.$b.'</a>';
          }

        }
      }
      ?>
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</section>

