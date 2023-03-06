<!-- #Top Bar -->
<style>
  .modal-4 a {
    margin: 0 5px;
    padding: 0;
    width: 30px;
    height: 30px;
    line-height: 30px;
    -moz-border-radius: 100%;
    -webkit-border-radius: 100%;
    border-radius: 100%;
    background-color: #F7C12C;
  }
  .modal-4 a.prev {
    -moz-border-radius: 50px 0 0 50px;
    -webkit-border-radius: 50px;
    border-radius: 50px 0 0 50px;
    width: 100px;
  }
  .modal-4 a.next {
    -moz-border-radius: 0 50px 50px 0;
    -webkit-border-radius: 0;
    border-radius: 0 50px 50px 0;
    width: 100px;
  }
  .modal-4 a:hover {
    background-color: #FFA500;
  }
  .modal-4 a.active, .modal-4 a:active {
    background-color: #FFA100;
  }
</style>
<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-6">
                <h2>SẢN PHẨM</h2>
              </div>
              <div class="col-xs-12 col-sm-6">
               <a href="index.php?controller=product&action=add" class="btn btn-success float-end">Thêm sản phẩm</a>
             </div>
           </div>
         </div>
         <div class="body">
          <div class="row">
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh sản phẩm</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Ngày thêm</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  if(!isset($_GET['trang'])){
                   $i = 0;
                   foreach($data['selectProduct'] as $value) {
                    $i++;
                    ?>
                    <tr>
                      <th scope="row"><?php echo $value[0]; ?></th>
                      <td><?php echo $value['Tensp']; ?></td>
                      <td>
                        <img src="../../uploads/<?php echo $value['HinhAnhSP']; ?>"  width="100px;height:100px;" alt="">                
                      </td>
                      <td><?php echo $value['TenDanhMuc']; ?></td>
                      <td><?php echo $value['Created_time']; ?></td>
                      <td><button type="button" class="btn btn-primary">Chi tiết</button>
                        <button type="button" class="btn btn-success" style="margin-left: 10px;">Sửa</button>
                        <button type="button" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      </td>
                    </tr>
                    <?php
                  }
                }else{
                   $i = 0;
                   foreach($data['pagiPro'] as $value) {
                    $i++;
                    ?>
                    <tr>
                      <th scope="row"><?php echo $value[0]; ?></th>
                      <td><?php echo $value['Tensp']; ?></td>
                      <td>
                        <img src="../../uploads/<?php echo $value['HinhAnhSP']; ?>"  width="100px;height:100px;" alt="">                
                      </td>
                      <td><?php echo $value['TenDanhMuc']; ?></td>
                      <td><?php echo $value['Created_time']; ?></td>
                      <td><button type="button" class="btn btn-primary">Chi tiết</button>
                        <button type="button" class="btn btn-success" style="margin-left: 10px;">Sửa</button>
                        <button type="button" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      </td>
                    </tr>
                    <?php
                  }
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
            <div class="pagination pagination-style-three m-t-20">
              <?php
              $total = count($data['selectAllProduct']);
              $a = ceil($total/5);
              if(isset($_GET['trang'])){
                if($_GET['trang'] < 2){
                  echo "";
                }else{
                  echo '<a class="page-link" href="index.php?controller=product&trang='.($_GET['trang']-1).'">Prev</a>';
                }
              }

              for($b=1;$b<=$a;$b++){

                echo '<a class="page-link" href="index.php?controller=product&trang='.$b.'">'.$b.'</a>';
              }
              if(isset($_GET['trang'])){
                if($_GET['trang'] < ($a - 2)){
                  echo '<a class="page-link" href="index.php?controller=product&trang='.($_GET['trang']+1).'">Next</a>';
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
