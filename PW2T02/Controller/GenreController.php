<?php


class GenreController
{
    private $genreDao;

    public function __construct()
    {
        $this->genreDao = new GenreDao();
    }

    public function index()
    {
        //Block below for delete
        $deleteComand = filter_input(INPUT_GET, 'delcom');
        if (isset($deleteComand) && $deleteComand == 1) {
            $id = filter_input(INPUT_GET, 'id');
            $genre = new Genre();
            $genre->setId($id);
            $this->genreDao->deleteGenre($genre);
        }
        //Block below for insert
        $submitted = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitted)) {
            $name = filter_input(INPUT_POST, 'txtName');
            $genre = new Genre();
            $genre->setName($name);
            $this->genreDao->addGenre($genre);
        }
        $genres = $this->genreDao->getAllGenre();
        include_once 'View/Genre.php';
    }
}