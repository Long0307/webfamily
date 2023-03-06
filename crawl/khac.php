<?php

require_once("simple_html_dom.php");

$host = "localhost:3306";
$user = "root";
$pass = "";
$dbname = "doanwebbanhang";

$conn = mysqli_connect($host,$user,$pass,$dbname);

if($conn){
		echo "kết nối thành công";
}

$sqlGetLinkSP = "SELECT * FROM linksp";
$runGetLinkSP = mysqli_query($conn,$sqlGetLinkSP);


	// $sqlGetLink = "SELECT * FROM linklsp";
	// $runGetLink = mysqli_query($conn,$sqlGetLink);

	// while($rowGetLink = mysqli_fetch_array($runGetLink)){

	// 	$html = file_get_html("https://subin.vn".$rowGetLink['link']);

	// 	foreach($html->find('a.mask') as $element){
	// 		$linksp = "https://subin.vn".$element->href;

	// 		$sqlLinkSP = "INSERT INTO linksp(linksp,idlsp) VALUES 
	// 		('$linksp',".$rowGetLink['id'].")";	
	// 		$runLinkSP = mysqli_query($conn,$sqlLinkSP);

	// 		if($runLinkSP){
	// 			echo $rowGetLink['id'];
	// 		}
	// 	}		
	// }

while($rowGetLinkSP = mysqli_fetch_array($runGetLinkSP)){

	$html = file_get_html($rowGetLinkSP['linksp']);

	// ID danh mục

	$idDanhMuc = $rowGetLinkSP['idlsp'];

	
	foreach($html->find('article.page-l.l-74') as $article) {
		// Tên sản phẩm

	    $Tensp = $article->find('strong', 0)->plaintext;


		// Hình ảnh sản phẩm

		foreach($article->find('a#zoom1') as $element){
			$linkanh = $element->href;
		
			$explodeName = explode("/",$linkanh);	


			$nameImage = end($explodeName);
			
			$nameNew = explode(".",$nameImage); 

			$nameFinal = $nameNew[0];
			// Tải ảnh đã xong

			$r = download_file($linkanh,"../uploads/".$nameFinal.".jpg");
		}

		

        //  Giá sản phẩm

        $price = $article->find('div.box-infoprod div.price-sell p.clearfix.selling1 strong', 0)->plaintext;

        $getPrice = explode(":",$price);

        $cutĐ = explode(" ",$getPrice[1]);

        $cutĐot = explode(".",$cutĐ[1]);

        $priceNew = implode("", $cutĐot);
        // Xong giá
 
        if(is_string($priceNew) == true){

        	// Lấy giá insert
        	$epkieugia = (int)$priceNew;

        }

        // Nhà sản xuất

		$arr = [];

		foreach($article->find('div.infoprod a') as $element) {

			$arr[] = $element->plaintext;
			
		}
		// Xong nhà sản xuất
		$NSX = $arr[1];
		//Xong chất liệu
		$Chatlieu = $arr[2];
		// Xong xuất xứ
		$XuatXu = $arr[3];
		
		// Thông tin sản phẩm
			
        $infoSP = $article->find("div.product-detail.boxbor", 0);

        $infoNew = $infoSP->outertext;

        $insertSP = "INSERT INTO san_pham(IDDanhMuc,Tensp,HinhAnhSP,Gia,NhaSanXuat,ChatLieu,XuatXu,ThongTinSP) 
        					VALUES ('$idDanhMuc','$Tensp','$nameImage','$epkieugia','Công ty TNHH Cổ Phần Đồ Chơi Việt Nam','Nhựa và Vải','Việt Nam','$infoNew')";

        if(mysqli_query($conn,$insertSP)){
        	echo "thahf công";
        }	

       
	}	
	
}

	function download_file($url, $path) {
		$f = fopen($path, 'w');
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FILE, $f);
		curl_setopt($ch, CURLOPT_TIMEOUT, 28800);
		curl_exec($ch);
		$e = curl_error($ch);
		curl_close($ch);
		fclose($f);
		return $e;
	}
