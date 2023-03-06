<?php
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
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
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
    
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

// ---------------------------------------------------------
// $fontpath1='font/times.ttf';

// $fontname1 = TCPDF_FONTS::addTTFFont($fontpath1, 'TrueTypeUnicode', '', 32);

// set font
$fontname1 = TCPDF_FONTS::addTTFFont('tcpdf/fonts/dejavusans.php', 'TrueTypeUnicode', '', 32);


// add a page
$pdf->AddPage();

// set some text to print
$txt = '
<table border="1" cellpadding="2" cellspacing="2" align="center">  
      <tr nobr="true">  
           <th width="20%">Ngày đặt hàng</th>  
           <th width="20%">Tên người đặt</th>  
           <th width="20%">Số điện thoại</th>  
           <th width="20%">Địa chỉ</th> 
           <th width="10%">Số tiền</th>  
           <th>'.K_PATH_IMAGES.'</th>
      </tr>  
 </table>';

$pdf->SetFont('dejavusans', '', 14);
$pdf->writeHTML($txt,true, 0, true, 0);
$pdf->AddPage();
$pdf->writeHTML("TỔNG HỢP", true, false, false, false, '');
ob_end_clean();
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+