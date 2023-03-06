
<!-- #Top Bar -->

<script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-6">
                <h2>THÊM SẢN PHẨM</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div class="row">
              <div class="container">
                <?php
                  if(isset($data['success'])){
                    // echo $data['success']['success'];
                    print_r($data['success']);
                  }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                  <label for="formGroupExampleInput2"><b>Tên sản phẩm</b></label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['Tensp']; ?>" class="form-control border rounded" name="name" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                </div>
               
                <div class="form-group">
                  <label for="uname"><b>Danh mục sản phẩm</b></label>
                  <select class="js-example-basic-single" value="<?php echo $data['selectJoin2Where'][0]['IDDanhMuc']; ?>" style="width: 100%;" name="cate" id="option-cus" required>
                    <option value="<?php echo $data['selectJoin2Where'][0]['IDDanhMuc']; ?>" selected=""><?php echo $data['selectJoin2Where'][0]['TenDanhMuc']; ?></option>
                    <?php
                    $i = 0;
                    foreach($data['selectCate'] as $value) {

                      $i++;
                      ?>
                      <option value="<?php echo $value['ID']; ?>"><?php echo $value['TenDanhMuc']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Thêm hình ảnh sản phẩm (bắt buộc)</b></label>
                  <input type="file" class="form-control border rounded" name="hinhanh" id="formGroupExampleInput" placeholder="  Nhập thể loại sản phẩm">
                   <img src="../../uploads/<?php echo $data['selectJoin2Where'][0]['HinhAnhSP']; ?>"  width="100px;height:100px;" alt="">  
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Giá:</b></label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['Gia']; ?>" class="form-control border rounded" name="price" id="formGroupExampleInput" placeholder="  Thêm giá cho sản phẩm">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Nha sản xuất</b></label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['NhaSanXuat']; ?>" class="form-control border rounded" name="year" id="formGroupExampleInput" placeholder="  Thêm nhà sản xuất">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Chất liệu</b></label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['ChatLieu']; ?>" class="form-control border rounded" name="material" id="formGroupExampleInput" placeholder="  Thêm chất liệu">
                </div> 
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Xuất xứ</b></label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['XuatXu']; ?>" class="form-control border rounded" name="origin" id="formGroupExampleInput" placeholder="  Thêm xuất xứ">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Chi tiết sản phẩm</b></label>
                  <textarea name="content"><?php echo $data['selectJoin2Where'][0]['ThongTinSP']; ?></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="update">Sửa sản phẩm</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</section>

<script type="text/javascript">
 $(document).ready(function() {
  $('.js-example-basic-single').select2();
});
 CKEDITOR.replace('content');
</script>