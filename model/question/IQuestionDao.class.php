<?php

interface IQuestionDao{

    public function getAll();
    public function insertQuestion(Question $question);
}
?>