<?php

	if(!isset($_SESSION['current_user']) || !isset($_SESSION['current_info_user'])){

		header("location: ajax/customer/login.php");

	}

?>
<style>
body{
    background: #f5f5f5;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}


</style>
<div class="container light-style flex-grow-1 container-p-y" style="padding-top: 121px;">

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action" data-toggle="list" ><h4 class="font-weight-bold py-3 mb-4">
              Account settings
            </h4></a>
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">Profile</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Addresses</a>
            <!-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social links</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a> -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
              <form action="" method="post"  enctype="multipart/form-data">
              <div id="alert"></div>
              <div class="card-body media align-items-center">
                <?php
                  if($data['profile'][0]['avatar'] == ""){
                    ?>
                      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                    <?php
                  }else{
                    ?>
                    <img src="<?php echo "public/avatar_customer/".$data['profile'][0]['avatar']; ?>" alt="" class="d-block ui-w-80">
                    <?php
                  }
                ?>
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" class="account-settings-fileinput" name="avatar" id="avatar">
                  </label> &nbsp;

                  <div id="error-avatar"></div>

                  <button type="button" class="btn btn-default md-btn-flat">Reset</button>

                  <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                </div>
              </div>
              <hr class="border-light m-0">
              <?php
                if(isset($data['success'])){
                  echo $data['success'];
                }
              ?>

              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control mb-1" id="username" name="username" value="<?php echo $data['profile'][0]['username']; ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" id="user" name="user" value="<?php echo $data['profile'][0]['name']; ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" id="email" name="email" value="<?php echo $data['profile'][0]['email']; ?>">
                  <!-- <div class="alert alert-warning mt-3">
                    Your email is not confirmed. Please check your inbox.<br>
                    <a href="javascript:void(0)">Resend confirmation</a>
                  </div> -->
                </div>
                <div class="form-group">
                  <label class="form-label">Phone number</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $data['profile'][0]['phone']; ?>">
                </div>
                <div class="form-group">
                <label class="form-label mr-3">Gender</label>
                  <?php
                    if($data['profile'][0]['gender'] == 1){
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
                    }else if($data['profile'][0]['gender'] == 2){
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
                  <input type="text" class="form-control" id="birth" name="birth" value="<?php echo $data['profile'][0]['dateofbirth']; ?>">
                </div>
              </div>
              <div class="text-right mr-3 mb-3">
                <button type="button" name="update_info_user" onclick="return updateUser('update_info_user');" class="btn btn-primary">Save changes</button>
              </div>

              </form>
            </div>

<script>

function updateUser(update_info_user){

  var avatar = ""; 

  if($("input#avatar").prop('files').length == 0){

    var username = $("div#account-general input#username").val(); 
  
  var user = $("div#account-general input#user").val(); 

  var email = $("div#account-general input#email").val(); 

  var phone = $("div#account-general input#phone").val(); 

  var birth = $("div#account-general input#birth").val(); 

  if($("div#account-general input#inlineRadio1").is(':checked') == 1){

    var gender = 1;

    var file_data = avatar;   //Fetch the file
    var form_data = new FormData();
    form_data.append("file",file_data);
    form_data.append("username",username);
    form_data.append("user",user);
    form_data.append("email",email);
    form_data.append("phone",phone);
    form_data.append("gender",gender);
    form_data.append("birth",birth);
    form_data.append("update_info_user",update_info_user);
    //Ajax to send file to upload
    $.ajax({
        url: "/webfamily/profile.html",                      //Server api to receive the file
        type: "POST",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success:function(data){
          alert("Bạn đã sửa thông tin thành công");
          window.location.href = window.location.href;
        }
      });
    } else if ($("div#account-general input#inlineRadio2").is(':checked') == 1){

      var gender = 2;

      var file_data = $('#avatar').prop('files')[0];   //Fetch the file
      var form_data = new FormData();
      form_data.append("file",file_data);
      form_data.append("username",username);
      form_data.append("user",user);
      form_data.append("email",email);
      form_data.append("phone",phone);
      form_data.append("gender",gender);
      form_data.append("birth",birth);
      form_data.append("update_info_user",update_info_user);
      //Ajax to send file to upload
      $.ajax({
          url: "/webfamily/profile.html",                      //Server api to receive the file
          type: "POST",
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success:function(data){
            alert("Bạn đã sửa thông tin thành công");
            window.location.href = window.location.href;
          }
        });

    } else if ($("div#account-general input#inlineRadio3").is(':checked') == 1){

      var gender = 3;

      var file_data = $('#avatar').prop('files')[0];   //Fetch the file
      var form_data = new FormData();
      form_data.append("file",file_data);
      form_data.append("username",username);
      form_data.append("user",user);
      form_data.append("email",email);
      form_data.append("phone",phone);
      form_data.append("gender",gender);
      form_data.append("birth",birth);
      form_data.append("update_info_user",update_info_user);
      //Ajax to send file to upload
      $.ajax({
          url: "/webfamily/profile.html",                      //Server api to receive the file
          type: "POST",
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success:function(data){
            alert("Bạn đã sửa thông tin thành công");
            window.location.href = window.location.href;
          }
        });

    }

  }else{

  var username = $("div#account-general input#username").val(); 
  
  var user = $("div#account-general input#user").val(); 

  var email = $("div#account-general input#email").val(); 

  var phone = $("div#account-general input#phone").val(); 

  var birth = $("div#account-general input#birth").val(); 

  if($("div#account-general input#inlineRadio1").is(':checked') == 1){

    var gender = 1;

    var file_data = $('#avatar').prop('files')[0];   //Fetch the file
    var form_data = new FormData();
    form_data.append("file",file_data);
    form_data.append("username",username);
    form_data.append("user",user);
    form_data.append("email",email);
    form_data.append("phone",phone);
    form_data.append("gender",gender);
    form_data.append("birth",birth);
    form_data.append("update_info_user",update_info_user);
    //Ajax to send file to upload
    $.ajax({
        url: "/webfamily/profile.html",                      //Server api to receive the file
        type: "POST",
        dataType: 'script',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success:function(data){
          alert("Bạn đã sửa thông tin thành công");
          window.location.href = window.location.href;
        }
      });
    } else if ($("div#account-general input#inlineRadio2").is(':checked') == 1){

      var gender = 2;

      var file_data = $('#avatar').prop('files')[0];   //Fetch the file
      var form_data = new FormData();
      form_data.append("file",file_data);
      form_data.append("username",username);
      form_data.append("user",user);
      form_data.append("email",email);
      form_data.append("phone",phone);
      form_data.append("gender",gender);
      form_data.append("birth",birth);
      form_data.append("update_info_user",update_info_user);
      //Ajax to send file to upload
      $.ajax({
          url: "/webfamily/profile.html",                      //Server api to receive the file
          type: "POST",
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success:function(data){
            alert("Bạn đã sửa thông tin thành công");
            window.location.href = window.location.href;
          }
        });

    } else if ($("div#account-general input#inlineRadio3").is(':checked') == 1){

      var gender = 3;

      var file_data = $('#avatar').prop('files')[0];   //Fetch the file
      var form_data = new FormData();
      form_data.append("file",file_data);
      form_data.append("username",username);
      form_data.append("user",user);
      form_data.append("email",email);
      form_data.append("phone",phone);
      form_data.append("gender",gender);
      form_data.append("birth",birth);
      form_data.append("update_info_user",update_info_user);
      //Ajax to send file to upload
      $.ajax({
          url: "/webfamily/profile.html",                      //Server api to receive the file
          type: "POST",
          dataType: 'script',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success:function(data){
            alert("Bạn đã sửa thông tin thành công");
            window.location.href = window.location.href;
          }
        });

    }
  }
}

</script>


            <div class="tab-pane fade" id="account-change-password">
              <form action="" method="post">
                <div class="alert"></div>
              <div class="card-body pb-2">
                  <?php
                    if(isset($data['error'])){
                      echo $data['error'];
                    }
                  ?>
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" name="currentpassword" class="form-control" id="currentpassword">
                </div>

                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control" name="newpassword1" id="newpassword1">
                </div>

                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control" name="newpassword2" id="newpassword2">
                </div>

              </div>
              <div class="text-right mr-3 mb-3">
                <button type="button" onclick="return changepassword('changepassword');" name="changepassword" class="btn btn-primary"> Change password </button>
              </div>
              </form>
            </div>
            
            <script>
                function changepassword(changepassword){

                  var currentpassword = $("div#currentpassword").val(); 

                  var newpassword1 = $("div#newpassword1").val(); 

                  var newpassword2 = $("div#newpassword2").val(); 

                $.post("index.php?controller=profile",
                {
                  'currentpassword':currentpassword,  'newpassword1':newpassword1, 
                  'newpassword2':newpassword2, 'changepassword': changepassword
                
                },function(data){

                  $("div.alert").text(data);
                  
                });

                }
            </script>
            <div class="tab-pane fade px-3" id="account-info">
              <div class="card-body pb-2 into-address" style="overflow: auto; ">
                  <div class="row" style="border-bottom: 1px solid rgba(0,0,0,.09)">
                    <h4 class="col-md-10">My addresses</h4>
                    <button type="button" class="btn btn-primary col-md-2" style="margin-left: 80%;"  onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Save changes</button>
                  </div>

                  <?php
                      foreach ($data['addressshow'] as $key => $value) {
                        ?>
                      <div class="container-fruid mt-3 pb-3" style="border-bottom: 1px solid rgba(0,0,0,.09)">
                        <input type="hidden" name="sort" class="sort_<?php echo $value['id']; ?>" value="<?php echo $value['setdefault']; ?>">
                        <div class="row">
                        <div class="col-md-9 py-0">
                            <h6 style="float: left;"><?php echo $value['fullname']; ?> </h6><span class="ml-3 mb-2" style="color: rgba(0,0,0,.54)">| (+84) <?php echo $value['phone']; ?></span>
                            <p class="pb-0"><?php echo $value['addressgetproduct']; ?></p>
                            <p style="margin-top: -16px;"><?php echo $value['wards'].", ".$value['district'].", ".$value['city']; ?></p>
                            <?php
                              if($value['setdefault'] == 1){
                                echo '<button type="button" class="btn btn-outline-warning p-1" style="margin-top: -16px;">Default</button>';
                              }
                            ?>
                        </div> 
                        <div class="col-md-3 py-0">
                            <button type="button" style="border:none; background: white; color: blue; margin-left: 75px;" onclick="return showedit(<?php echo $value['id']; ?>, <?php echo $value['id_customer']; ?>);" class="text-right">Edit</button> 
                            | <button type="button" style="border:none; background: white; color: blue;" onclick="return deleteuser(<?php echo $value['id']; ?>, <?php echo $value['id_customer']; ?>);" class="text-right">Delete</button> 
                            <button type="button" class="btn btn-outline-secondary" onclick="return setdefault(<?php echo $value['id']; ?>,'setdefault');" style="margin-left: 47px;">Set as default</button>
                        </div>
                        </div>
                    </div>
                        <?php
                      }
                  ?>

              </div>  
              <hr class="border-light m-0">
            </div>
            <!-- <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Twitter</label>
                  <input type="text" class="form-control" value="https://twitter.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="https://www.facebook.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Google+</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">LinkedIn</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">Instagram</label>
                  <input type="text" class="form-control" value="https://www.instagram.com/user">
                </div>

              </div>
            </div> -->
            <!-- <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <h5 class="mb-2">
                  <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                  <i class="ion ion-logo-google text-google"></i>
                  You are connected to Google:
                </h5>
                nmaxwell@mail.com
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
              </div>
            </div> -->
            <!-- <div class="tab-pane fade" id="account-notifications">
              <div class="card-body pb-2">

                <h6 class="mb-4">Activity</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone comments on my article</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone answers on my forum thread</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone follows me</span>
                  </label>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Application</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">News and announcements</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly product updates</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly blog digest</span>
                  </label>
                </div>

              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <style>

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
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
    width: 40%;
    padding: 22px;
}

    </style>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="" method="post">
  <input type="hidden" name="postaddress" id="postaddress" value="postaddress">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Full name</label>
      <input type="text" name="fullname" class="form-control" id="name-add" placeholder="Fullname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone number</label>
      <input type="text" name="phone" class="form-control" id="phone-add" placeholder="Phone number">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Địa chỉ nhận hàng</label>
    <input type="text" name="adđress" class="form-control" id="addressadd" placeholder="Địa chỉ nhận hàng">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Tỉnh/ Thành phố</label>
    <input type="text" name="province" class="form-control" id="provinceadd" placeholder="Tỉnh/ Thành phố">
  </div>
    <div class="form-group">
    <label for="inputAddress">Quận/ Huyện</label>
    <input type="text" name="district" class="form-control" id="district-add" placeholder="Quận/ Huyện">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Phường/ Xã</label>
    <input type="text" name="ward" class="form-control" id="ward-add" placeholder="Phường/ Xã">
  </div>
    <div class="form-group">
        <label class="form-label mr-3">Lựa chọn tên cho địa chỉ thường dùng</label></br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="nameforaddress-add1" value="1">
          <label class="form-check-label" for="inlineRadio1">Văn phòng</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="nameforaddress-add2" value="2">
          <label class="form-check-label" for="inlineRadio2">Nhà riêng</label>
        </div>
    </div>
  <button type="button" class="btn btn-primary" id="addaddress" name="addaddress">Thêm địa chỉ</button>
  </form>
</div>



<div id="id02" class="modal">
  
  <form class="modal-content animate" action="" method="post">
    <input type="hidden" name="code" id="code" value="">
    <input type="hidden" name="code_customer" id="code_customer" value="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Full name</label>
      <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Fullname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone number</label>
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Địa chỉ nhận hàng</label>
    <input type="text" name="adđress" class="form-control" id="address" placeholder="Địa chỉ nhận hàng">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Tỉnh/ Thành phố</label>
    <input type="text" name="province" class="form-control" id="province" placeholder="Tỉnh/ Thành phố">
  </div>
    <div class="form-group">
    <label for="inputAddress">Quận/ Huyện</label>
    <input type="text" name="district" class="form-control" id="district" placeholder="Quận/ Huyện">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Phường/ Xã</label>
    <input type="text" name="ward" class="form-control" id="ward" placeholder="Phường/ Xã">
  </div>
    <div class="form-group">
        <label class="form-label mr-3">Lựa chọn tên cho địa chỉ thường dùng</label></br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="inlineRadio1" value="1">
          <label class="form-check-label" for="inlineRadio1">Văn phòng</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="inlineRadio2" value="2">
          <label class="form-check-label" for="inlineRadio2">Nhà riêng</label>
        </div>
    </div>
  <button type="button" class="btn btn-primary" id="editaddress" name="editaddress">Sửa địa chỉ</button>
  </form>
</div>



<script>



function setdefault(id,setdefault){

  $.post("index.php?controller=profile",{ 'id': id, 'setdefault': setdefault },function(data,error){

    $("#account-info").load(window.location.href + " #account-info > *");

  });

}
// Get the modal
var modal = document.getElementById('id01');

var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function deleteuser(id, id_customer){

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

          $.post("ajax/customer/deleteaddress.php",{ 'id': id, 'id_customer': id_customer },function(data,error){

              $("#account-info").load(window.location.href + " #account-info > *");

              swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your address has been deleted.',
                'success'
                )


          });
          
        }
      })
}

