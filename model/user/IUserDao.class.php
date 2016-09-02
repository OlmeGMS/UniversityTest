<?php

interface IUserDao{
    public function getAll();
    public function getUser(User $user);
    public function insertUser(User $user);
    public function login(User $user);
}
?>