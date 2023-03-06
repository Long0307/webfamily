
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
              <?php
                // print_r($data['detailOrder']);
              ?>
              <form>
              <fieldset disabled>
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Thời gian</label>
                  <input type="text" value="<?php echo $data['detailOrder'][0]['Created_time']; ?>" id="disabledTextInput" class="form-control">
                </div>
                 <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Tên khách hàng</label>
                  <input type="text" value="<?php echo $data['detailOrder'][0]['HoVaTen']; ?>" id="disabledTextInput" class="form-control">
                </div>
                 <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Số điện thoại</label>
                  <input type="text" value="<?php echo $data['detailOrder'][0]['SoDienThoai']; ?>" id="disabledTextInput" class="form-control">
                </div>
                 <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Địa chỉ</label>
                  <input type="text" value="<?php echo $data['detailOrder'][0]['DiaChi']; ?>" id="disabledTextInput" class="form-control">
                </div>
                 <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Tổng tiền</label>
                  <input type="text" value="<?php echo $data['detailOrder'][0]['TongTien']; ?>" id="disabledTextInput" class="form-control">
                </div>
                <label for="disabledTextInput" class="form-label">Đồ đã mua:</label>
                <?php
                  foreach ($data['detailOrder'] as $key => $value) {
                    ?>
                      <p><span><?php echo $value['Tensp'] ?> * <?php echo $value['SoLuong'] ?> = <?php echo number_format($value['DonGia'], 0, '', ',')." VNĐ"; ?></span></p>
                    <?php
                  }
                ?>
                
                <div class="mb-3">
                  <label for="disabledTextInput" class="form-label">Note</label>
                  <textarea name="content" id="disabledTextInput" class="form-control"><?php echo $data['detailOrder'][0]['Note']; ?></textarea>
                </div>
              </fieldset>
              <a href="index.php?controller=order" class="btn btn-primary">Quay lại</a>
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