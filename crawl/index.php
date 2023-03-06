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

$html = file_get_html("https://shoptretho.com.vn/");

foreach($html->find('section#list_category div ul li.cate_li a.cate_li_title') as $article) {

	echo $article->plaintext."<br>";
	


}