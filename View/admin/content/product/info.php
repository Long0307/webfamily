
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
                <h2>CHI TIẾT SẢN PHẨM</h2>
              </div>
            </div>
          </div>
          <div class="body">
            <div class="row">
              <form>
              <fieldset disabled>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Tên sản phẩm</label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['Tensp']; ?>" id="disabledTextInput" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Danh mục sản phẩm</label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['TenDanhMuc']; ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Hình ảnh sản phẩm</label>
                  <input type="file" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                  <img src="../../uploads/<?php echo $data['selectJoin2Where'][0]['HinhAnhSP']; ?>"  width="100px;height:100px;" alt="">       
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Giá</label>
                  <input type="text" value="<?php echo number_format($data['selectJoin2Where'][0]['Gia'], 0, '', ',')." VNĐ"; ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Năm sản xuất</label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['NhaSanXuat']; ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Chất liệu</label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['ChatLieu']; ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Xuất xứ</label>
                  <input type="text" value="<?php echo $data['selectJoin2Where'][0]['XuatXu']; ?>" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                </div>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Chi tiết sản phẩm</label>
                  <textarea name="content" id="disabledTextInput" class="form-control"><?php echo $data['selectJoin2Where'][0]['ThongTinSP']; ?></textarea>
                </div>
              </fieldset>
              <a href="index.php?controller=product" class="btn btn-primary">Quay lại</a>
            </form>
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