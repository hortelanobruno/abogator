<?php
//============================================================+
// File name   : example_029.php
// Begin       : 2008-06-09
// Last Update : 2010-08-08
//
// Description : Example 029 for TCPDF class
//               Set PDF viewer display preferences.
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Set PDF viewer display preferences.
 * @author Nicola Asuni
 * @since 2008-06-09
 */

require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 029');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 029', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set array for viewer preferences
$preferences = array(
    'HideToolbar' => true,
    'HideMenubar' => true,
    'HideWindowUI' => true,
    'FitWindow' => true,
    'CenterWindow' => true,
    'DisplayDocTitle' => true,
    'NonFullScreenPageMode' => 'UseNone', // UseNone, UseOutlines, UseThumbs, UseOC
    'ViewArea' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
    'ViewClip' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
    'PrintArea' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
    'PrintClip' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
    'PrintScaling' => 'AppDefault', // None, AppDefault
    'Duplex' => 'DuplexFlipLongEdge', // Simplex, DuplexFlipShortEdge, DuplexFlipLongEdge
    'PickTrayByPDFSize' => true,
    'PrintPageRange' => array(1,1,2,3),
    'NumCopies' => 2
);

// Check the example n. 60 for advanced page settings

// set pdf viewer preferences
$pdf->setViewerPreferences($preferences);

// set font
$pdf->SetFont('times', '', 20);

// add a page
$pdf->AddPage();

// print a line
$pdf->Cell(0, 12, $nombre, 1, 1, 'C');

$pdf->SetFont('times', '', 14);

$pdf->Ln(5);

$pdf->Cell(0, 6, 'Indemninazion por despido', 1, 1, 'C');

$pdf->Ln(5);
$pdf->MultiCell(125, 5, 'Antiguedad: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultantiguedad, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Preaviso: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultpreaviso, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Integracion: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultintegracion, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'SAC S/ANT + PRE + INT: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultsacpresint, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Total: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resulttotal1, 0, 'R', 0, 1, '', '', true);
$pdf->Ln(5);

$pdf->Cell(0, 6, 'Liquidacion final', 1, 1, 'C');

$pdf->Ln(5);
$pdf->MultiCell(125, 5, 'Dias trabajados: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultdiastrabajados, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Vacaciones completas: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultvacacionescompletas, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Vacaciones proporcionales: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultvacacionesproporcionales, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'SAC S/Vacaciones completas: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultsacsobrevacacionescompletas, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'SAC S/Vacaciones proporcionales: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultsacsobrevacacionesproporcionales, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'SAC: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultsac, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'SAC Proporcional: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultsacproporcional, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Total: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resulttotal2, 0, 'R', 0, 1, '', '', true);
$pdf->Ln(5);

$pdf->Cell(0, 6, 'Diferencias salariales', 1, 1, 'C');

$pdf->Ln(5);
$pdf->MultiCell(125, 5, 'Hoas extraordinarias al 50%: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resulthorasextraordinariasal50, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Horas extraordinarias al 100%: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resulthorasextraordinariasal100, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Horas nocturnas: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resulthorasnocturnas, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Diferencias salariales: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resultdiferenciassalariales, 0, 'R', 0, 1, '', '', true);
$pdf->MultiCell(125, 5, 'Total: ', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, $resulttotal3, 0, 'R', 0, 1, '', '', true);
$pdf->Ln(5);

if($resulttotal4 != '$ 0.00'){

    $pdf->Cell(0, 6, 'Multas', 1, 1, 'C');

    $pdf->Ln(5);
    if(isset($checkmultaley25323art1)&&$checkmultaley25323art1){
        $pdf->MultiCell(125, 5, 'MULTA LEY 25.323 ART 1: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley25323art1, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley25323art2)&&$checkmultaley25323art2){
        $pdf->MultiCell(125, 5, 'MULTA LEY 25.323 ART 2: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley25323art2, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley24013art8)&&$checkmultaley24013art8){
        $pdf->MultiCell(125, 5, 'MULTA LEY 24.013 ART 8: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley24013art8, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley24013art9)&&$checkmultaley24013art9){
        $pdf->MultiCell(125, 5, 'MULTA LEY 24.013 ART 9: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley24013art9, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley24013art10)&&$checkmultaley24013art10){
        $pdf->MultiCell(125, 5, 'MULTA LEY 24.013 ART 10: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley24013art10, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley24013art15)&&$checkmultaley24013art15){
        $pdf->MultiCell(125, 5, 'MULTA LEY 24.013 ART 15: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley24013art15, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley20744art80)&&$checkmultaley20744art80){
        $pdf->MultiCell(125, 5, 'MULTA LEY 20.744 ART 80: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley20744art80, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley20744art132bis)&&$checkmultaley20744art132bis){
        $pdf->MultiCell(125, 5, 'MULTA LEY 20.744 ART 132 BIS: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley20744art132bis, 0, 'R', 0, 1, '', '', true);
    }
    if(isset($checkmultaley20744art182)&&$checkmultaley20744art182){
        $pdf->MultiCell(125, 5, 'MULTA LEY 20.744 ART 182: ', 0, 'L', 0, 0, '', '', true);
        $pdf->MultiCell(55, 5, $resultmultaley20744art182, 0, 'R', 0, 1, '', '', true);
    }
    
    $pdf->MultiCell(125, 5, 'Total: ', 0, 'L', 0, 0, '', '', true);
    $pdf->MultiCell(55, 5, $resulttotal4, 0, 'R', 0, 1, '', '', true);
    $pdf->Ln(5);
}



$pdf->MultiCell(125, 5, '', 0, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 5, 'TOTAL:    '.$resulttotal5, 1, 'R', 0, 1, '', '', true);

//Close and output PDF document
$pdf->Output('example_029.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
 