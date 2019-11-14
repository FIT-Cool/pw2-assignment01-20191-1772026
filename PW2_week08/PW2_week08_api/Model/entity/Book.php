<?php


class Book
{
    private $isbn;
    private $title;
    private $author;
    private $publisher;
    private $publish_date;
    private $cover;
    private $synopsis;
    private $genre;

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getPublishDate()
    {
        return $this->publish_date;
    }

    /**
     * @param mixed $publish_date
     */
    public function setPublishDate($publish_date)
    {
        $this->publish_date = $publish_date;
    }

    /**
     * @return mixed
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param mixed $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return mixed
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @param mixed $synopsis
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return Genre
     */
    public function getGenre()
    {
        if ($this->genre==null){
            $this->genre=new Genre();
        }
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function __set($name, $value)
    {
        switch ($name){
            case 'id':
                $this->getGenre()->setId($value);
                break;
            case 'name':
                $this->getGenre()->setName($value);
                break;
        }
    }
}