
<!-- #Top Bar -->
<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-6">
                <h2>QUẢN LÝ SLIDER</h2>
              </div>
                <div class="col-xs-12 col-sm-6">
                  <a href="../../admin/slider/add/" class="btn btn-success float-end">Thêm loại sản phẩm</a>
                </div>      
           </div>
         </div>
         <div class="body">
          <?php echo "Tổng số: "."<strong>".$total = count($data['selectAll'])." slider</strong>"; ?>
          <div class="row">
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
             
                  if(!isset($_GET['trang'])){
                    $i = 0;
                    foreach($data['selectslider'] as $value) {
                      $i++;
                      ?>
                      <tr id="load_<?php echo $value['id']; ?>">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $value['ten']; ?></td>
                        <td><img src="../../uploads/<?php echo $value['image']; ?>"  width="100px;height:100px;" alt=""></td>
                        <td><?php if ($value['status'] == 1){ echo "Hiển thị"; }else { echo "Ẩn"; } ?></td>
                        <td>
                           <a href="../../admin/slider/edit/<?php echo $value['id']; ?>/<?php echo vn_to_str($value['ten']).".html"; ?>" class="btn btn-primary" style="margin:0px;">Sửa</a>
                           <button onclick="check(<?php echo $value['id']; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                        </td>
                    </tr>
                    <?php
                  }
                }else{
                  $i = 0;
                  foreach($data['pagislider'] as $value) {
                    $i++;
                    ?>
                    <tr id="load_<?php echo $value['id']; ?>">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $value['ten']; ?></td>
                        <td><img src="../../uploads/<?php echo $value['image']; ?>" width="100px;height:100px;" alt=""></td>
                        <td><?php if ($value['status'] == 1){ echo "Hiển thị"; }else { echo "Ẩn"; } ?></td>
                        <td>
                           <a href="../../admin/slider/edit/<?php echo $value['id']; ?>/<?php echo vn_to_str($value['ten']).".html"; ?>" class="btn btn-primary" style="margin:0px;">Sửa</a>
                          <button onclick="check(<?php echo $value['id']; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                        </td>
                  </tr>
                  <?php
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
                        $.get('index.php?controller=slider&action=delete&id='+id, function(data) {
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
                echo '<a class="page-link" href="../../admin/slider&page='.($_GET['trang']-1).'">Prev</a>';
              }

              echo '<a class="page-link" href="../../admin/slider&page=1">Trand đầu</a>';

              if(($_GET['trang'] - 3) > 0){
                for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

                  if(($b > $b - 3) && ($b < $b + 3)){
                    if($b > $a) {
                      break;
                    }
                    echo '<a class="page-link" href="../../admin/slider&page='.$b.'">'.$b.'</a>';
                  }

                }
              }
              else{

                for($b = 1; $b <= $a;$b++){

                  if(($b > $b - 3) && ($b < $b + 3)){
                    echo '<a class="page-link" href="../../admin/slider&page='.$b.'">'.$b.'</a>';
                  }

                }
              }

              echo '<a class="page-link" href="../../admin/slider&page='.$a.'">Trang cuối</a>';

              if(isset($_GET['trang'])){
                if($_GET['trang'] < ($a - 2)){
                  echo '<a class="page-link" href="../../admin/slider&page='.($_GET['trang']+1).'">Next</a>';
                }
              }

            }else{
              for($b = 1; $b <= $a;$b++){

                if(($b > $b - 3) && ($b < $b + 3)){
                  echo '<a class="page-link" href="../../admin/slider&page='.$b.'">'.$b.'</a>';
                }

              }

              echo '<a class="page-link" href="../../admin/slider&page=2">Next</a>';
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

