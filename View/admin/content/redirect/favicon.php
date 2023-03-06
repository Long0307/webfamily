
<!-- #Top Bar -->

<script src="../../public/Admin/templateAdmin/plugins/ckeditor/ckeditor.js"></script>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="row clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="header">
                <div class="row clearfix">
                  <div class="col-xs-12 col-sm-6">
                    <h2>FAVICON WEBSITE</h2>
                  </div>
                </div>
              </div>
              <div class="body">
                <div class="row">
                  <div class="container">
                    <form action="" method="post" enctype="multipart/form-data"> 
                      <div class="form-group">
                        <label for="formGroupExampleInput"><b>Logo website (bắt buộc)</b></label>
                        <input type="file" class="form-control border rounded" name="image" id="formGroupExampleInput" placeholder=" ">
                        <?php  

                        if($data['selectOne'][0]['favicon_customer'] == ""){
                          ?>
                          <?php
                        }else{
                          ?>
                          <img src="../../View/customer/inc/<?php echo $data['selectOne'][0]['favicon_customer']; ?>" style="width:100px;height:100px;" alt="">
                          <?php
                        }
                        if(isset($data['error'])){
                          echo $data['error']['image'];
                        }
                        ?>

                      </div>
                      <button class="btn btn-primary float-end" type="submit" name="save_favicon_customer" style="margin-left: 10px;">Lưu</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
       <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="header">
              <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                  <h2>FAVICON ADMIN</h2>
                </div>
              </div>
            </div>
            <div class="body">
              <div class="row">
                <div class="container">
                  <form action="" method="post" enctype="multipart/form-data"> 
                    <div class="form-group">
                      <label for="formGroupExampleInput"><b>Logo website (bắt buộc)</b></label>
                      <input type="file" class="form-control border rounded" name="image" id="formGroupExampleInput" placeholder=" ">
                      <?php  

                      if($data['selectOne'][0]['favicon_admin_page'] == ""){
                        ?>
                        <?php
                      }else{
                        ?>
                        <img src="../../View/admin/inc/<?php echo $data['selectOne'][0]['favicon_admin_page']; ?>" style="width:100px;height:100px;" alt="">
                        <?php
                      }
                      if(isset($data['error'])){
                        echo $data['error']['image'];
                      }
                      ?>  

                    </div>
                    <button class="btn btn-primary float-end" type="submit" name="save_favicon_admin" style="margin-left: 10px;">Lưu</button>
                  </form>
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
