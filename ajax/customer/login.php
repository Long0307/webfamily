<link rel="stylesheet" href="../../public/Customer/css/bootstrap.min.css" type="text/css">
<script src="../../public/Customer/js/jquery-3.3.1.min.js"></script>
<style>
    div.header__top{
        display: none;
    }
    body {  
        box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px; 
        background: #EFEFEF;   
    }
 
#box {  
    border: 1px solid rgb(200, 200, 200);   
    box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px; 
    background: #EFEFEF;   
    border-radius: 4px; top:50px;
    margin: 0 auto;
}
 
h2 {    
    text-align:center;  
}
a#forgot-paddword:hover{
    color: black;
    cursor: pointer;
}
div.boxor {
    padding-bottom: 0.875rem;
    position: relative;
    width: 93%;
    margin: 0 auto;
    padding-top: 6px;
}

.gachngang {
    height: 1px;
    width: 100%;
    background-color: #dbdbdb;
    flex: 1;
}

.hoac {
    color: #ccc;
    padding: 0 1rem;
    text-transform: uppercase;
    font-size: 16px;
    position: absolute;
    top: -10px;
    left: 45%;
    background-color: #EFEFEF;
}
</style>
<script>
    $("header.header").find("div.col-lg-7").hide();
    $("header.header").find("div.col-lg-2").hide();
    $("header.header").find("div.header__logo").append("<h3 style='float:right;padding-top:10px;'>Log In</h3>");
</script>
<?php
 if(!isset($_SESSION)) 
    { 
        ob_start();
        session_start(); 
    }
            include 'facebook_source.php';
            include 'google_source.php';
?>
<div class="container-fluid" style="padding-top:100px; padding-bottom: 120px;"> 
 <div class="row-fluid"> 
  <div class="col-md-offset-4 col-md-4" id="box"> 
   <h2>Log in</h2> 
   <hr> 
   <form class="form-horizontal" action="http://hocwebgiare.com" method="get" id="login_form"> 
    <fieldset> 
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
       <input name="text" id="email" placeholder="Email" class="form-control" type="text"> 
       </div> 
      </div> 
     </div> 
     <div class="form-group"> 
      <div class="col-md-12"> 
       <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> 
       <input name="password" id="password" placeholder="Password" class="form-control" type="password"> 
       </div> 
      </div> 
     </div> 
     <div class="form-group"> 
      <div class="col-md-12"> 
       <button type="button" class="btn btn-md" id="login" name="login" style="background-color: #ee4d2d; color: white;box-shadow: 0 1px 1px rgb(0 0 0 / 9%); width: 100%;">Log In </button> 
      </div> 
     </div> 
    </fieldset> 
   </form>
    <a id="forgot-password" href="" style="margin-left: 15px;">Forgot password</a><br>
    
    <div class="boxor">
        <div class="gachngang"></div>
        <span class="hoac"> OR </span>
        <div class="gachngang"></div>   
    </div>
    <a class="btn btn-primary" style="background-color: #3b5998;margin-left: 15px; width: 180px; margin-bottom: 10px;" href="<?= $loginUrl ?>" role="button"><i class="fab fa-facebook-f"></i> FaceBook</a>
    <span style="color:white; margin: 5px;"> | </span>
    <a class="btn btn-primary" style="background-color: #dd4b39; width: 180px; margin-bottom: 10px;" href="<?= $authUrl ?>" role="button"><i class="fab fa-google"></i> Google</a>
  </div> 
 </div>
</div>

<script>
    $("button#login").click(() => {

        email = $("input#email").val();
        password = $("input#password").val();

        $.post("../../ajax/customer/handlelogin.php",{ 'email':email,'password':password },function(data){
            if(data == "Đăng nhập thành công"){
                window.location.href = "../../profile.html";
            }else{

                alert("Bạn đã bị sai email hoặc mật khẩu");
            }
        });

    });
</script>
