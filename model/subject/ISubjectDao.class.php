<?php

interface ISubjectDao{
    public function getAll();
    public function getSubject(Subject $subject);
    public function insertSubject(Subject $subject);
    public function updateSubject(Subject $subject);
}
?>