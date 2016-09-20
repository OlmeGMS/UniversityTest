<?php

/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 12/09/16
 * Time: 7:07 PM
 * /Users/olmemarin/Desktop
 */
require_once('../services/fpdf/fpdf.php');
require_once ('../model/question/Question.class.php');
require_once ('../model/question/QuestionDao.class.php');
require_once ('../services/QuestionService.php');

class PDF extends FPDF{
    function Header()
    {
        $this->Image("../view/img/placeholders/avatars/integer-soft.jpg",10,8,35,38,"JPG","http://www.integer-soft.com");
        $this->SetFont('Arial','B',15);
        $this->Cell(80);
        $this->Cell(60,10,'Preguntas',1,0,'C');
        $this->ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pages '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function TablaSimple($question){
        $newQuestion = new QuestionService();

        foreach ($question as $col)
            $this->Cell(40,7,$col,1);
            $this->Ln();
            $this->Cell(40,5,$newQuestion->getQuestions());


    }


}







$pdf=new FPDF('P','pt','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Mi primera página pdf con FPDF!');
$pdf->Output('../pdfs/PdfPhp.pdf','F');



