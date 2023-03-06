    <section class="content">
      <div class="container-fluid">
        <div class="row clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="header">
                <div class="row clearfix">
                  <div class="col-xs-12 col-sm-6">
                    <h2>PHÂN QUYỀN QUẢN TRỊ</h2>
                  </div>
                </div>
              </div>
              <div class="body">
                <div class="row">
                  <div class="container">
                   <form id="editing-form" method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>" />
                    <?php
                    foreach($data['selectAllGroup'] as $group) {
                      ?>
                      <div class="card">
                        <h5 class="card-header"><?php echo $group['TenNhomQuyen']; ?></h5>
                        <div class="card-body">
                          <div class="row">
                           <?php
                           foreach($data['selectAllItemGroup'] as $item) {
                              if($item['MaNhomQuyen'] == $group['ID']){
                            ?>
                            <div class="form-check col-md-2">
                              <input class="form-check-input" type="checkbox"
                              <?php if(in_array($item['ID'], $data['currentPrivilegeList'])){ ?> 
                              checked=""    
                              <?php } ?>
                              value="<?php echo $item['ID']; ?>" name="privileges[]" id="flexCheckChecked_<?php echo $item['ID']; ?>">
                              <label class="form-check-label" for="flexCheckChecked_<?php echo $item['ID']; ?>">
                                <?php echo $item['TenQuyen']; ?>
                              </label>
                            </div>
                            <?php
                          }
                        }
                          ?>
                        </div>    
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                  <button type="submit" class="btn btn-primary" name="savemember">Lưu thành viên</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

