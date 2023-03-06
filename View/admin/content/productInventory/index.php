<!-- #Top Bar -->

<style type="text/css">
  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the image and position the close button */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 12; /* Sit on top */
    left: 0;
    top: 0; 
    width: 100%; /* Full width */
    height: 100vh; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    border: 1px solid #888;
    width: 94%;
  }

  /* The Close Button (x) */
  .close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: red;
    cursor: pointer;
  }

  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
  }

  @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
    .cancelbtn {
      width: 100%;
    }
  }
</style> 
<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header" style="padding:10px 20px;">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <h2>Nhập kho sản phẩm</h2>
              </div>
              <?php if (getPath('index.php?controller=productInventory&action=add')) { ?>
              <div class="col-sm-6 col-xs-12">
               <button type="button" class="btn btn-success col-sm-4 float-end" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="fas fa-plus"></i>  Thêm phiếu nhập kho</button>
             </div>
             <?php } ?>
           </div>
         </div>

         <div class="body">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <form action="" method="post" accept-charset="utf-8">
                  <div class="row">
                    <input type='date' class="form-control" name="date" style="width:200px;margin-left:10px;"/>
                    <button type="submit" class="btn btn-danger" name="search" style="width:100px;margin-left:10px;">Search</button>
                    </div>
                </form>
