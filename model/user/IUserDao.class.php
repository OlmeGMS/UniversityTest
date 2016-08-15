<?php

interface IUserDao{
	
public function getAll();
public function insertUser(User $user);
public function login($user,$password);
}

?>