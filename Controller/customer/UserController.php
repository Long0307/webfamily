<?php
	
// require_once("Controller.php");
require_once("Model/customer/LoginModel.php");

class UserController extends LoginModel
{
    public $url = "";
    public function index(){
        
        echo "Long đẹp trai";

    }
    
    public function profile(){

        if(isset($_POST['update_info_user'])){

            if(isset($_FILES['file']['name'])){

                $filename = $_FILES['file']['name'];
             
                /* Location */   echo $location = "public/avatar_customer/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
             
                /* Valid extensions */   $valid_extensions = array("jpg","jpeg","png");
             
                $response = 0;
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                   /* Upload file */      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                      $response = $location;
                   }
                }
             
                echo $response;

                $username = "";
                if(isset($_POST['username'])){
                    echo $username = trim($_POST['username']);
                }else{
                    $username = "";
                }
    
                $name = "";
                if(isset($_POST['user'])){
                    echo $name = trim($_POST['user']);
                }else{
                    $name = "";
                }
    
                
                $phone = "";
                if(isset($_POST['phone'])){
                    echo $phone = trim($_POST['phone']);
                }else{
                    $phone = "";
                }
    
                $email = "";
                if(isset($_POST['email'])){
                    $email = trim($_POST['email']);
                }else{
                    $email = "";
                }
    
                $gender = "";
                if(isset($_POST['gender'])){
                    echo $gender = trim($_POST['gender']);
                }else{
                    $gender = "";
                }
    
                $birth = "";
                if(isset($_POST['birth'])){
                    echo $birth = trim($_POST['birth']);
                }else{
                    $birth = "";
                }
    
                $keyandvalue = "username = '".$username."',name = '".$name."',phone = '".$phone.
                "',email = '".$email."',gender = '".$gender."',dateofbirth = '".$birth."',avatar = '".$filename."'";
    
                $updateInfoUser = $this->update('customer', $keyandvalue, 'id', $_SESSION['current_info_user']['id']);
    
                $_SESSION['current_user'] = $username;
    
                $_SESSION['current_info_user']['email'] = $email;
                $_SESSION['current_info_user']['phone'] = $phone;
                $_SESSION['current_info_user']['avatar'] = $avatar;
    
                $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
        
                echo "<p class='text-danger'>Lưu thay đổi thành công</p>";
             }else{

                $username = "";
                if(isset($_POST['username'])){
                    echo $username = trim($_POST['username']);
                }else{
                    $username = "";
                }
    
                $name = "";
                if(isset($_POST['user'])){
                    echo $name = trim($_POST['user']);
                }else{
                    $name = "";
                }
    
                
                $phone = "";
                if(isset($_POST['phone'])){
                    echo $phone = trim($_POST['phone']);
                }else{
                    $phone = "";
                }
    
                $email = "";
                if(isset($_POST['email'])){
                    $email = trim($_POST['email']);
                }else{
                    $email = "";
                }
    
                $gender = "";
                if(isset($_POST['gender'])){
                    echo $gender = trim($_POST['gender']);
                }else{
                    $gender = "";
                }
    
                $birth = "";
                if(isset($_POST['birth'])){
                    echo $birth = trim($_POST['birth']);
                }else{
                    $birth = "";
                }
    
                $keyandvalue = "username = '".$username."',name = '".$name."',phone = '".$phone.
                "',email = '".$email."',gender = '".$gender."',dateofbirth = '".$birth."'";
    
                $updateInfoUser = $this->update('customer', $keyandvalue, 'id', $_SESSION['current_info_user']['id']);
    
                $_SESSION['current_user'] = $username;
    
                $_SESSION['current_info_user']['email'] = $email;
                $_SESSION['current_info_user']['phone'] = $phone;
                $_SESSION['current_info_user']['avatar'] = $avatar;
    
                $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
        
                echo "<p class='text-danger'>Lưu thay đổi thành công</p>";

             }

        } else if (isset($_POST['changepassword'])){
            
            if(!empty($_POST['currentpassword'])){

                $oldpassword = md5($_POST['currentpassword']);

                if($oldpassword == $_SESSION['current_info_user']['password']){

                    if(!empty($_POST['newpassword1'])){

                        $newpassword1 = md5($_POST['newpassword1']);

                        if(!empty($_POST['newpassword2'])){

                            $newpassword2 = md5($_POST['newpassword2']);

                            if((string)$newpassword1 === (string)$newpassword2){

                                $keyandvalue = "password = '".$newpassword2."'";

                                $updateInfoUser = $this->update('customer', $keyandvalue, 'id', $_SESSION['current_info_user']['id']);

                                $_SESSION['current_info_user']['password'] = $newpassword2;

                                $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
    
                                echo "Thay đổi mật khẩu thành công";

                            }else{

                                $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
    
                                echo "Mật khẩu mới không trùng hợp";

                            }

                        }

                    }else{

                        $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
    
                        echo "Bạn chưa điền mật khẩu mới";

                    }

                }else{

                    $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
    
                    echo "Mật khẩu của bạn chưa đúng";

                }

            }else{

                $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
    
                echo "Bạn chưa điển mật khẩu hiện tại";

            }

        } else if(isset($_POST['postaddress'])) {

            $fullname = "";
            if(isset($_POST['fullname'])){
                echo $fullname = trim($_POST['fullname']);
            }else{
                $fullname = "";
            }

            $phone = "";
            if(isset($_POST['phone'])){
                echo $phone = trim($_POST['phone']);
            }else{
                $phone = "";
            }

            $adđress = "";
            if(isset($_POST['address'])){
                echo $adđress = trim($_POST['address']);
            }else{
                $adđress = "";
            }

            $province = "";
            if(isset($_POST['province'])){
                echo $province = trim($_POST['province']);
            }else{
                $province = "";
            }

            $district = "";
            if(isset($_POST['district'])){
                echo $district = trim($_POST['district']);
            }else{
                $district = "";
            }

            $ward = "";
            if(isset($_POST['ward'])){
                echo $ward = trim($_POST['ward']);
            }else{
                $ward = "";
            }

            $nameforaddress = "";
            if(isset($_POST['nameforaddress'])){ 
                echo $nameforaddress = trim($_POST['nameforaddress']);
            }else{
                $nameforaddress = "";
            }

            $key = "id_customer,fullname,phone,addressgetproduct,city,district,wards,nameforaddress";

            $value = "('".$_SESSION['current_info_user']['id']."'".","."'".$fullname."'".","."'".$phone."'".","."'".$adđress."'".","."'".$province."'".","."'".$district."'".","."'".$ward."'".","."'".$nameforaddress."')";

            $this->insert('address',$key,$value);

            $addressshow = $this->selectOne("address","id_customer", "'".$_SESSION['current_info_user']['id']."'");

            $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
    
            return compacts("customer/content/profile",[ 'profile' => $profile, 'addressshow' => $addressshow, 'success' => "Thêm địa chỉ thành công." ]);

        } else if (isset($_POST['setdefault'])) {

            $id = $_POST['id'];

            $keyandvalue = "setdefault = 0";

            $updateInfoUser = $this->update('address', $keyandvalue, 'id_customer', $_SESSION['current_info_user']['id']);

            $keyandvalue = "setdefault = 1";

            $updateInfoUser = $this->update('address', $keyandvalue, 'id', $id);


        } else {

            $addressshow = $this->selectOne("address","id_customer", "'".$_SESSION['current_info_user']['id']."'");

            $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");
    
            return compacts("customer/content/profile",[ 'profile' => $profile, 'addressshow' => $addressshow ]);

        }

        $addressshow = $this->selectOne("address","id_customer", "'".$_SESSION['current_info_user']['id']."'");

        $profile = $this->selectOne("customer","email", "'".$_SESSION['current_info_user']['email']."'");

        return compacts("customer/content/profile",[ 'profile' => $profile, 'addressshow' => $addressshow ]);

        
    }
    
    public function register(){ 

        if(isset($_POST['userregister'])){

            $email = "";
            if(isset($_POST['email'])){

                $select = $this->selectAll('customer');

                foreach($select as $elements){
                    
                    if(trim($_POST['email']) == $elements['email']){

                        return compacts("customer/content/register",[ 'error' => '<p class="text-danger">Email này của bạn đã được sử dụng vui lòng sử dụng email mới</p>' ]);

                    }else{

                        $email = trim($_POST['email']);           

                    }

                }

            }else{
                $email = "";
            }

            $username = "";
            if(isset($_POST['username'])){
                $username = trim($_POST['username']);
            }else{
                $username = "";
            }

            $password = "";
            if(isset($_POST['password'])){
                $password = md5(trim($_POST['password']));
            }else{
                $password = "";
            }

            
            $phone = "";
            if(isset($_POST['phone'])){
                $phone = trim($_POST['phone']);
            }else{
                $phone = "";
            }

            $day = "";
            if(isset($_POST['day'])){
                $day = trim($_POST['day']);
            }else{
                $day = "";
            }

            $month = "";
            if(isset($_POST['month'])){
                $month = trim($_POST['month']);
            }else{
                $month = "";
            }

            $year = "";
            if(isset($_POST['year'])){
                $year = trim($_POST['year']);
            }else{
                $year = "";
            }

            $gender = "";
            if(isset($_POST['gender'])){
                $gender = trim($_POST['gender']);
            }else{
                $gender = "";
            }

            $date = $day."/".$month."/".$year;

            $key = "username,email,phone,gender,dateofbirth,password";

            $value = "('".$username."'".","."'".$email."'".","."'".$phone."'".","."'".$gender."'".","."'".$date."'".","."'".$password."')";

            $this->insert('customer',$key,$value);

            ob_start();
            session_start(); 

            $_SESSION['current_user'] = $username;

            echo $success['sendsuc'] = "<p class='ml-3 my-0' style='color:green;'>Đăng ký thành công</p>";

            return compacts("customer/content/profile",[ 'success' => $success['sendsuc'] ]);

        }else{  

            return views("customer/content/register");  

        }
        
    }

    public function logout(){
        if(isset($_SESSION['current_user'])){
            unset($_SESSION['current_user']);
            header("location:index.php");	
        }else{
            echo "Có lỗi";
        }
    }
}

?>