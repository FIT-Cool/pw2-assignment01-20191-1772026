<?php


class GenreDao
{

    public function getAllGenre()
    {
        $link = Connection::createMySQLConnection();
        $query = 'SELECT * FROM genre ORDER BY name ';
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,"Genre");
        return $result;

    }

    public function addGenre(Genre $genre)
    {
        $link = Connection::createMySQLConnection();
        $link->beginTransaction();
        $query = 'INSERT INTO genre(name) VALUES (?)';
        $statement = $link->prepare($query);
        $statement->bindValue(1, $genre->getName(), PDO::PARAM_STR);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    public function deleteGenre(Genre $genre)
    {
        $link = Connection::createMySQLConnection();
        $link->beginTransaction();
        $query = 'DELETE FROM genre WHERE id = ?';
        $statement = $link->prepare($query);
        $statement->bindValue(1, $genre->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    public function updateGenre(Genre $genre)
    {
        $link = Connection::createMySQLConnection();
        $link->beginTransaction();
        $query = 'UPDATE genre SET name = ? WHERE id = ?';
        $statement = $link->prepare($query);
        $statement->bindValue(1, $genre->getName(), PDO::PARAM_STR);
        $statement->bindValue(2, $genre->getId(), PDO::PARAM_INT);
        if ($statement->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        $link = null;
    }

    public function getGenre($id)
    {
        $link = Connection::createMySQLConnection();
        $query = "SELECT * from genre WHERE id = ? LIMIT 1";
        $statement = $link->prepare($query);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchObject('Genre');
        $link = null;
        return $result;
    }

}