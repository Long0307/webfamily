<?php
//============================================================+
// File name   : example_009.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 009 for TCPDF class
//               Test Image
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Test Image
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
ob_clean();

require_once('tcpdf/tcpdf.php');

// output data of each row

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// -------------------------------------------------------------------

// add a page
$pdf->AddPage();

// set JPEG quality
$pdf->setJPEGQuality(75);
// set font
$fontname1 = TCPDF_FONTS::addTTFFont('tcpdf/fonts/dejavusans.php', 'TrueTypeUnicode', '', 10);
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "nhphuz8a_webfamily";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"."<br>";

$sql = "SELECT * FROM thong_tin_web";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
     // echo dirname(__FILE__)."/".$row['favicon_customer'];
     $txt = '<img src="'. dirname(__FILE__)."/".$row['favicon_customer'].'" alt="l???i" width="200px" style="float:left;"/>'; 
}

$txt .= '<h1 style="text-align:right;">X??C NH???N ????N H??NG PHL.COM<h1>';
$txt .= '<p>PHL.COM xin ch??n th??nh c???m ??n qu?? kh??ch h??ng.</p>';
$txt .= '<p style="text-align:left;">Ng?????i ?????t h??ng:</p>';
$txt .= '
<table border="1" cellpadding="2" cellspacing="2" align="right">  
      <tr nobr="true">  
           <th width="30%">T??n kh??ch ?????t</th>  
           <th width="30%">S??? ??i???n tho???i</th>  
           <th width="40%">Email</th>  
      </tr>
      <tr>
        <td>'.$data['detailOrder'][0]['HoVaTen'].'</td>
        <td>0'.$data['detailOrder'][0]['SoDienThoai'].'</td>
        <td>'.$data['detailOrder'][0]['Email'].'</td>
      </tr>  
 </table>';
$txt .= '<p style="text-align:left;">Ship h??ng t???i:</p>';
$txt .= '<p style="text-align:left;">?????a ch??? nh???n h??ng: '.$data['detailOrder'][0]['DiaChi'].'</p>';
$txt .= '<p style="text-align:left;">Ghi ch??: '.$data['detailOrder'][0]['Note'].'</p>';
$txt .= '<p style="text-align:left;">????n h??ng ?????t: </p>';
$txt .= '
<table border="1" cellpadding="2" cellspacing="2" align="right">  
      <tr nobr="true">  
           <th width="5%">#</th>  
           <th width="25%">T??n s???n ph???m</th>  
           <th width="20%">???nh</th>  
           <th width="20%">Gi?? b??n</th>  
           <th width="10%">S??? l?????ng</th>  
           <th width="20%">Ti???n</th>  
      </tr>';

      $i = 1;
      foreach ($data['detailOrder'] as $key => $value) {
        $txt .= '<tr>
                    <td>'.$i.'</td>
                    <td>0'.$value['Tensp'].'</td>
                    <td><img src="../../uploads/'.$value['HinhAnhSP'].'"  width="100px;height:100px;" alt="">  </td>

                    <td>'.number_format($value['Gia'], 0, '', ',')." VN??".'</td>
                    <td>'.$value['SoLuong'].'</td>
                    <td>'.number_format($value['DonGia'], 0, '', ',')." VN??".'</td>
                  </tr>';
        $i++;
      }

$txt .= '</table>';
$txt .= '<p>T???ng ti???n: '.number_format($value['TongTien'], 0, '', ',')." VN??".'</p>';
$txt .= '<p>K?? t??n: </p>';
$txt .= '
<table style="border:none;">  
      <tr style="border:none;">  
           <th width="250px" style="margin-left:100px;border:none;">Ng?????i l???p phi???u</th>  
           <th width="250px" style="margin-right:100px;border:none;">Ng?????i nh???n</th>  
      </tr>
 </table>';
$pdf->SetFont('dejavusans', '', 5);
$pdf->writeHTML($txt,true, 0, true, 0);        
ob_start();

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');
ob_end_flush();

header("Refresh:0");

//============================================================+
// END OF FILE
//============================================================+