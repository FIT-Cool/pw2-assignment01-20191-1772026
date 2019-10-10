<?php


class UserDao
{
    public function login($username, $password)
    {
        $link = Connection::createMySQLConnection();
        $query = "SELECT id, login.user,name FROM login WHERE login.user = ? AND password = md5(?)";
        $statement = $link->prepare($query);
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $password);
        $statement->execute();
        $result = $statement->fetchObject('User');
        $link = null;

        return $result;
    }
}