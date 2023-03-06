
<!-- #Top Bar -->


<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-6">
                <h2>Danh sách thành viên</h2>
                <?php echo "Tổng số: "."<strong>".$total = count($data['userAdmin'])." thành viên</strong>"; ?>
              </div>
              <?php if (getPath('index.php?controller=member&action=add')) { ?>
              <div class="col-xs-12 col-sm-6">
               <a href="../../admin/member/add/" class="btn btn-secondary float-end">Thêm thành viên</a>
             </div>
             <?php } ?>
           </div>
         </div>
         <div class="body">
          <div class="row">
            <form action="" method="post" enctype="multipart/form-data" style="width:35%;">
             <div class="input-group mb-3">
              <input type="text" class="form-control border border-secondary" name="textsearch" placeholder="Tìm kiếm theo tên đăng nhập.." aria-label="Recipient's username" aria-describedby="basic-addon2">
              <button type="submit" class="input-group-text" name="search" id="basic-addon2"><i class="fas fa-search"></i></button>
            </div>
          </form>
          <div class="container">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên đăng nhập</th>
                  <th scope="col">Họ và tên</th>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Ngày tạo</th>
                  <th scope="col">Phân quyền</th>
                  <th scope="col">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($data['search'])){
                  foreach($data['search'] as $value) {
                    ?>
                    <tr id="load_<?php echo $value['ID']; ?>">
                      <th scope="row"><?php echo $value['ID']; ?></th>
                      <td><?php echo $value['TenDangNhap']; ?></td>
                      <td><?php echo $value['HoVaTen']; ?></td>
                      <td>
                        <img src="../../public/logo/<?php echo $value['HinhAnh']; ?>" width="100px" alt="">
                      </td>
                      <td><?php echo $value['Created_time']; ?></td>
                      <?php if (getPath('index.php?controller=member&action=privilege&id=0')) { ?>
                        <td>
                          <a href="../../admin/member/privilege/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TenDangNhap']).".html"; ?>" class="btn btn-warning">Phân quyền</a>
                        </td>
                      <?php } ?>
                      <td>
                        <?php if (getPath('index.php?controller=member&action=edit&id=0')) { ?>
                        <a href="../../admin/member/edit/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TenDangNhap']).".html"; ?>" class="btn btn-success">Sửa</a>
                        <?php } ?>
                        <?php if (getPath('index.php?controller=member&action=delete&id=0')) { ?>
                        <button onclick="check(<?php echo $value['ID']; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                  }
                }else{
                  foreach($data['userAdmin'] as $value) {
                    ?>
                    <tr id="load_<?php echo $value['ID']; ?>">
                      <th scope="row"><?php echo $value['ID']; ?></th>
                      <td><?php echo $value['TenDangNhap']; ?></td>
                      <td><?php echo $value['HoVaTen']; ?></td>
                      <td>
                        <img src="../../public/logo/<?php echo $value['HinhAnh']; ?>" width="100px" alt="">
                      </td>
                      <td><?php echo $value['Created_time']; ?></td>
                       <?php if (getPath('index.php?controller=member&action=privilege&id=0')) { ?>
                        <td>
                          <a href="../../admin/member/privilege/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TenDangNhap']).".html"; ?>" class="btn btn-warning">Phân quyền</a>
                        </td>
                      <?php } ?>
                      <td>
                        <?php if (getPath('index.php?controller=member&action=edit&id=0')) { ?>
                        <a href="../../admin/member/edit/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TenDangNhap']).".html"; ?>" class="btn btn-success">Sửa</a>
                        <?php } ?>
                        <?php if (getPath('index.php?controller=member&action=delete&id=0')) { ?>
                        <button onclick="check(<?php echo $value['ID']; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</button>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
          $.get('index.php?controller=member&action=delete&id='+id, function(data) {
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
</div>
</section>

