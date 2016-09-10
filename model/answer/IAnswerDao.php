<?php

/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 7/09/16
 * Time: 12:29 PM
 */
interface IAnswerDao
{
    public function getAll();
    public function insertAnswer(Answer $answer);
}