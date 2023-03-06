
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
                <h2>LOGO WEBSITE</h2>
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

                      if($data['selectOne'][0][5] == ""){
                        ?>
                        <?php
                      }else{
                        ?>
                          <img src="../../uploads/<?php echo $data['selectOne'][0][5]; ?>" style="width:100px;height:100px;" alt="">
                        <?php
                      }
                      if(isset($data['error'])){
                        echo $data['error']['image'];
                      }
                    ?>
                    
                  </div>
                  <button class="btn btn-primary float-end" type="submit" name="save" style="margin-left: 10px;">Lưu</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</section>
