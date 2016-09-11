<?php

require ('Evaluation.class.php');

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-06
 * Time: 20:53
 */
class EvaluationAutomatic extends Evaluation
{
    private $quantityQuestions;

    public function __construct($quantityQuestions)
    {
        $this->quantityQuestions = $quantityQuestions;
        parent::__construct();
    }


}