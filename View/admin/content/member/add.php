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
                             <?php
                                if(isset($data['success'])){
                                  
                                  echo $data['success']['success'];
                                  
                                }
                              ?>
                            <div class="row">
                                <div class="container">
                                 <form action="" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="formGroupExampleInput">Avatar thành viên (bắt buộc)</label>
                                    <input type="file" class="form-control" name="hinhanh" id="formGroupExampleInput" placeholder="Example input">
                                     <?php
                                      if(isset($data['error'])){
                                        
                                        echo $data['error']['nullhinhanh'];
                                        
                                      }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Tên đăng nhập</label>
                                    <input type="text" class="form-control border rounded" name="username" id="formGroupExampleInput2" placeholder="  Nhập tên đăng nhập">
                                    <?php
                                      if(isset($data['error'])){
                                        
                                        echo $data['error']['nullUsername'];
                                        
                                      }
                                    ?>
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Họ và tên</label>
                                    <input type="text" class="form-control border rounded" name="fullname" id="formGroupExampleInput2" placeholder="  Nhập họ và tên">
                                    <?php
                                      if(isset($data['error'])){
                                        
                                        echo $data['error']['nullfullname'];
                                        
                                      }
                                    ?>
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Mật khẩu</label>
                                    <input type="password" class="form-control border rounded" name="password" id="formGroupExampleInput2" placeholder="  Nhập mật khẩu">
                                    <?php
                                      if(isset($data['error'])){
                                        
                                        echo $data['error']['nullpassword'];
                                        
                                      }
                                    ?>
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control border rounded" name="password-repeat" id="formGroupExampleInput2" placeholder="  Nhập mật khẩu">
                                    <?php
                                      if(isset($data['error'])){
                                        
                                        echo $data['error']['nullpassword-repeat'];
                                        
                                      }
                                    ?>
                                </div>
                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Email</label>
                                    <input type="email" class="form-control border rounded" name="email" id="formGroupExampleInput2" placeholder="  Nhập email">
                                    <?php
                                      if(isset($data['error'])){
                                        
                                        echo $data['error']['nullemail'];
                                        
                                      }
                                    ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="add" id="addmember">Lưu thành viên</button>
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

