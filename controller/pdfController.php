<?php

/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 12/09/16
 * Time: 7:07 PM
 * /Users/olmemarin/Desktop
 */

require_once __DIR__.'/./PDFFacade.php';

if(isset($_GET["report"])){
    $pdf = new PDFFacade('P','pt','Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',8);
    $pdf->TablaSimple();
    $pdf->Output();
    //$pdf->Outpu(__DIR__.'/../pdfs/PdfPhp.pdf','F');
}








