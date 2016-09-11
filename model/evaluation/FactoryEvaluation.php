<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-06
 * Time: 20:59
 */
class FactoryEvaluation implements IFactoryEvaluation
{
    function __construct()
    {
    }

    public function createEvaluation($type, $var)
    {
        switch($type) {
            case "manual":
                return new EvaluationManual($var);
                break;
            case "automatic":
                return new EvaluationAutomatic($var);
                break;
        }
    }

}