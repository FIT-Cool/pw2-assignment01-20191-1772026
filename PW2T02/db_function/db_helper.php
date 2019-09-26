<?php
function createMySQLConnection()
{
    $database="mysql";
    $databaseName="pw22091";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $link;
}
?>