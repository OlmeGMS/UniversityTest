<?php

interface IEvaluationDao{
    public function getAll();
    public function getEvaluation(Evaluation $evaluation);
    public function insertEvaluation(Evaluation $evaluation);
    public function updateEvaluation(Evaluation $evaluation);
}
?>