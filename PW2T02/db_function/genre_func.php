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
function getAllBook()
{
    $database="mysql";
    $databaseName="pw22091";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $query='SELECT b.isbn,b.title,b.author,b.publisher,b.publish_date,g.name FROM book b INNER JOIN genre g ON g.id=b.genre_id';
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
function addBook($isbn,$title,$author,$publisher,$publish_date,$genre){
    $database="mysql";
    $databaseName="pw22091";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query='INSERT INTO book(isbn,title,author,publisher,publish_date,genre_id) VALUES (?,?,?,?,?,?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$isbn,PDO::PARAM_STR);
    $statement->bindParam(2,$title,PDO::PARAM_STR);
    $statement->bindParam(3,$author,PDO::PARAM_STR);
    $statement->bindParam(4,$publisher,PDO::PARAM_STR);
    $statement->bindParam(5,$publish_date,PDO::PARAM_STR);
    $statement->bindParam(6,$genre,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}