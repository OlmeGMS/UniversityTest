<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-09
 * Time: 20:49
 */
require_once ('EvaluationFacade.php');

$evaluationController = new EvaluationController();


class EvaluationController
{

    function __construct()
    {
        $evaluationFacade = new EvaluationFacade();
    }
}

?>