<script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>THÊM THÔNG TIN</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="container">
                                 <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Thêm tiều đề<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control border rounded" name="title" id="formGroupExampleInput2" placeholder="  Nhập tiêu đề">
                                    <?php                                
                                        if(isset($data['error'])){
                                            echo $data['error']['err_title'];
                                        } 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Mô tả<span class="text-danger"> *</span></label>
                                    <textarea name="content"></textarea>
                                    <?php                                
                                        if(isset($data['error'])){
                                            echo $data['error']['err_content'];
                                        } 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Meta Tag Title<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control border rounded" name="meta_tag_title" id="formGroupExampleInput2" placeholder="  Meta Tag Title">
                                    <?php                                
                                        if(isset($data['error'])){
                                            echo $data['error']['err_meta_tag_title'];
                                        } 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Meta Tag Description</label>
                                    <input type="text" class="form-control border rounded" name="meta_tag_desc" id="formGroupExampleInput2" placeholder="  Meta Tag Description">
                                    <?php                                
                                        if(isset($data['error'])){
                                            echo $data['error']['nullhinhanh'];
                                        } 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Meta Tag Keywords   </label>
                                    <input type="text" class="form-control border rounded" name="meta_tag_keywords" id="formGroupExampleInput2" placeholder="  Meta Tag Keywords">
                                </div>
                                <div class="form-check my-0">
                                    <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="showfooter">
                                    <label class="form-check-label" for="defaultCheck2">
                                        Hiển thị ở cuối trang
                                    </label>
                                </div></br>
                                <div class="form-group">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                                        <option selected>Tình trạng</option>
                                        <option value="1">Bật</option>
                                        <option value="0">Tắt</option>
                                    </select>
                                </div>
                                </div><div class="form-group">
                                    <label for="formGroupExampleInput2">Thứ tự</label>
                                    <input type="text" class="form-control border rounded" name="number" id="formGroupExampleInput2" placeholder="  Thứ tự">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="saveinfo">Lưu</button>
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
