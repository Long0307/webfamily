
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
                <h2>THÔNG TIN CHUNG</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div class="row">
              <div class="container">
                <form action="" method="post" enctype="multipart/form-data"> 
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Logo website (bắt buộc)</b></label>
                  <input type="file" class="form-control border rounded" name="image" id="formGroupExampleInput" placeholder=" ">
                    <?php  

                      if($data['selectOne'][0][5] == ""){
                        ?>
                        <?php
                      }else{
                        ?>
                          <img src="../../uploads/<?php echo $data['selectOne'][0][5]; ?>" style="width:100px;height:100px;" alt="">
                        <?php
                      }
 
                    ?>
                  
                  </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Số điện thoại</b></label>
                  <input type="text" class="form-control border rounded" name="phone" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][1]; ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Tên công ty</b></label>
                  <input type="text" class="form-control border rounded" name="company" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][14]; ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Dịa chỉ</b></label>
                  <input type="text" class="form-control border rounded" name="address" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][2]; ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Giở mở cửa</b></label>
                  <input type="text" class="form-control border rounded" name="opentime" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][3]; ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Email</b></label>
                  <input type="text" class="form-control border rounded" name="email" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][4]; ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Copyright</b></label>
                  <input type="text" class="form-control border rounded" name="copyright" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][6]; ?>" required="required">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Facebook</b></label>
                  <input type="text" class="form-control border rounded" name="facebook" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][7]; ?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Twitter</b></label>
                  <input type="text" class="form-control border rounded" name="twitter" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][8]; ?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>G+</b></label>
                  <input type="text" class="form-control border rounded" name="g+" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][9]; ?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Youtube</b></label>
                  <input type="text" class="form-control border rounded" name="youtube" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][10]; ?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Pinterest</b></label>
                  <input type="text" class="form-control border rounded" name="pinterest" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][11]; ?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Instagram</b></label>
                  <input type="text" class="form-control border rounded" name="instagram" id="formGroupExampleInput" value="<?php echo $data['selectOne'][0][12];?>">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Iframe Map</b></label>
                  <textarea name="content" required="required"><?php echo $data['selectOne'][0][13]; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput"><b>Về chúng tôi</b></label>
                  <textarea name="aboutus" required="required"><?php echo $data['selectOne'][0][15]; ?></textarea>
                </div>
                <div class="form-group row">  
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="updateInfoWeb">Sửa thông tin</button>
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
CKEDITOR.replace('aboutus');
</script>