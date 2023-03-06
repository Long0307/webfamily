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
                                  <?php
                                    if(isset($data['success'])){
                                        echo $data['success']['success'];
                                    }

                                  ?>
                                 <form action="" method="post" enctype="multipart/form-data">
                                 
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Thêm thể loại sản phẩm</label>
                                    <input type="text" class="form-control border rounded" name="theloai" id="formGroupExampleInput2" placeholder="  Nhập thể loại sản phẩm">
                                <?php                                
                                    if(isset($data['err_theloai'])){
                                        echo $data['err_theloai'];
                                    } 
                                ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="add">Thêm danh mục</button>
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

