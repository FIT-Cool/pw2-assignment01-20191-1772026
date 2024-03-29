<?php


class BookDao
{
    public function getAllBook()
    {
        $link = ConnectionUtil::createMySQLConnection();
        $query='SELECT b.isbn,b.title,b.author,b.publisher,b.publish_date,g.id,g.name FROM book b INNER JOIN genre g ON g.id=b.genre_id';
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,"Book");
        return $result;

    }
    public function addBook($isbn,$title,$author,$publisher,$publish_date,$genre_id,$synopsis=null,$cover=null){
        $link = ConnectionUtil::createMySQLConnection();
        $link->beginTransaction();
        $query='INSERT INTO book VALUES (?,?,?,?,?,?,?,?)';
        $statement = $link->prepare($query);
        $statement->bindParam(1,$isbn,PDO::PARAM_STR);
        $statement->bindParam(2,$title,PDO::PARAM_STR);
        $statement->bindParam(3,$author,PDO::PARAM_STR);
        $statement->bindParam(4,$publisher,PDO::PARAM_STR);
        $statement->bindParam(5,$publish_date,PDO::PARAM_STR);
        $statement->bindParam(6,$cover,PDO::PARAM_STR);
        $statement->bindParam(7,$synopsis,PDO::PARAM_STR);
        $statement->bindParam(8,$genre_id,PDO::PARAM_INT);
        if ($statement->execute()){
            $link->commit();
        }else{
            $link->rollBack();
        }
        $link=null;
    }

}