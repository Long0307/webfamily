    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ĐỔI MẬT KHẨU</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <?php
                    if(isset($data['success'])){
                        echo $data['success'];
                    }
                    if(isset($data['error'])){
                        echo $data['error'];
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="formGroupExampleInput2">Tên đăng nhập</label>
                    <input type="text" class="form-control border rounded" name="username" id="formGroupExampleInput2" placeholder="  Nhập tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Mật khẩu cũ</label>
                    <input type="password" class="form-control border rounded" name="password_old" id="formGroupExampleInput2" placeholder="  Nhập mật khẩu cũ">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Mật khẩu mới</label>
                    <input type="password" class="form-control border rounded" name="password_new" id="formGroupExampleInput2" placeholder="  Nhập mật khẩu mới">
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="editmember" id="editmember">Lưu thành viên</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