<?php echo "Tổng số: "."<strong>".$total = count($data['selectAllImportPro'])." phiếu nhập kho</strong>"; ?>
             </div>
           </div>

          <div class="row">
            <div class="container">
              <?php
                if(isset($data['success'])){
                  echo $data['success'];
                }
              ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Mã Phiếu</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Tổng cộng</th>
                    <th scope="col">Hành động</th>
                  </tr>
                </thead>
                <tbody>
              <?php
               if(isset($data['search'])){
                $i = 0;
                foreach($data['search'] as $value) {
                  $i++;
                  ?>
                    <tr id="load_<?php echo $value[0]; ?>">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $value['NgayNhap']; ?></td>
                        <td><?php echo $value['TongTienNhap']; ?></td>
                        <td>
                          <?php if (getPath('index.php?controller=productInventory&action=info&id=0')) { ?>
                          <a href="../../admin/productInventory/info/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['NgayNhap']).".html"; ?>" class="btn btn-primary">Chi tiết</a>
                          <?php } ?>
                          <?php if (getPath('index.php?controller=productInventory&action=delete&id=0')) { ?>
                          <a onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</a>
                          <?php } ?>
                        </td>
                      </tr>
                  <?php
                }
              }else{
                if(!isset($_GET['trang'])){
                    $i = 0;
                    foreach($data['selectImportPro'] as $value) {
                      $i++;
                      ?>
                      <tr id="load_<?php echo $value[0]; ?>">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $value['NgayNhap']; ?></td>
                        <td><?php echo $value['TongTienNhap']; ?></td>
                        <td>
                          <?php if (getPath('index.php?controller=productInventory&action=info&id=0')) { ?>
                          <a href="../../admin/productInventory/info/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['NgayNhap']).".html"; ?>" class="btn btn-primary">Chi tiết</a>
                          <?php } ?>
                          <?php if (getPath('index.php?controller=productInventory&action=delete&id=0')) { ?>
                          <a onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php
                    }
                  }else{
                    $i = 0;
                    foreach($data['pagiImportPro'] as $value) {
                      $i++;
                      ?>  
                      <tr id="load_<?php echo $value[0]; ?>">
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $value['NgayNhap']; ?></td>
                        <td><?php echo $value['TongTienNhap']; ?></td>
                        <td>
                          <?php if (getPath('index.php?controller=productInventory&action=info&id=0')) { ?>
                          <a href="../../admin/productInventory/info/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['NgayNhap']).".html"; ?>" class="btn btn-primary">Chi tiết</a>
                          <?php } ?>
                          <?php if (getPath('index.php?controller=productInventory&action=delete&id=0')) { ?>
                          <a onclick="check(<?php echo $value[0]; ?>);" class="btn btn-danger" style="margin-left: 10px;">Xoá</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php
                    }
                  }
                }
                  ?>
                </tbody>
              </table>
               <script>
                function check(id){

                    const swalWithBootstrapButtons = Swal.mixin({
                      customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                      },
                      buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({ 
                      title: 'Bạn có chắc chắn muốn xoá không?',
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonText: 'Có, tôi đồng ý!',
                      cancelButtonText: 'Không, thoát!',
                      reverseButtons: true
                    }).then((result) => {

                      if (result.value) {
                        $.get('index.php?controller=productInventory&action=delete&id='+id, function(data) {
                          if(data){
                            $("tr#load_"+id).load(window.location.href+" tr#load_"+id+" > *");
                            sleep(1);
                            swalWithBootstrapButtons.fire(
                              'Deleted!',
                              'Your file has been deleted.',
                              'success'
                              )
                          }
                        });
                      }
                    })
                  }
          </script>
               <style>
                .pagination-style-three a { 
                  padding: 5px 15px; 
                  background: #ffffff; 
                  color: #ff6407; 
                  border-radius: 25px;
                  box-shadow: 0px 5px 10px 0px rgba(0,0,0,.1);
                  margin: 0px 5px;
                }

                .pagination-style-three a.selected, .pagination-style-three a:hover, .pagination-style-three a:active, .pagination-style-three a:focus { background: #ff6407;color: white; }

              </style>
              <div class="pagination pagination-style-three m-t-20"> 
                <?php
                $total = count($data['selectAllImportPro']);
                $a = ceil($total/5);
                if(isset($_GET['trang'])){
                  if($_GET['trang'] < 2){
                    echo "";
                  }else{
                    echo '<a class="page-link" href="../../admin/productInventory&page='.($_GET['trang']-1).'">Prev</a>';
                  }

                  echo '<a class="page-link" href="../../admin/productInventory&page=1">Trand đầu</a>';

                  if(($_GET['trang'] - 3) > 0){
                    for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

                      if(($b > $b - 3) && ($b < $b + 3)){
                        if($b > $a) {
                          break;
                        }
                        echo '<a class="page-link" href="../../admin/productInventory&page='.$b.'">'.$b.'</a>';
                      }

                    }
                  }
                  else{

                    for($b = 1; $b <= $a;$b++){

                      if(($b > $b - 3) && ($b < $b + 3)){
                        echo '<a class="page-link" href="../../admin/productInventory&page='.$b.'">'.$b.'</a>';
                      }

                    }
                  }

                  echo '<a class="page-link" href="../../admin/productInventory&page='.$a.'">Trang cuối</a>';

                  if(isset($_GET['trang'])){
                    if($_GET['trang'] < ($a - 2)){
                      echo '<a class="page-link" href="../../admin/productInventory&page='.($_GET['trang']+1).'">Next</a>';
                    }
                  }

                }else{
                  for($b = 1; $b <= $a;$b++){

                    if(($b > $b - 3) && ($b < $b + 3)){
                      echo '<a class="page-link" href="../../admin/productInventory&page='.$b.'">'.$b.'</a>';
                    }

                  }

                  echo '<a class="page-link" href="../../admin/productInventory&page=2">Next</a>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</section>

<div id="id01" class="modal">

  <from class="modal-content animate col-md-12" action="" method="post">
    <div class="imgcontainer">
      <span onclick="Back();" class="close" title="Close Modal">&times;</span>
      <h2>Thêm phiếu nhập</h2>
    </div>

    <div class="container col-md-12">
      <br>
      <p>Thêm phiếu thành công</p>
      <div class="row">
        <h5 class="col-md-9">Chi tiết hoá đơn</h5>
        <h5 class="col-md-3">Tổng cộng: <span id="subtotal">0</span>đ</h5>
      </div>
      <table class="table table-striped col-md-12">
        <thead>
          <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá nhập</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id="tbody">
         <tr id="rowBook-4">
          <input type="hidden" name="masanpham" id="masanpham-4" value="0" style="width: 50px;">
          <input type="hidden" name="dongia" id="dongia-4" value="0" style="width: 50px;">

          <td id="idsanpham-4">  

          </td>
          <td id="tensanpham-4">  

            <button type="button" style="width: 150px;" id="chonsanpham-4" onclick="ham(4)" class="btn btn-success">Chọn sản phẩm</button>
          </td>
          <td id="theloai-4">  

          </td>
          <td>  
            <img src="" id="hinhanh-4" width="70px" height="50px" style="display: none;" alt="">
          </td>
          <td>  
           <input type="number" placeholder="" value="0" id="soluong-4" style="width:80px;" name="soluong" onchange="total(4)" required>
         </td>
         <td id="gianhap-4">  

         </td>
         
         <td id="tongtien-4">  

         </td>
         <td>  
          <i class="fas fa-minus-circle" onclick="deleteBook(4)" id="delete-row-4" style="color:red;"></i>
        </td>
      </tr>
    </tbody>
  </table>
  <button type="button" style="width: 150px;" id="addBook" class="btn btn-success"><i class="fas fa-plus"></i>   Thêm sản phẩm    (<span id="click">9</span>)</button>
</div>

<div class="container" style="background-color:#f1f1f1">
  <div class="row">
    <button type="button" onclick="Back();" class="btn btn-danger float-md-left col-md-2">Thoát</button>
    <button type="button" onclick="create();" style="display: none;" class="btn btn-success col-md-2 float-md-right create">Tạo</button>
  </div>
</div>
</form>
</div><div id="id4" class="modal">

  <form class="modal-content animate col-md-6" action="" method="post" style="margin:0 auto auto auto;width: 50%;">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id4').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h2>CHỌN SẢN PHẨM</h2>
    </div>

    <div class="container booksach">

      <label for="uname"><b>Sản phẩm</b></label>

      <label for="uname"><b>Mã sản phẩm</b></label>
      <select class="js-example-basic-single form-control" style="width: 100%;" name="option-cus-4"  id="option-cus-4" required>
        <option value="0">---Chọn---</option>
        <?php
        foreach($data['selectAll'] as $value) {
          ?>
          <option value="<?php echo $value['ID']; ?>">Mã sản phẩm: <?php echo $value['ID']; ?>, Tên sản phẩm: <?php echo $value['Tensp']; ?>
        </option>
        <?php
      }
      ?>
    </select>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id4').style.display='none'" class="btn btn-danger col-md-2">Cancel</button>
    <button type="button" id="confirmBook_4" onclick="selectBook(4);" class="btn btn-success col-md-2" name="addTable">Thêm</button>
  </div>
</form>

</div>



<?php

for($i = 5;$i <= 13;$i++){
  ?>
  <div id="id<?php echo $i; ?>" class="modal">

    <form class="modal-content animate col-md-6" action="" method="post" style="margin:0 auto auto auto;width: 50%;">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id<?php echo $i; ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
        <h2>CHỌN SẢN PHẨM</h2>
      </div>

      <div class="container booksach">

        <label for="uname"><b>Sản phẩm</b></label>

        <label for="uname"><b>Mã sản phẩm</b></label>
        <select class="js-example-basic-single form-control" style="width: 100%;" name="option-cus-<?php echo $i; ?>"  id="option-cus-<?php echo $i; ?>" required>
          <option value="0">---Chọn---</option>
          <?php
          foreach($data['selectAll'] as $value) {
            ?>
            <option value="<?php echo $value['ID']; ?>">Mã sản phẩm: <?php echo $value['ID']; ?>, Tên sản phẩm: <?php echo $value['Tensp']; ?> 
          </option>
          <?php
        }
        ?>
      </select>

    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id<?php echo $i; ?>').style.display='none'" class="btn btn-danger col-md-2">Cancel</button>
      <button type="button" id="confirmBook_<?php echo $i; ?>" onclick="selectBook(<?php echo $i; ?>);" class="btn btn-success col-md-2" name="addTable">Thêm</button>
    </div>
  </form>

</div>
<script>
  $(document).ready(function() {
    $('#option-cus-4').select2();
    $('#option-cus-<?php echo $i; ?>').select2();
  });

        // Get the modal
        var modal = document.getElementById('id<?php echo $i; ?>');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
      </script>
      <?php
    }
    ?>

    <script type="text/javascript">

      var ktrasp = [];

      function selectBook(id){
        masanpham = $('select#option-cus-'+id).val();

        if(ktrasp.includes(masanpham) == true){

          Swal.fire({
            title: 'Bạn đã chọn sản phẩm này bạn không được chọn lại',
            showClass: {
              popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
              popup: 'animate__animated animate__fadeOutUp'
            }
          })

        }else{

          $.post("../../ajax/admin/loadAddPro.php",{ 'masanpham':masanpham },function(data){

            item = data.split("+");

            $("#masanpham-"+id).val(item[0]);
            $("#dongia-"+id).val(item[5]);

            $("#idsanpham-"+id).text(item[0]);
            $("#tensanpham-"+id).text(item[1]);
            $("#theloai-"+id).text(item[2]);
            $("#hinhanh-"+id).attr("src", "../../uploads/"+item[3]).css('display', 'block');;
            $("#gianhap-"+id).text(item[4]);

          });
          ktrasp.push(masanpham);

          console.log(ktrasp);
          document.getElementById('id'+id).style.display='none';
        }


      }

      function ham(id){
        document.getElementById('id'+id).style.display='block';
      }

      var none = "none";
      var $solanClick = Number($("#click").text());
      var click = 9;
      var Ochonsach = 4; 

      $("#addBook").click(function(event) {
        if($solanClick > 0){

          click--;
          Ochonsach++;
          $solanClick = click;

          $("#click").text($solanClick);

          $( "#tbody" )
          .append( 
            "<tr id='rowBook-"+Ochonsach+"'>"+"<input type='hidden' name='masanpham' id='masanpham-"+Ochonsach+"' value='0' style='width: 50px;'>"
            +"<input type='hidden' name='dongia' id='dongia-"+Ochonsach+"' value='0' style='width: 50px;'>"
            +"<td id='idsanpham-"+Ochonsach+"'>"+"</td>"
            +"<td id='tensanpham-"+Ochonsach+"'>"+  
            "<button type='button' style='width: 150px;' id='chonsanpham-"+Ochonsach+"' onclick='ham("+Ochonsach+")' class='btn btn-success'>Chọn sản phẩm</button>"
            +"</td>"
            +"<td id='theloai-"+Ochonsach+"'>"+"</td>"
            +"<td>"+"<img href='' alt='' width='70px' id='hinhanh-"+Ochonsach+"' style='display: none;' height='50px'>"+"</td>"
            +"<td>"  
            +"<input type='number' placeholder='' value='0' id='soluong-"+Ochonsach+"' onchange='total("+Ochonsach+")'' style='width:80px;' name='soluong' onchange='' required>"
            +"</td>"
            +"<td id='gianhap-"+Ochonsach+"'>"+"</td>"
            +"<td id='tongtien-"+Ochonsach+"'>"+"</td>"
            +"<td>"   
            +"<i class='fas fa-minus-circle' onclick='deleteBook("+Ochonsach+")' id='delete-row-"+Ochonsach+"' style='color:red;'></i>"
            +"</td>"
            +"</tr>" );

        }
      });
      function total(id){

        soluong = $('#soluong-'+id).val();

        masanpham = $('#masanpham-'+id).val();

        dongia = $('#dongia-'+id).val();

        $.post("../../ajax/admin/loadTotalAddPro.php",{ 'masanpham':masanpham,'soluong':soluong,'dongia':dongia },function(data){


          $("#tongtien-"+id).text(data);

        });

        $.post("../../ajax/admin/thanhtoan.php",function(data){

          $("#subtotal").text('');

          $("#subtotal").text(data); 

          $(".create").css("display","block");

        });

      }

      function create(){

    $.post("../../ajax/admin/createphieunhap.php",function(data){

      if(data){

        Swal.fire({
          icon: 'success',
          title: 'Thêm thành công',
          showConfirmButton: false,
          footer: '<a href="index.php?controller=phieunhapsach">Thoát</a>'
        })

        Swal.fire('Cảm ơn quý khách đã mua hàng', '', 'success');

      }

    });
  } 

  function Back(){

   $.post("../../ajax/admin/backphieunhap.php",function(data){

    document.getElementById('id01').style.display='none';

    window.location.href = window.location.href;

  });
 }

   function deleteBook(id){

    masanpham = $('#masanpham-'+id).val();
    for( var i = 0; i < ktrasp.length; i++){ 
     if ( ktrasp[i] == masanpham) {
       ktrasp.splice(i, 1); 
     }
   }

   $.post("../../ajax/admin/deleteBookPhieuNhapSach.php",{ 'masanpham':masanpham },function(data){

    $("#rowBook-"+id).remove();


  }); 

    $("#rowBook-"+id).remove();

 }
</script>
