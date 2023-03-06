<?php
// $middleWare = getPath();
// if(!$middleWare){
//     echo "Không được sử dụng";
//     exit;
// }
?>
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


.container {
  height: 100vh
}

.dropdown-toggle {
  width: 100px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 50px;
  border: 2px solid #dc3545;
  font-weight: 600
}

.dropdown-toggle:focus {
  box-shadow: none !important;
  width: 100%;
}

.dropdown-toggle::after {
  display: none;
}

.dropdown-menu {
  width: 100px;
  border: 2px solid #F44336;
  padding: 0rem 0;
  transform: translate3d(0px, 50px, 0px) !important;  
}



.dropdown-item {
  display: block;
  /* width: 100%; */
  padding: 12px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
              <div class="col-xs-6 col-sm-6">
                <?php if (getPath('index.php?controller=product&action=delete&id=0')) { ?>
                  <button onclick="deletemul();" class="btn btn-danger float-end" style="margin-left: 10px;">Xoá</button>
                <?php } ?>
                <?php if (getPath('index.php?controller=product&action=add')) { ?>
                 <a href="../../admin/product/add/" class="btn btn-success float-end">Thêm sản phẩm</a>
               <?php } ?>
             </div>
           </div>
         </div>
         <div class="body">
          <div class="row">
            <div class="col-md-6 col-sm-6 my-0">
              <form action="" method="post" enctype="multipart/form-data"> 
               <div class="input-group mb-3">
                <input type="text" class="form-control border border-secondary" name="textsearch" placeholder="<?php echo "Tìm kiếm: ".count($data['selectAllProduct'])." sản phẩm"; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <button type="submit" class="input-group-text" name="search" id="basic-addon2"><i class="fas fa-search"></i></button>
              </div>
            </form>
          </div>

          <div class="col-md-6 col-sm-6 my-0">
            <div class="dropdown float-end"> 
              <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"> 
                <span>Hiển thị:</span> 
                <i class="material-icons"></i> 
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                if(isset($_GET['trang'])){
                  ?>
                  <li><a class="dropdown-item" href="../../admin/product/">5</a></li>
                  <li><a class="dropdown-item" href="../../admin/product&page=<?php echo $_GET['trang'] ?>&per=10">10</a></li>
                  <li><a class="dropdown-item" href="../../admin/product&page=<?php echo $_GET['trang'] ?>&per=15">15</a></li>
                  <li><a class="dropdown-item" href="../../admin/product&page=<?php echo $_GET['trang'] ?>&per=20">20</a></li>
                  <?php
                }else{
                  ?>
                  <li><a class="dropdown-item" href="../../admin/product/">5</a></li>
                  <li><a class="dropdown-item" href="../../admin/product&per=10">10</a></li>
                  <li><a class="dropdown-item" href="../../admin/product&per=15">15</a></li>
                  <li><a class="dropdown-item" href="../../admin/product&per=20">20</a></li>
                  <?php
                }
                ?>
              </ul>

            </div>

          </div>


          <div class="container" style="display: contents;">
            <?php
            if(isset($data['success'])){
              echo $data['success']['deletesuccess'];   
            }
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th style="width:10px;">
                    <div class="py-0">
                      <input class="form-check-input pl-0" onclick="checkall()" name="select" type="checkbox" value="all" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                      </label>
                    </th>
                    <th style="width:10px;">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh sản phẩm</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Ngày thêm</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 if(isset($data['search'])){
                  foreach($data['search'] as $value) {
                    ?>
                    <tr id="load_<?php echo $value[0]; ?>">
                     <th>
                      <div class="mx-0">
                        <input class="form-check-input" type="checkbox" name="select[]" value="<?php echo $value[0]; ?>" id="flexCheckDefault_<?php echo $value[0]; ?>">
                        <label class="form-check-label" for="flexCheckDefault_<?php echo $value[0]; ?>">
                        </label>
                      </div>
                    </th>
                    <th><?php echo $value['MaSanPham']; ?></th>
                    <th><?php echo $value['MaSanPham']; ?></th>
                    <td><?php echo $value['Tensp']; ?></td>
                    <td>
                      <img src="../../uploads/<?php echo $value['HinhAnhSP']; ?>"  width="90px" alt="">                
                    </td>
                    <td><?php echo $value['IDDanhMuc']; ?></td>
                    <td><?php echo $value['Created_time']; ?></td>
                    <td style="padding:10px 0px;float:left;width:180px;">

                      <?php if (getPath('index.php?controller=product&action=info&id=0')) { ?>
                        <a href="../../admin/product/info/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp']).".html"; ?>" class="btn btn-primary">Chi tiết</a>
                      <?php } ?>

                      <?php if (getPath('index.php?controller=product&action=edit&id=0')) { ?>
                        <a href="../../admin/product/edit/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp']).".html"; ?>" class="btn btn-success" style="margin:0px;">Sửa</a>
                      <?php } ?>

                      <?php if (getPath('index.php?controller=product&action=delete&id=0')) { ?>
                        <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      <?php } ?>

                    </td>
                  </tr>
                  <?php
                }
              }else{
                if(!isset($_GET['trang'])){
                 $i = 0;
                 foreach($data['selectProduct'] as $value) {
                  $i++;
                  ?>
                  <tr id="load_<?php echo $value[0]; ?>">
                    <th>
                       <div class="mx-0">
                        <input class="form-check-input" type="checkbox" name="select[]" value="<?php echo $value[0]; ?>" id="flexCheckDefault_<?php echo $value[0]; ?>">
                        <label class="form-check-label" for="flexCheckDefault_<?php echo $value[0]; ?>">
                        </label>
                      </div>
                    </th>
                    <th><?php echo $value['MaSanPham']; ?></th>
                    <td><?php echo $value['Tensp']; ?></td>
                    <td>
                      <img src="../../uploads/<?php echo $value['HinhAnhSP']; ?>"  width="90px" alt="">                
                    </td>
                    <td><?php echo $value['TenDanhMuc']; ?></td>
                    <td><?php echo $value['Created_time']; ?></td>
                    <td style="padding:10px 0px;float:left;width:180px;">
                      <?php if (getPath('index.php?controller=product&action=info&id=0')) { ?>
                        <a href="../../admin/product/info/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp']).".html"; ?>" class="btn btn-primary">Chi tiết</a>
                      <?php } ?>

                      <?php if (getPath('index.php?controller=product&action=edit&id=0')) { ?>
                        <a href="../../admin/product/edit/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp']).".html"; ?>" class="btn btn-success" style="margin:0px;">Sửa</a>
                      <?php } ?>

                      <?php if (getPath('index.php?controller=product&action=delete&id=0')) { ?>
                        <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php
                }
              }else{
               $i = 0;
               foreach($data['pagiPro'] as $value) {
                $i++;
                ?>
                <tr id="load_<?php echo $value[0]; ?>"> <th>
                      <div class="mx-0">
                        <input class="form-check-input" type="checkbox" name="select[]" value="<?php echo $value[0]; ?>" id="flexCheckDefault_<?php echo $value[0]; ?>">
                        <label class="form-check-label" for="flexCheckDefault_<?php echo $value[0]; ?>">
                        </label>
                      </div>
                </th>
                <th><?php echo $value['MaSanPham']; ?></th>
                <td><?php echo $value['Tensp']; ?></td>
                <td>
                  <img src="../../uploads/<?php echo $value['HinhAnhSP']; ?>"  width="90px" alt="">                
                </td>
                <td><?php echo $value['TenDanhMuc']; ?></td>
                <td><?php echo $value['Created_time']; ?></td>
                <td style="padding:10px 0px;float:left;width:180px;">
                  <?php if (getPath('index.php?controller=product&action=info&id=0')) { ?>
                    <a href="../../admin/product/info/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp']).".html"; ?>" class="btn btn-primary">Chi tiết</a>
                  <?php } ?>

                  <?php if (getPath('index.php?controller=product&action=edit&id=0')) { ?>
                    <a href="../../admin/product/edit/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp']).".html"; ?>" class="btn btn-success" style="margin:0px;">Sửa</a>
                  <?php } ?>

                  <?php if (getPath('index.php?controller=product&action=delete&id=0')) { ?>
                   <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                 <?php } ?>  
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
    function checkall(){
       $('input:checkbox').each(function () {
            var sThisVal = this.checked;
            if(sThisVal == false){
                $(this).attr( 'checked', true );
            }else{
              $(this).attr( 'checked', false );
            }
          });
    }

    function deletemul(){
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

          $('input:checkbox').each(function () {
            var sThisVal = this.checked;
            if(sThisVal == true){
                id = $(this).val();
                $.get('index.php?controller=product&action=delete&id='+id, function(data) {
                  if(data){
                    $("table.table").load(window.location.href+" table.table > *");
                    sleep(1);
                    swalWithBootstrapButtons.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                      )
                  }
                });
            }
          });
        }
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
      swalWithBootstrapButtons.fire({ 
        title: 'Bạn có chắc chắn muốn xoá không?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Có, tôi đồng ý!',
        cancelButtonText: 'Không, thoát!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.get('index.php?controller=product&action=delete&id='+id, function(data) {
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
  $total = count($data['selectAllProduct']);

  if(isset($_GET['per']) && !isset($_GET['trang'])){
    $per = $_GET['per'];

    for($b = 1; $b <= 4;$b++){

      if(($b > $b - 3) && ($b < $b + 3)){
        echo '<a class="page-link" href="../../admin/product&page='.$b.'&per='.$per.'">'.$b.'</a>';
      }

    }
    echo '<a class="page-link" href="../../admin/product&page='.$b.'&per='.$per.'">Next</a>';

  }elseif(isset($_GET['per']) && isset($_GET['trang'])){
    $per = $_GET['per'];
    $a = ceil($total/$per);
    if(isset($_GET['trang'])){

      if($_GET['trang'] < 2){
        echo "";
      }else{
        echo '<a class="page-link" href="../../admin/product&page='.($_GET['trang']-1).'&per='.$per.'">Prev</a>';
      }

      echo '<a class="page-link" href="../../admin/product&page=1&per='.$per.'">Trang đầu</a>';

      if(($_GET['trang'] - 3) > 0){
        for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

          if(($b > $b - 3) && ($b < $b + 3)){
            if($b > $a) {
              break;
            }
            echo '<a class="page-link" href="../../admin/product&page='.$b.'&per='.$per.'">'.$b.'</a>';
          }

        }
      }
      else{

       for($b = 1; $b <= 4;$b++){

        if(($b > $b - 3) && ($b < $b + 3)){
          echo '<a class="page-link" href="../../admin/product&page='.$b.'&per='.$per.'">'.$b.'</a>';
        }

      }
    }

    echo '<a class="page-link" href="../../admin/product&page='.$a.'&per='.$per.'">Trang cuối</a>';

    if(isset($_GET['trang'])){
      if($_GET['trang'] < ($a - 2)){
        echo '<a class="page-link" href="../../admin/product&page='.($_GET['trang']+1).'&per='.$per.'">Next</a>';
      }
    }

  }else{
   for($b = 1; $b <= 4;$b++){

    if(($b > $b - 3) && ($b < $b + 3)){
      echo '<a class="page-link" href="../../admin/product&page='.$b.'&per='.$per.'">'.$b.'</a>';
    }

  }
  echo '<a class="page-link" href="../../admin/product&page='.(2).'&per='.$per.'">Next</a>';

}

}else{
  $a = ceil($total/5);
  if(isset($_GET['trang'])){

    if($_GET['trang'] < 2){
      echo "";
    }else{
      echo '<a class="page-link" href="../../admin/product&page='.($_GET['trang']-1).'">Prev</a>';
    }

    echo '<a class="page-link" href="../../admin/product&page=1">Trang đầu</a>';

    if(($_GET['trang'] - 3) > 0){
      for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

        if(($b > $b - 3) && ($b < $b + 3)){
          if($b > $a) {
            break;
          }
          echo '<a class="page-link" href="../../admin/product&page='.$b.'">'.$b.'</a>';
        }

      }
    }
    else{

     for($b = 1; $b <= 4;$b++){

      if(($b > $b - 3) && ($b < $b + 3)){
        echo '<a class="page-link" href="../../admin/product&page='.$b.'">'.$b.'</a>';
      }

    }
  }

  echo '<a class="page-link" href="../../admin/product&page='.$a.'">Trang cuối</a>';

  if(isset($_GET['trang'])){
    if($_GET['trang'] < ($a - 2)){
      echo '<a class="page-link" href="../../admin/product&page='.($_GET['trang']+1).'">Next</a>';
    }
  }

}else{
 for($b = 1; $b <= 4;$b++){

  if(($b > $b - 3) && ($b < $b + 3)){
    echo '<a class="page-link" href="../../admin/product&page='.$b.'">'.$b.'</a>';
  }

}
echo '<a class="page-link" href="../../admin/product&page='.(2).'">Next</a>';

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
