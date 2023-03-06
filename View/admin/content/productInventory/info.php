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
    margin: 5% auto 15% 17%;
    border: 1px solid #888;
    width: 82%;
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

<from class="modal-content animate col-md-12" action="" method="post">
  <div class="imgcontainer">
    <h2>Chi tiết phiếu nhập</h2>
  </div>

  <div class="container col-md-12">
    <br>
    <h5 class="col-md-9">Chi tiết hoá đơn</h5>
    <table class="table table-striped col-md-12">
      <thead>
        <tr>
          <th scope="col">Mã sản phẩm</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Giá nhập</th>
          <th scope="col">Tổng tiền</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <?php
        $total = 0;
        foreach ($data['detailOrder'] as $key => $value) {
          $total += $value['TongTien'];
          ?>
          <tr id="rowBook-4">
            <td id="idsanpham-4">  
              <?php echo $value[0]; ?>
            </td>
            <td id="tensanpham-4">  
              <?php echo $value['Tensp']; ?>
            </td>
            <td>  
              <img src="../../uploads/<?php echo $value['HinhAnhSP']; ?>" id="hinhanh-4" width="70px" height="50px" alt="">
            </td>
            <td>  
              <?php echo $value['SoLuongNhap']; ?>
            </td>
            <td id="gianhap-4">  
              <?php echo $value['GiaNhap']; ?>
            </td>

            <td id="tongtien-4">  
              <?php echo number_format($value['TongTien'], 0, '', ',')." VNĐ"; ?>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
     <div class="row">
      <h5 class="col-md-3">Tổng cộng: <span id="subtotal"><?php echo number_format($total, 0, '', ',')." VNĐ"; ?></span></h5>
    </div>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <div class="row">
      <a href="index.php?controller=productInventory" onclick="Back();" class="btn btn-danger float-md-left col-md-2">Trở lại</a>
    </div>
  </div>

</from> 