$("button#addaddress").click(() => {

var postaddress = $("div#id01 input#postaddress").val(); 

var fullname = $("div#id01 input#name-add").val(); 

var phone = $("div#id01 input#phone-add").val(); 

var address = $("div#id01 input#addressadd").val(); 

var province = $("div#id01 input#provinceadd").val(); 

var district = $("div#id01 input#district-add").val(); 

var ward = $("div#id01 input#ward-add").val(); 

if($("div#id01 input#nameforaddress-add1").is(':checked') == 1){

  var nameforaddress = 1;

  $.post("index.php?controller=profile",
  {
    'fullname':fullname,  'phone':phone, 
    'address':address,    'province':province, 
    'district':district,  'ward':ward,
    'nameforaddress': nameforaddress,
    'postaddress': postaddress
  
  },function(data){

    $("#account-info").load(window.location.href + " #account-info > *");

    document.getElementById('id01').style.display='none'

  });

} else if ($("div#id01 input#nameforaddress-add2").is(':checked') == 1){

  var nameforaddress = 2;

  $.post("index.php?controller=profile",
  {
    'fullname':fullname,  'phone':phone, 
    'address':address,    'province':province, 
    'district':district,  'ward':ward,
    'nameforaddress': nameforaddress,
    'postaddress': postaddress

  },function(data){
    
    $("#account-info").load(window.location.href + " #account-info > *");

    document.getElementById('id01').style.display='none'

  });

}

})

