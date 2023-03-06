<?php

require_once("Model/customer/OrderModel.php");

$error = array();
$success = array();
class OrderController extends OrderModel
{
	public function order()
	{
 
		if(isset($_POST['order'])){

			$selectOne = $this->selectManyCondition('customer','id','address','id_customer',"'".$_SESSION['current_info_user']['id']."'", 'setdefault', 1);

			$fullname = $selectOne[0]['fullname'];

			$address  = $selectOne[0]['addressgetproduct'].", ".$selectOne[0]['city'].", ".$selectOne[0]['district'].", ".$selectOne[0]['wards'];

			$phone	  = $selectOne[0]['phone'];

			$email	  = $selectOne[0]['email'];

			$note	  = trim($_POST['note']);

			if($fullname == null || $address == null || $phone == null || $email == null){	

				$error['null'] = "<p style='color:red;'>Bạn chưa điền hết các trường</p>";

				$confirmOrder = new OrderModel();

                $selectOne = $confirmOrder->selectOne('thong_tin_web','id',1);

				return compacts("customer/content/order",[ 'error' => $error, 'selectOne' => $selectOne ]);

			}else{

				$order      = new OrderModel();
				$order      = $order->orders($fullname,$address,$phone,$email,$note);

				require 'phpmailer/PHPMailerAutoload.php';
				
				$mail = new PHPMailer;

				$body = '<table style="border-collapse: collapse;
				border-spacing: 0;
				width: 100%;
				border: 1px solid #ddd;">
				<tr style=" background-color: #f2f2f2;">
				<th style="text-align: left;padding: 16px;">#</th>
				<th style="text-align: left;padding: 16px;">Tên SP</th>
				<th style="text-align: left;padding: 16px;">Ảnh</th>
				<th style="text-align: left;padding: 16px;">Đơn giá</th>
				<th style="text-align: left;padding: 16px;">Số lượng</th>
				<th style="text-align: left;padding: 16px;">Tiền</th>
				</tr>';
				$subtotal = 0;
				if(isset($_SESSION["cart"])){
					$cart = $_SESSION["cart"];
					$i = 0;
					$total = 0;
					
					foreach ($cart as $key => $value) {	
						$price = $value["price-new"];
						$num = $value["quantity"];
						$total = $value["price-new"]*$value["quantity"];
						$subtotal += $total;
						$i++;

						$mail->AddEmbeddedImage('uploads/'.$value["image"].'', 'imagePro'.$value["image"].'');

						$body .= '<tr style="background-color: #f2f2f2;">
						<td style="text-align: left;padding: 16px;">'.$i.'</td>
						<td style="text-align: left;padding: 16px;">'.$value["name"].'</td>
						<td style="text-align: left;padding: 16px;"><img src="cid:imagePro'.$value["image"].'" width="100" alt=""></td>
						<td style="text-align: left;padding: 16px;">'.number_format($price, 0, '', ',')." VNĐ".'</td>
						<td style="text-align: left;padding: 16px;">'.$num.'</td>
						<td style="text-align: left;padding: 16px;">'.number_format($total, 0, '', ',')." VNĐ".'</td>
						</tr>';
					}
				}

				$body .= 'Tổng tiền:'.number_format($subtotal, 0, '', ',').'" VNĐ"';

				$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				// index.php?controller=order&token='.$order.';

				$body .= '<br><a class="btn btn success" href="'.$actual_link.'&token='.$order.'">Xác nhận đơn hàng</a>';	
				$body .= '</table>';	  

				$mail->Host='smtp.gmail.com';
				
				$mail->isSMTP();
				$mail->SMTPAuth = true;    
    			$mail->SMTPAutoTLS = false;    
				$mail->SMTPSecure='tls';
				$mail->Port=587;

			    $mail->Username   = 'phunglongtn@gmail.com';                     //SMTP username
			    $mail->Password   = 'zgdthhvtwvdxdjws';

				$selectOne = $this->selectManyCondition('customer','id','address','id_customer',"'".$_SESSION['current_info_user']['id']."'", 'setdefault', 1);
                $mail->addAddress($email);//Receiver Email

                $mail->isHTML(true);
               	                            // Set email format to HTML
                $mail->CharSet = "UTF-8";
                $mail->Subject='XÁC NHẬN ĐƠN HÀNG PHL.COM';
                $mail->MsgHTML($body); 	
                // $mail->Body = file_get_contents($_SERVER['DOCUMENT_ROOT'] .'/phpMVC/Controllers/OrderMail.html');
                if(!$mail->send())
                {
                	$success['success'] = "<p style='color:green;'>Thanh toán thành công.<p>";
                	echo $mail->ErrorInfo;	
                	unset($cart);
                	// session_destroy();
                }
                else
                {
                	$success['success'] = "<p style='color:green;'>Gửi mail thành công,<span style='color:red;'>hãy vào mail để xác nhận đã nhận đơn hàng</span><span style='color:orange;'> khi nhận được hàng</span> cảm ơn các bạn đã dùng sản phẩm của chúng tôi <p>";
                	unset($cart);
                	// session_destroy();
                }

                $confirmOrder = new OrderModel();

                $selectAll = $confirmOrder->selectAll('danh_muc_san_pham');

                $selectOne = $confirmOrder->selectOne('thong_tin_web','id',1);

                return compacts("customer/content/order",[ 'success' => $success,'selectOne' => $selectOne,'selectAll' => $selectAll ]);
            }
        }

        if(isset($_GET['token'])){

        	$order = $_GET['token'];

        	$confirmOrder = new OrderModel();

        	$shipped = 0;

        	$updateshipped = "status = '".$shipped."'";

        	$confirm = $confirmOrder->update('don_dat_hang',$updateshipped,'ID',$order);

        	$confirm = $confirmOrder->purchasedGetPro('don_dat_hang','chi_tiet_don_hang','ID','Order_ID',$order);

        	if($confirm){

        		foreach ($confirm as $key => $value) {

        			$soluongban = $value['SoLuong'];

        			$idsp = $value['Product_ID'];

        			$getSoLuongTon = $confirmOrder->selectOne('san_pham','ID',$idsp);

        			foreach ($getSoLuongTon as $key => $value) {	

        				$soluongtoncu = $value['SoLuongTon'];

        				$soluongtonmoi = $soluongtoncu - $soluongban;

        				$SoLuongDaBanMoi = $value['SoLuongDaBan'] + $soluongban;

        				$keyandvalue = "SoLuongTon = '".$soluongtonmoi."',SoLuongDaBan = '".$SoLuongDaBanMoi."'";

        				$updateSoLuongTon = $confirmOrder->update('san_pham',$keyandvalue,'ID',$idsp);

        			}

        		}

        		$success['finish'] = "<p style='color:green'>Cảm ơn các bạn đã mua hàng, hãy chọn thêm cho mình những sản phẩm ưa thích nữa nhé</p>";
        	}

        	$confirmOrder = new OrderModel();

        	$selectOne = $confirmOrder->selectOne('thong_tin_web','id',1);

        	return compacts("customer/content/order",[ 'success_finish' => $success['finish'],'selectOne' => $selectOne ]);
        }

        $confirmOrder = new OrderModel();

		$addressshow = $this->selectOne("address","id_customer", "'".$_SESSION['current_info_user']['id']."'");

        $selectAll = $confirmOrder->selectAll('danh_muc_san_pham');

        $selectOne = $confirmOrder->selectOne('thong_tin_web','id',1);

		return compacts("customer/content/order",[ 'selectAll' => $selectAll,'selectOne' => $selectOne, 'addressshow' => $addressshow ]);
    }
}

?>