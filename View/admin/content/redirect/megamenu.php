<!-- Datatable CSS -->
<link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>EDIT MEGA MENU</h2>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="container-fluid">
                            <div class="row clearfix">
                                <!-- Table -->
                            <table border="1" cellspacing="0" cellpadding="5">
                                <tr>
                                    <td><strong>Chuyên mục</strong></td>
                                </tr>
                            </table>
                                <table id='empTable' class='display dataTable'>
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check" style="padding-left: 0px;">
                                                    <input class="form-check-input" type="checkbox" name="home" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    </label>
                                                </div>
                                            </th>
                                            <th>STT</th>
                                            <th>Danh mục</th>
                                            <th>chỉnh sửa đường dẫn</th>
                                            <th>Module</th>
                                            <th>Trang chủ</th>
                                            <th>Hiển thị</th>
                                            <th>Tiếng Việt</th>
                                            <th>Tiếng Anh</th>
                                            <th>Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($data['recursive'] as $key => $value) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check" style="padding-left: 0px;">
                                                            <input class="form-check-input" type="checkbox" name="home_<?php echo $value['id']; ?>" value="" id="defaultCheck1_<?php echo $value['id']; ?>">
                                                            <label class="form-check-label" for="defaultCheck1_<?php echo $value['id']; ?>">
                                                            </label>
                                                            </div>
                                                        </td>
                                                        <td><div class="form-check" style="padding-left: 0px;">
                                                            <input type="number" style="width: 70px;" name="position_<?php echo $value['id']; ?>" value="<?php echo $value['id']; ?>" width="50px" id="defaultCheck1_<?php echo $value['id']; ?>">
                                                            <label class="form-check-label" for="defaultCheck1_<?php echo $value['id']; ?>">
                                                            </label>
                                                            </div></td>
                                                        <td><?php echo $value['name'] ?></td>
                                                        <td><?php echo $value['link'] ?></td>
                                                        <td>
                                                            phùng HỮu Long
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="home_<?php echo $value['id']; ?>" value="" id="defaultCheck1_<?php echo $value['id']; ?>">
                                                            <label class="form-check-label" for="defaultCheck1_<?php echo $value['id']; ?>">
                                                            </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" name="show_<?php echo $value['id']; ?>" id="show_<?php echo $value['id']; ?>">
                                                                <label class="form-check-label" for="show_<?php echo $value['id']; ?>">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $value['Vietnam'] ?></td>
                                                        <td><?php echo $value['English'] ?></td>
                                                        <td> <button type="submit" class="btn btn-success">Sửa</button> 
                                                        | <button type="submit" class="btn btn-danger">Xoá</button> 
                                                    </td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        var table = $('#empTable').DataTable({
            responsive: true,
        }); 
    });
</script>
</section>  