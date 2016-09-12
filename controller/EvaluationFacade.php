<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-09
 * Time: 20:10
 */

require ('../model/evaluation/EvaluationDao.class.php');
require ('../model/evaluation/Evaluation.class.php');

class EvaluationFacade
{
    private $evaluationDao;
    private $evaluation;

    function __construct()
    {
        $this->evaluationDao = new EvaluationDao();
        $this->evaluation = new Evaluation();
    }

    function createEvaluation(Evaluation $evaluation){
        $this->evaluationDao->insertEvaluation($this->evaluation);

    }

    function validateDate($initialDate,$endDate){
        try{
            $initialDate = explode("/", $initialDate);
            $endDate = explode("/", $endDate);
            if (!checkdate($initialDate[0], $initialDate[1], $initialDate[2])){
                $initialDateGregorian = gregoriantojd($initialDate[0], $initialDate[1], $initialDate[2]);
            }else{
                return "error";
            }
            if(!checkdate($endDate[0], $endDate[1], $endDate[2])) {
                $endDateGregorian = gregoriantojd($endDate[0], $endDate[1], $endDate[2]);
            }else{
                return "error";
            }
            return $initialDateGregorian - $endDate;
        }
        catch (Exception $exception){
            return false;
        }
    }
}