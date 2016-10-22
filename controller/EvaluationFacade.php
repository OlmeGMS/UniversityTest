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

    function __construct()
    {
        $this->evaluationDao = new EvaluationDao();
    }

    function createEvaluation(Evaluation $evaluation){
        if ($this->evaluationDao->insertEvaluation($evaluation)){
            return true;
        }else{
            return false;
        }
        //falta asignacion de estudiantes
    }
}