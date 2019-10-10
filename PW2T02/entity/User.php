<?php


class User
{
    private $user,$password;/**
 * @return mixed
 */
public function getUser()
{
    return $this->user;
}/**
 * @param mixed $username
 */
public function setUser($user)
{
    $this->user = $user;
}/**
 * @return mixed
 */
public function getPassword()
{
    return $this->password;
}/**
 * @param mixed $password
 */
public function setPassword($password)
{
    $this->password = $password;
}
}