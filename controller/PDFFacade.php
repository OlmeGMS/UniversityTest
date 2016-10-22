<?php

require_once __DIR__.'/../services/fpdf/fpdf.php';
require_once __DIR__.'/../model/question/Question.class.php';
require_once __DIR__.'/../model/question/QuestionDao.class.php';
require_once __DIR__.'/../services/QuestionService.php';
require_once __DIR__.'/../services/EvaluationService.php';

class PDFFacade extends FPDF {
    
    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4') {
        parent::__construct($orientation, $unit, $size);
    }
            
    function Header()
    {
        //$this->Image("../view/img/placeholders/avatars/integer-soft.jpg",10,8,35,38,"JPG","http://www.integer-soft.com");
        $this->SetFont('Arial','B',15);
        $this->Cell(80);
        $this->Cell(60,10,'Reporte de evaluaciones',1,0,'C');
        $this->ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pages '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function TablaSimple(){
        $evaluationService = new EvaluationService();
        $listEvaluations = $evaluationService->getAllEvaluations();
        $header=array('Código','Fecha de registro','Fecha inicial','Fecha final','Tipo evaluación'); 
        $this->Cell(80,15,$header[0],1); 
        $this->Cell(80,15,$header[1],1); 
        $this->Cell(80,15,$header[2],1); 
        $this->Cell(80,15,$header[3],1); 
        $this->Cell(80,15,$header[4],1); 
        $this->Ln();
        foreach ($listEvaluations as $evaluation) {
            $this->Cell(80,15,$evaluation->getId(),1);
            $this->Cell(80,15,$evaluation->getRegisterDate(),1);
            $this->Cell(80,15,$evaluation->getInitialDate(),1); 
            $this->Cell(80,15,$evaluation->getEndDate(),1); 
            $this->Cell(80,15,$evaluation->getType(),1); 
            $this->Ln();
        } 
    }
}
