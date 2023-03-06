<script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CẬP NHẬT THÔNG TIN</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="container">
                                 <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Thêm tiều đề<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control border rounded" value="<?php echo $data['showwEdit'][0]['TieuDe']; ?>" name="title" id="formGroupExampleInput2" placeholder="  Nhập tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Mô tả<span class="text-danger"> *</span></label>
                                    <textarea name="content"><?php echo $data['showwEdit'][0]['MoTa']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Meta Tag Title<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control border rounded" value="<?php echo $data['showwEdit'][0]['TieuDeMeta']; ?>" name="meta_tag_title" id="formGroupExampleInput2" placeholder="  Meta Tag Title">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Meta Tag Description</label>
                                    <input type="text" class="form-control border rounded" value="<?php echo $data['showwEdit'][0]['MoTaMeta']; ?>" name="meta_tag_desc" id="formGroupExampleInput2" placeholder="  Meta Tag Description">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Meta Tag Keywords</label>
                                    <input type="text" class="form-control border rounded" value="<?php echo $data['showwEdit'][0]['TuKhoaMeta']; ?>" name="meta_tag_keywords" id="formGroupExampleInput2" placeholder="  Meta Tag Keywords">
                                </div>
                                <div class="form-check my-0">
                                    <input class="form-check-input" type="checkbox" 
                                    <?php if($data['showwEdit'][0]['status'] == 1){
                                        echo "checked";
                                    }?> 
                                    id="defaultCheck2" name="showfooter">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Hiển thị ở cuối trang
                                    </label>
                                </div></br>
                                <div class="form-group">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status" value="<?php echo $data['showwEdit'][0]['status']; ?>">
                                    <?php
                                        if($data['showwEdit'][0]['status'] == 1){
                                            ?>
                                                <option value="1" selected>Bật</option>
                                                <option value="0">Tắt</option>
                                            <?php
                                        }else{
                                            ?>
                                                <option value="1">Bật</option>
                                                <option value="0" selected>Tắt</option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                </div><div class="form-group">
                                    <label for="formGroupExampleInput2">Thứ tự</label>
                                    <input type="text" class="form-control border rounded" name="number" value="<?php echo $data['showwEdit'][0]['ThuTu']; ?>" id="formGroupExampleInput2" placeholder="  Thứ tự">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="updateinfo">Sửa</button>
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
//  editor.on( 'required', function( evt ) {
//     editor.showNotification( 'Mô tả phải lớn hơn 3 ký tự!.', 'warning' );
//     evt.cancel();
// } );
</script>
