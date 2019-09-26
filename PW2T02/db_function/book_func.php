<?php
function getAllGenre()
{
    $link=createMySQLConnection();
    $query='SELECT * FROM genre ORDER BY name ';
    $result=$link->query($query);
    return $result;

}
function addGenre($name){
    $link = createMySQLConnection();
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
function deleteGenre($id){
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query='DELETE FROM genre WHERE id = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$id,PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}
function updateGenre($id, $name){
    $link = createMySQLConnection();
    $link->beginTransaction();
    $query='UPDATE genre SET name = ? WHERE id = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$name,PDO::PARAM_STR);
    $statement->bindParam(2,$id,PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}
function getAllBook()
{
    $link = createMySQLConnection();
    $query='SELECT b.isbn,b.title,b.author,b.publisher,b.publish_date,g.name FROM book b INNER JOIN genre g ON g.id=b.genre_id';
    $result=$link->query($query);
    return $result;

}