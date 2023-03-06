   <script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>SỬA SLIDE</h2>
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
                                 <form action="index.php?controller=slider&action=updated&id=<?php echo $data['showwEdit'][0]['id']; ?>" method="post" enctype="multipart/form-data">
                                 
                                <div class="form-group">
                                    <label for="formGroupExampleInput"><b>Tên slider</b></label>
                                    <input type="text" class="form-control border rounded" name="name" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm" value="<?php echo $data['showwEdit'][0]['ten']; ?>">
                                <?php                                
                                    if(isset($data['err_name'])){
                                        echo $data['err_name'];
                                    } 
                                ?>
                                </div>
                                <div class="form-group">
                                      <label for="formGroupExampleInput"><b>Thêm slide</b></label>
                                      <input type="file" class="form-control border rounded" name="image" id="formGroupExampleInput" placeholder="  Nhập thể loại sản phẩm">
                                       <?php
                                          if(isset($data['error']['err_image'])){
                                            echo $data['error']['err_image'];
                                          }
                                        ?>
                                          <img src="../../uploads/<?php echo $data['showwEdit'][0]['image']; ?>"  width="100px;height:100px;" alt="">
                                    </div>
                                    <div class="form-group">
                                  <label for="formGroupExampleInput"><b>Chi tiết sản phẩm</b></label>
                                  <textarea name="content"><?php echo $data['showwEdit'][0]['description']; ?></textarea>
                                </div>
                                <?php
                                  if(isset($data['error']['err_content'])){
                                    echo $data['error']['err_content'];
                                  }
                                ?>
                                <div class="form-check mb-3">
                                  <input class="form-check-input" type="checkbox" name="show" id="exampleRadios1" value="<?php echo $data['showwEdit'][0]['status']; ?>" <?php if($data['showwEdit'][0]['status'] == 1){ echo "checked"; }; ?>>
                                  <label class="form-check-label" for="exampleRadios1">
                                    Yêu cầu hiển thị
                                  </label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="update">Sửa slider</button>
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
 CKEDITOR.replace('content');
 config.startupMode = 'source';
</script>
