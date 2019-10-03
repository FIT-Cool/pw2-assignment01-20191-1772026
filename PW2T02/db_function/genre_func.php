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
function getGenre($id){
    $link = createMySQLConnection();
    $query = "SELECT * from genre WHERE id = ? LIMIT 1";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id,PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;
    return $result;
}
