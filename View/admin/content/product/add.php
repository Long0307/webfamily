
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
              <h5>Thông tin cơ bản</h5>
              <small>Nhập tên và các thông tin cơ bản của sản phẩm</small>
              <div class="container">
                <?php
                  if(isset($data['success'])){
                    echo $data['success']['success'];
                  }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    
                  <div class="col-md-6">
                                       <div class="form-group">
                  <label for="formGroupExampleInput2"><b>Tên sản phẩm</b></label>
                  <input type="text" class="form-control border rounded" name="name" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                  <?php
                    if(isset($data['error']['err_name'])){
                      echo $data['error']['err_name'];
                    }
                  ?>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2"><b>Mã sản phẩm</b></label>
                  <input type="text" class="form-control border rounded" name="code" id="formGroupExampleInput2" placeholder="  Nếu không nhập, hệ thống sẽ tự sinh">
                </div>
                <div class="form-group">
                  <label for="uname"><b>Danh mục sản phẩm</b></label>
                  <select class="js-example-basic-single" style="width: 100%;" name="cate" id="option-cus" required>

                    <option value="0">---Chọn---</option>
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
                   <?php
                      if(isset($data['error']['err_cate'])){
                        echo $data['error']['err_cate'];
                      }
                    ?>
                </div>

                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Thêm hình ảnh sản phẩm (bắt buộc)</b></label>
                  <input type="file" class="form-control border rounded" name="image" id="formGroupExampleInput" placeholder="  Nhập thể loại sản phẩm">
                   <?php
                      if(isset($data['error']['err_image'])){
                        echo $data['error']['err_image'];
                      }
                    ?>
                </div>
                 <div class="form-group">
                  <label for="formGroupExampleInput"><b>Giá vốn:</b></label>
                  <input type="text" class="form-control border rounded" name="firstprice" id="formGroupExampleInput" placeholder="  Thêm giá cho sản phẩm">
                  <?php
                      if(isset($data['error']['err_price'])){
                        echo $data['error']['err_price'];
                      }
                    ?>
                </div>
                  </div>
                  <div class="col-md-6">
                    
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Giá bán:</b></label>
                  <input type="text" class="form-control border rounded" name="price" id="formGroupExampleInput" placeholder="  Thêm giá cho sản phẩm">
                  <?php
                      if(isset($data['error']['err_price'])){
                        echo $data['error']['err_price'];
                      }
                    ?>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Năm sản xuất</b></label>
                  <input type="text" class="form-control border rounded" name="year" id="formGroupExampleInput" placeholder="  Thêm nhà sản xuất">
                   <?php
                      if(isset($data['error']['err_year'])){
                        echo $data['error']['err_year'];
                      }
                    ?>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Chất liệu</b></label>
                  <input type="text" class="form-control border rounded" name="material" id="formGroupExampleInput" placeholder="  Thêm chất liệu">
                  <?php
                      if(isset($data['error']['err_material'])){
                        echo $data['error']['err_material'];
                      }
                    ?>
                </div> 
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Xuất xứ</b></label>
                  <input type="text" class="form-control border rounded" name="origin" id="formGroupExampleInput" placeholder="  Thêm xuất xứ">
                   <?php
                      if(isset($data['error']['err_origin'])){
                        echo $data['error']['err_origin'];
                      }
                    ?>
                </div>
                </div>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Chi tiết sản phẩm</b></label>
                  <textarea name="content"></textarea>
                </div>
                <?php
                  if(isset($data['error']['err_content'])){
                    echo $data['error']['err_content'];
                  }
                ?>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="add">Thêm sản phẩm</button>
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