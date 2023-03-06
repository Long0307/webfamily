    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>THÊM DANH MỤC SẢN PHẢM</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="container">
                                
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Tên khách hàng</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['TenKhachHang']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                </div>

                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Email</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['Email']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Ngày gửi</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['Created_time']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                </div>

                                <div class="mb-3">
                                  <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $data['selectOne'][0]['NoiDung']; ?></textarea>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <a href="index.php?controller=contact" class="btn btn-primary">Quay lại</a>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</div>
</section>

