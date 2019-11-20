<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
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
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 005');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

$title = <<<EOD
<h3>Laporan Kegiatan</h3>
EOD;

$pdf->WriteHTMLCell(0,0,'','',$title,0,1,0,true,'C',true);
$table = '<table style="border-collapse: collapse; width: 100%; margin: 0 auto;">';
$table .='<tr>
			<th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">No.</th>
	        <th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">Nama Ormawa</th>
	        <th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">Tingkat</th>
	        <th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">Kegiatan</th>
	        <th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">Tempat</th>
	        <th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">Waktu</th>
	        <th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">Tahun</th>
	        <th style="border:1px solid #000; padding: 3px; font-weight: bold; text-align: center;">Dana</th>
		</tr>';
$no =0;
foreach($data as $dt){
$table .='<tr>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'. ++$no.'</td>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'.$dt->namaOrmawa.'</td>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'.$dt->tingkat.'</td>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'.$dt->kegiatan.'</td>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'.$dt->tempat.'</td>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'.$dt->waktu.'</td>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'.$dt->tahun.'</td>
	        <td style="border:1px solid #000; padding: 3px; vertical-align: top;">'.$dt->dana.'</td>
        </tr>';
}
$table .= '</table>';
$pdf->WriteHTMLCell(0,0,'','',$table,0,1,0,true,'C',true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('laporankegiatan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
