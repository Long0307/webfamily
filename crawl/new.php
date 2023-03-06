<?php
	require_once("simple_html_dom.php");

	$host = "localhost:3306";
	$user = "root";
	$pass = "";
	$dbname = "doanwebbanhang";

	$conn = mysqli_connect($host,$user,$pass,$dbname);

	if($conn){
			// echo "kết nối thành công";
	}

	// for($i = 1;$i <= 118;$i++){
	// 	$html = file_get_html("https://subin.vn/tin-tuc/?page=".$i);

	// 	foreach($html->find('li.view-effect') as $article) {
		    
	// 		// $linknew = $article->find('h2 a', 0)->href;

	// 		//   $insertSP = "INSERT INTO linknew(link) 
	//   //         VALUES ('$linknew')";

	//   //         if(mysqli_query($conn,$insertSP)){
	//   //         	echo "thahf công";
	//   //         }	



	// 		$linkanh = $article->find('a.img img', 0)->src;

	// 		$explodeName = explode("/",$linkanh);

	// 		$nameImage = end($explodeName);
			
	// 		$nameNew = explode(".",$nameImage); 	

	// 		$nameFinal = $nameNew[0];

	// 		$r = download_file($linkanh,"../ImageNew/".$nameFinal.".jpg");

	// 		$TieuDe = $article->find('h2 a strong', 0)->plaintext;

	// 		$MoTaNgan = $article->find('p.sapo', 0)->plaintext;

	// 		$insertSP = "INSERT INTO bai_viet(HinhAnh,TieuDe,MoTaNgan) 
	//         VALUES ('$nameImage','$TieuDe','$MoTaNgan')";

	//         if(mysqli_query($conn,$insertSP)){
	//         	echo "thahf công";
	//         }	
	// 	}
	// }

	$sql = "SELECT * FROM linknew";

	$run = mysqli_query($conn,$sql);

	while ($row = mysqli_fetch_array($run)) {
		
		$html = file_get_html("https://subin.vn".$row['link']);
		
		$content = $html->find('div.news-detail', 0)->outertext;

		$update = "UPDATE bai_viet SET NoiDung = '$content' WHERE ID = ".$row['id'];

		if(mysqli_query($conn,$update)){
	    	echo "thahf công";
	    }

	}
// function download_file($url, $path) {
// 	$f = fopen($path, 'w');
// 	$ch = curl_init($url);
// 	curl_setopt($ch, CURLOPT_FILE, $f);
// 	curl_setopt($ch, CURLOPT_TIMEOUT, 28800);
// 	curl_exec($ch);
// 	$e = curl_error($ch);
// 	curl_close($ch);
// 	fclose($f);
// 	return $e;
// }
?>