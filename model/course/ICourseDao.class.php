<?php

interface ICourseDao{

    public function getAll();
    public function insertCourse(Course $course);
    public function  getOne(Course $course);
}

?>