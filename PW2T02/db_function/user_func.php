<?php
function login($username, $password)
{
    $link = createMySQLConnection();
    $query = "SELECT id, username, name FROM user WHERE username = ? AND password = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $username);
    $statement->bindParam(2, $password);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;

    return $result;
}
?>