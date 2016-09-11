<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-09
 * Time: 20:10
 */
require ('../model/evaluation/FactoryEvaluation.php');
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

    function createEvaluation($type, $var){
        $factoryEvaluation = new FactoryEvaluation();
        $factoryEvaluation->createEvaluation($type, $var);
        $this->evaluationDao->insertEvaluation($this->evaluation);
    }
}