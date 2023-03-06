   <script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>THÊM SLIDE</h2>
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
                                    <label for="formGroupExampleInput"><b>Tên slider:</b></label>
                                    <input type="text" class="form-control border rounded" name="name" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                <?php                                
                                    if(isset($data['err_name'])){
                                        echo $data['err_name'];
                                    } 
                                ?>
                                </div>
                                <div class="form-group">
                                      <label for="formGroupExampleInput"><b>Thêm hình ảnh sản phẩm (bắt buộc):</b></label>
                                      <input type="file" class="form-control border rounded" name="image" id="formGroupExampleInput" placeholder="  Nhập thể loại sản phẩm">
                                       <?php
                                          if(isset($data['error']['err_image'])){
                                            echo $data['error']['err_image'];
                                          }
                                        ?>
                                    </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput"><b>Tiêu đề chính:</b></label>
                                   <input type="text" class="form-control border rounded" name="maintitle" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                </div>
                                <div class="form-group">
                                  <label for="formGroupExampleInput"><b>Tiêu đề phụ:</b></label>
                                   <input type="text" class="form-control border rounded" name="subtitle" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"><b>Mô tả ngắn(<= 70 ký tự):</b></label>
                                   <input type="text" class="form-control border rounded" name="content" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"><b>Link:</b></label>
                                   <input type="text" class="form-control border rounded" name="link" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                </div>
                                    <label for="formGroupExampleInput"><b>Phong cách nội dung slide:</b></label>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="slidestyle[]" id="exampleRadios1" value="position:absolute;left:115px;" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Ở bên trái
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="slidestyle[]" id="exampleRadios2" value="position:absolute;right:115px;text-align:right;">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Ở bên phải
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="slidestyle[]" id="exampleRadios3" value="text-align:center;margin:0 auto;">
                                      <label class="form-check-label" for="exampleRadios3">
                                        Ở giữa
                                      </label>
                                    </div>
                                
                                <?php
                                  if(isset($data['error']['err_content'])){
                                    echo $data['error']['err_content'];
                                  }
                                ?>
                                <br>
                                <div class="form-check mb-3">
                                  <input class="form-check-input" type="checkbox" name="show" id="exampleRadios4" value="1">
                                  <label class="form-check-label" for="exampleRadios4">
                                    Yêu cầu hiển thị
                                  </label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="add">Thêm slider</button>
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

