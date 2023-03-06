    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>THÊM THÀNH VIÊN</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="container">
                                <?php
                                  if(isset($data['success'])){
                                    echo $data['success']['updatesuccess'];
                                  }
                                ?>
                                 <form action="" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="formGroupExampleInput">Avatar thành viên (bắt buộc)</label>
                                    <input type="file" value="<?php echo $data['selectOne'][0]['HinhAnh']; ?>" class="form-control" name="hinhanh" id="formGroupExampleInput" placeholder="Example input">
                                    <img src="../../public/logo/<?php echo $data['selectOne'][0]['HinhAnh']; ?>" width="100px" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Tên đăng nhập</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['TenDangNhap']; ?>" class="form-control border rounded" name="username" id="formGroupExampleInput2" placeholder="  Nhập tên đăng nhập">
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Họ và tên</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['HoVaTen']; ?>" class="form-control border rounded" name="fullname" id="formGroupExampleInput2" placeholder="  Nhập họ và tên">
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Email</label>
                                    <input type="email" value="<?php echo $data['selectOne'][0]['Email']; ?>" class="form-control border rounded" name="email" id="formGroupExampleInput2" placeholder="  Nhập email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="editmember" id="editmember">Lưu thành viên</button>
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

