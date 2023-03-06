    <script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>SỬA BÀI VIẾT</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="container">
                                <?php
                                    if(isset($data['success'])){
                                        echo $data['success'];
                                    }
                                ?>
                                 <form action="" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="formGroupExampleInput">Thêm hình ảnh đầu tin (bắt buộc)</label>
                                    <input type="file" value="<?php echo $data['showwEdit'][0]['HinhAnh']; ?>" class="form-control" name="hinhanh" id="formGroupExampleInput" placeholder="Example input">
                                    <img src="../../ImageNew/<?php echo $data['showwEdit'][0]['HinhAnh']; ?>"  width="100px;height:100px;" alt=""> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Thêm tiều đề</label>
                                    <input type="text" value="<?php echo $data['showwEdit'][0]['TieuDe']; ?>" class="form-control border rounded" name="title" id="formGroupExampleInput2" placeholder="  Nhập tiêu đề">
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Lời giới thiệu</label>
                                    <input type="text" value="<?php echo $data['showwEdit'][0]['MoTaNgan']; ?>" class="form-control border rounded" name="intro" id="formGroupExampleInput2" placeholder="  Nhập lời giới thiệu">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Nội dung</label>
                                    <textarea name="content"><?php echo $data['showwEdit'][0]['NoiDung']; ?></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="update">Sửa bài viết</button>
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
</script>
