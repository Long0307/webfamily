<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-6">
                <h2>MỤC BÀI VIẾT</h2>
              </div>
              <?php if (getPath('index.php?controller=news&action=add')) { ?>
              <div class="col-xs-12 col-sm-6">
               <a href="../../admin/news/add/" class="btn btn-success float-end">Thêm bài viết</a>
             </div>
             <?php } ?>
           </div>
         </div>
         <div class="body">
          <div class="row">
           <form action="" method="post" enctype="multipart/form-data" style="width:35%;">
             <div class="input-group mb-3">
              <input type="text" class="form-control border border-secondary" name="textsearch" placeholder="<?php echo "Tìm kiếm: ". count($data['selectAll'])." bài viết"; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <button type="submit" class="input-group-text" name="search" id="basic-addon2"><i class="fas fa-search"></i></button>
            </div>
          </form>
          <div class="container">
            <?php
            if(isset($data['success'])){
              echo $data['success'];
            }
            ?>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Tiêu đề bài viết</th>
                  <th scope="col">Ngày thêm</th>
                  <th scope="col">Hành động</th>
                </tr>
              </thead>
              <tbody>
                <?php

                if(isset($data['search'])){
                  $i = 0;
                 foreach($data['search'] as $value) {
                  $i++;
                  ?>
                  <tr id="load_<?php echo $value[0]; ?>">
                    <th scope="row"><?php echo $i; ?></th>
                    <td>
                      <img src="../../ImageNew/<?php echo $value['HinhAnh']; ?>"  width="100px;height:100px;" alt="">   
                    </td>
                    <td><?php echo $value['TieuDe']; ?></td>
                    <td><?php echo $value['Created_time']; ?></td>
                    <td>
                      <?php if (getPath('index.php?controller=news&action=edit&id=0')) { ?>
                      <a href="../../admin/news/edit/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>" class="btn btn-success">Sửa</a>
                      <?php } ?>
                      <?php if (getPath('index.php?controller=news&action=delete&id=0')) { ?>
                      <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php
                }
              }else{

              if(!isset($_GET['trang'])){
                $i = 0;
                foreach($data['selectNew'] as $value) {
                  $i++;
                  ?>
                  <tr id="load_<?php echo $value[0]; ?>">
                    <th scope="row"><?php echo $i; ?></th>
                    <td>
                      <img src="../../ImageNew/<?php echo $value['HinhAnh']; ?>"  width="100px;height:100px;" alt="">   
                    </td>
                    <td><?php echo $value['TieuDe']; ?></td>
                    <td><?php echo $value['Created_time']; ?></td>
                    <td>
                      <?php if (getPath('index.php?controller=news&action=edit&id=0')) { ?>
                      <a href="../../admin/news/edit/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>" class="btn btn-success">Sửa</a>
                      <?php } ?>
                      <?php if (getPath('index.php?controller=news&action=delete&id=0')) { ?>
                      <button onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php
                }
              }else{
                $i = 0;
                foreach($data['pagiNew'] as $value) {
                  $i++;
                  ?>
                  <tr id="load_<?php echo $value[0]; ?>">
                    <th scope="row"><?php echo $i; ?></th>
                    <td>
                      <img src="../../ImageNew/<?php echo $value['HinhAnh']; ?>"  width="100px;height:100px;" alt="">   
                    </td>
                    <td><?php echo $value['TieuDe']; ?></td>
                    <td><?php echo $value['Created_time']; ?></td>
                    <td>
                      <?php if (getPath('index.php?controller=news&action=edit&id=0')) { ?>
                      <a href="../../admin/news/edit/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>" class="btn btn-success">Sửa</a>
                      <?php } ?>
                      <?php if (getPath('index.php?controller=news&action=delete&id=0')) { ?>
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
                            $.get('index.php?controller=news&action=delete&id='+id, function(data) {
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
            $a = ceil($total/12);
            if(isset($_GET['trang'])){
              if($_GET['trang'] < 2){
                echo "";
              }else{
                echo '<a class="page-link" href="../../admin/news&page='.($_GET['trang']-1).'">Prev</a>';
              }

              echo '<a class="page-link" href="../../admin/news&page=1">Trand đầu</a>';

              if(($_GET['trang'] - 3) > 0){
                for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

                  if(($b > $b - 3) && ($b < $b + 3)){
                    if($b > $a) {
                      break;
                    }
                    echo '<a class="page-link" href="../../admin/news&page='.$b.'">'.$b.'</a>';
                  }

                }
              }
              else{

                for($b = 1; $b <= 4;$b++){

                  if(($b > $b - 3) && ($b < $b + 3)){
                    echo '<a class="page-link" href="../../admin/news&page='.$b.'">'.$b.'</a>';
                  }

                }
              }

              echo '<a class="page-link" href="../../admin/news&page='.$a.'">Trang cuối</a>';

              if(isset($_GET['trang'])){
                if($_GET['trang'] < ($a - 2)){
                  echo '<a class="page-link" href="../../admin/news&page='.($_GET['trang']+1).'">Next</a>';
                }
              }

            }else{
              for($b = 1; $b <= 4;$b++){

                if(($b > $b - 3) && ($b < $b + 3)){
                  echo '<a class="page-link" href="../../admin/news&page='.$b.'">'.$b.'</a>';
                }

              }

              echo '<a class="page-link" href="../../admin/news&page=2">Next</a>';
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

