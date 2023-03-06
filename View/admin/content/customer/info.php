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

                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Hình ảnh sản phẩm</label>
                                    <input type="file" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                    <?php
                                        if($data['selectOne'][0]['avatar'] == ""){
                                            ?>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="100px;" class="d-block ui-w-80">
                                            <?php
                                        }else{
                                            ?>
                                                <img src="../../public/avatar_customer/<?php echo $data['selectOne'][0]['avatar']; ?>"  width="100px" alt="">  
                                            <?php
                                        }
                                    ?>     
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Tên khách hàng</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['name']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập">
                                </div>
                                
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Tên tài khoản</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['username']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập">
                                </div>

                                 <div class="form-group">
                                    <label for="formGroupExampleInput2">Email</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['email']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Số điện thoại</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['phone']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập">
                                </div>

                                <div class="form-group">
                                <label class="form-label mr-3">Gender</label> 

                                <?php
                                    if($data['selectOne'][0]['gender'] == 1){
                                    ?>  
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" checked>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="3">
                                        <label class="form-check-label" for="inlineRadio2">Other</label>
                                        </div>
                                    <?php
                                    }else if($data['selectOne'][0]['gender'] == 2){
                                        ?>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" checked>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="3">
                                        <label class="form-check-label" for="inlineRadio2">Other</label>
                                        </div>
                                    <?php
                                    }else{
                                    ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="3" checked>
                                        <label class="form-check-label" for="inlineRadio2">Other</label>
                                    </div>
                                    <?php
                                    }
                                ?>

                                </div>

                                <div class="form-group">
                                    <label class="form-label">Date of birth</label>
                                    <input type="text" value="<?php echo $data['selectOne'][0]['dateofbirth']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập">
                                </div>
                                
                                <?php
                                    (int) $address = 1;
                                    foreach ($data['selectOne'] as $key => $value) {
                                        ?>
                                            <div class="row">
                                                <div class="col-md-7">  
                                                    <div class="form-group">    
                                                        <label for="formGroupExampleInput2">Địa chỉ <?php echo $address; ?>:
                                                        <?php
                                                            if($value['nameforaddress'] == 1){
                                                                echo "<span class='text-success'>Văn phòng</span>";
                                                            }else{
                                                                echo "<span class='text-success'>Nhà riêng</span>";
                                                            }
                                                            if($value['setdefault'] == 1){
                                                                echo '  <button type="button" class="btn btn-outline-warning p-1" style="margin-top: -16px;">Default</button>';
                                                            }
                                                        ?>
                                                        </label>
                                                        <input type="text" value="<?php echo $value['addressgetproduct'].", "
                                                        .$value['wards'].", "
                                                        .$value['district'].", "
                                                        .$value['city'].", "; ?>" 
                                                        class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">        
                                                        <label for="formGroupExampleInput2">Tên người nhận</label>
                                                        <input type="text" value="<?php echo $value['fullname']; ?>" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        $address++;
                                    }
                                ?>

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

