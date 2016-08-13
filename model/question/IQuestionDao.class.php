<?php

interface IQuestionDao{

    public function getAll();
    public function insertQuestion(Question $question);
    public function getOne(Question $question);
    public function obtenerMateria();

}
?>