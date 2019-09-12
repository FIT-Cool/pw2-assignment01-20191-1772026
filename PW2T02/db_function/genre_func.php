<?php
function getAllGenre()
{
    $database="mysql";
    $databaseName="pw22091";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $query='SELECT * FROM genre ORDER BY name ';
    $result=$link->query($query);
     return $result;

}
function addGenre($name){
    $database="mysql";
    $databaseName="pw22091";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query='INSERT INTO genre(name) VALUES (?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$name,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}