function showedit(id, id_customer){

  $.post("ajax/customer/editinfouser.php",{ 'id': id, 'id_customer': id_customer },function(data,error){

    document.getElementById('id02').style.display='block';

    var cutout = data.split("+");

    console.log(cutout[0]);

    $("div#id02 input#code").val(id); 

    $("div#id02 input#code_customer").val(id_customer); 

    $("div#id02 input#fullname").val(cutout[0]); 

    $("div#id02 input#phone").val(cutout[1]); 

    $("div#id02 input#address").val(cutout[2]); 

    $("div#id02 input#province").val(cutout[3]); 

    $("div#id02 input#district").val(cutout[4]); 

    $("div#id02 input#ward").val(cutout[5]); 

    if($("div#id02 input#inlineRadio1").val() == cutout[6]){

      $("div#id02 input#inlineRadio1").prop('checked', true);

    }else if($("div#id02 input#inlineRadio2").val() == cutout[6]){

      $("div#id02 input#inlineRadio2").prop('checked', true);

    }

  });

}

$("button#editaddress").click(() => {

  var code = $("div#id02 input#code").val(); 

  var code_customer = $("div#id02 input#code_customer").val(); 
  
  var fullname = $("div#id02 input#fullname").val(); 

  var phone = $("div#id02 input#phone").val(); 

  var address = $("div#id02 input#address").val(); 

  var province = $("div#id02 input#province").val(); 

  var district = $("div#id02 input#district").val(); 

  var ward = $("div#id02 input#ward").val(); 

  if($("div#id02 input#inlineRadio1").is(':checked') == 1){

    var nameforaddress = 1;

    $.post("ajax/customer/updateaddress.php",
    {

      'code':code,          'code_customer':code_customer, 
      'fullname':fullname,  'phone':phone, 
      'address':address,    'province':province, 
      'district':district,  'ward':ward,
      'nameforaddress': nameforaddress
    
    },function(data){
      
      $("#account-info").load(window.location.href + " #account-info > *");

      document.getElementById('id02').style.display='none'

    });

  } else if ($("div#id02 input#inlineRadio2").is(':checked') == 1){

    var nameforaddress = 2;

    $.post("ajax/customer/updateaddress.php",
    {

      'code':code,          'code_customer':code_customer, 
      'fullname':fullname,  'phone':phone, 
      'address':address,    'province':province, 
      'district':district,  'ward':ward,
      'nameforaddress': nameforaddress

    },function(data){
      
      $("#account-info").load(window.location.href + " #account-info > *");

      document.getElementById('id02').style.display='none'

    });

  }

})

</script>
  </div>