<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-06
 * Time: 20:52
 */
class EvaluationManual extends Evaluation
{
    private $listQuestions = array();

    public function __construct($listQuestions)
    {
        parent::__construct();
        $this->listQuestions = $listQuestions;
    }
}