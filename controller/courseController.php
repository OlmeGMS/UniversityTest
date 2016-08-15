<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 05/08/2016
 * Time: 0:55
 */

require_once ('../model/course/CourseDao.class.php');

session_start();
$course = new Course();
$course->setCode($_POST['code']);
$course->setName($_POST['name']);
$course->setState($_POST['state']);
$course->setIdCourse(1);
$courseDao = new CourseDao();
$validator = true;

if (!$courseDao->getOne($course)){
    $validator = false;
}
if ($validator) {
    if ($courseDao->insertCourse($course)) {
        echo true;
    } else {
        echo false;
    }
}else{
    echo false;
}

