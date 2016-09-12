<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-11
 * Time: 13:45
 */

require_once ('../../../model/evaluation/Evaluation.class.php');

require_once ('../../../utils/DbConnection.php');
require_once  ('../model/question/Question.class.php');
require_once  ('../model/subject/Subject.class.php');

class EvaluationService
{
    private $conn = null;

    function __construct() {
        $this->conn = DBConnection::connect();
    }


}