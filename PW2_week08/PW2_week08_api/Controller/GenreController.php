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
//            $genre = new Genre();
//            $genre->setName($name);
            Utility::curl_post("http://localhost/PW2_week08_api/Service/addGenreService.php",array('txtName'=> $name));
//            $this->genreDao->addGenre($genre);
        }
        $genre=Utility::curl_get("http://localhost/PW2_week08_api/Service/getAllGenreService.php",array());
        $genres=json_decode($genre);
        var_dump($genres);
        include_once 'View/Genre.php';
    }
}