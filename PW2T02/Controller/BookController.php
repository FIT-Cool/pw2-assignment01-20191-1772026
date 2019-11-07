<?php


class BookController
{
    private $genreDao;
    private $bookDao;

    public function __construct()
    {
        $this->genreDao = new GenreDao();
        $this->bookDao = new BookDao();
    }

    public function index()
    {
        $submitted = filter_input(INPUT_POST, 'btnSubmit');
        if (isset($submitted)) {
            $isbn = filter_input(INPUT_POST, 'txtISBN');
            $title = filter_input(INPUT_POST, 'txtTitle');
            $author = filter_input(INPUT_POST, 'txtAuthor');
            $publisher = filter_input(INPUT_POST, 'txtPublisher');
            $publish_date = filter_input(INPUT_POST, 'txtPublishDate');
            $synopsis = filter_input(INPUT_POST, 'txtSynopsis');
            $genre_id = filter_input(INPUT_POST, 'comboGenre');
            if (ViewUtil::fieldNotEmpty(array($isbn, $title, $author, $publisher, $publish_date, $genre_id, $synopsis))) {
                try {
                    if (isset($_FILES['txtCover']['name'])) {
                        $targetDirectory = 'uploads/';
                        $targetFile = $targetDirectory . $isbn . '.' . pathinfo($_FILES['txtCover']['name'], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES['txtCover']['tmp_name'], $targetFile);
                        $this->bookDao->addBook($isbn, $title, $author, $publisher, $publish_date, $genre_id, $synopsis, $targetFile);
                    } else {
                        $this->bookDao->addBook($isbn, $title, $author, $publisher, $publish_date, $genre_id, $synopsis);
                    }
                    header("Location: index.php?menu=bk");
                } catch (Exception $e) {
                    echo '<script language="javascript">';
                    echo 'alert("ISBN tidak boleh duplicate")';  //not showing an alert box.
                    echo '</script>';
                }
//    var_dump($targetFile);
            } else {
                $errMessage = 'Please check you input';
            }


//    addBook($isbn, $title, $author, $publisher, $publish_date,$synopsis, $genre);
        }
        if (isset($errMessage)) {
            echo '<div class="err-msg">' . $errMessage . '</div>';
        }
        $genres = $this->genreDao->getAllGenre();
        $books=$this->bookDao->getAllBook();
        include_once 'View/Book.php';
    }
}