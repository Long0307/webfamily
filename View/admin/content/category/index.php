<!-- #Top Bar -->
<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-6">
                <h2>LOẠI SẢN PHẢM</h2>
              </div>
            </div>
          </div>

          <div class="body">
            <div class="row">
              <div class="container">
                <?php
                if(isset($data['success'])){
                  echo $data['success']['success'];
                }

                ?>
                <form action="" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="formGroupExampleInput2" style="float:left;">Thêm loại sản phẩm</label><br>
                    <input type="text" class="form-control border rounded" style="width: 50%;float:left;" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập thêm loại sản phẩm">
                    <button type="submit" class="btn btn-primary" name="add" style="float:left;">Thêm danh mục</button>
                    <br>
                  </div>
                  <?php                                
                  if(isset($data['err_theloai'])){
                    echo $data['err_theloai'];
                  } 
                  ?>
                </form>
              </div>
            </div>
            <?php echo "Tổng số: "."<strong>".$total = count($data['selectAll'])." danh mục</strong>"; ?>
            <div class="row">
              <div class="container">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tên danh mục</th>
                      <th scope="col">Ngày thêm(Ngày sửa)</th>
                      <?php if (getPath('index.php?controller=category&action=delete&id=0')) { ?>
                        <th scope="col">Hành động</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(!isset($_GET['trang'])){
                      $i = 0;
                      foreach($data['selectCate'] as $value) {
                        $i++;
                        ?>
                        <tr id="load_<?php echo $value['ID']; ?>">
                          <th scope="row"><?php echo $i; ?></th>
                          <td id="edit_<?php echo $value['ID']; ?>"><?php echo $value['TenDanhMuc']; ?></td>
                          <td><?php echo $value['Created_time']; ?></td>
                          <?php if (getPath('index.php?controller=category&action=delete&id=0')) { ?>
                            <td>
                              <button id="idcate" onclick="idcate(<?php echo $value['ID']; ?>);" class="btn btn-primary" style="margin-left: 10px;">Sửa</button>
                              <button onclick="check(<?php echo $value['ID']; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                            </td>
                          <?php } ?>
                        </tr>
                        <?php
                      }
                    }else{
                      $i = 0;
                      foreach($data['pagiCate'] as $value) { 
                        $i++;
                        ?>
                        <tr id="load_<?php echo $value['ID']; ?>">
                          <th scope="row"><?php echo $i; ?></th>
                          <td id="edit_<?php echo $value['ID']; ?>"><?php echo $value['TenDanhMuc']; ?></td>
                          <td><?php echo $value['Created_time']; ?></td>
                          <?php if (getPath('index.php?controller=category&action=delete&id=0')) { ?>
                            <td>
                              <button id="idcate" onclick="idcate(<?php echo $value['ID']; ?>);" class="btn btn-primary" style="margin-left: 10px;">Sửa</button>
                              <button onclick="check(<?php echo $value['ID']; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                            </td>
                          <?php } ?>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                  </tbody>
                </table> 
                <script type="text/javascript">

                  function idcate(id){

                    if($('.showh').length > 0){

                      $('.showh').remove();

                    }

                    name = $("td#edit_"+id).text();

                    $("td#edit_"+id).append($('<span class="showh"><br><input type="text" id="updatenew'+id+'" name="tendanhmuc" class="p-1" value="'+String(name)+'"/><button type="button" name="suacate" id="updatecate'+id+'" onClick="updatecate('+id+');" class="btn btn-success updatecate">Sửa</button></span>'));
                  }
                  
                  function updatecate(id){

                    nameupdate = $("#updatenew"+id).val();

                    $.get('index.php?controller=category&action=updatenew&id='+id, {id,nameupdate}, function(data, textStatus, xhr) {

                      $("tr#load_"+id).load(window.location.href+" tr#load_"+id+" > *");

                    })
                  }

                  function check(id){

                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                      },
                      buttonsStyling: false
                    })

                    var quan = 0;

                    $.get('index.php?controller=category&action=check&id='+id, {id}, function(data, textStatus, xhr) {

                      quantity = data.split("Đây là count number:");

                      quan = quantity[1];

                      if(quan == 0){

                        $.get('index.php?controller=category&action=delete&id='+id, function(data) {
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

                      }else{

                        swalWithBootstrapButtons.fire({ 
                          title: 'Bạn có chắc chắn muốn xoá không?',
                          text: "Hiện loại sản phẩm này đang có "+quan+" sản phẩm, nếu bạn xoá bạn sẽ mất hết các sản phẩm trong danh mục này!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Có, tôi đồng ý!',
                          cancelButtonText: 'Không, thoát!',
                          reverseButtons: true
                        }).then((result) => {
                          
                        if (result.value) {
                            $.get('index.php?controller=category&action=delete&id='+id, function(data) {
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

                    });
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
                    echo '<a class="page-link" href="../../admin/category&page='.($_GET['trang']-1).'">Prev</a>';
                  }

                  echo '<a class="page-link" href="../../admin/category&page=1">Trand đầu</a>';

                  if(($_GET['trang'] - 3) > 0){
                    for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

                      if(($b > $b - 3) && ($b < $b + 3)){
                        if($b > $a) {
                          break;
                        }
                        echo '<a class="page-link" href="../../admin/category&page='.$b.'">'.$b.'</a>';
                      }

                    }
                  }
                  else{

                    for($b = 1; $b <= $a;$b++){

                      if(($b > $b - 3) && ($b < $b + 3)){
                        echo '<a class="page-link" href="../../admin/category&page='.$b.'">'.$b.'</a>';
                      }

                    }
                  }

                  echo '<a class="page-link" href="../../admin/category&page='.$a.'">Trang cuối</a>';

                  if(isset($_GET['trang'])){
                    if($_GET['trang'] < ($a - 2)){
                      echo '<a class="page-link" href="../../admin/category&page='.($_GET['trang']+1).'">Next</a>';
                    }
                  }

                }else{
                  for($b = 1; $b <= $a;$b++){

                    if(($b > $b - 3) && ($b < $b + 3)){
                      echo '<a class="page-link" href="../../admin/category&page='.$b.'">'.$b.'</a>';
                    }

                  }

                  echo '<a class="page-link" href="../../admin/category&page=2">Next</a>';
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

