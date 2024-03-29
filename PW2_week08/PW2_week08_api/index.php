<?php
session_start();
include_once 'Controller/GenreController.php';
include_once 'Controller/BookController.php';
include_once 'Controller/UserController.php';
include_once 'Model/db_function/ConnectionUtil.php';
include_once 'Model/db_function/GenreDao.php';
include_once 'Model/db_function/BookDao.php';
include_once 'Model/db_function/UserDao.php';

include_once 'Model/entity/Genre.php';
include_once 'Model/entity/Book.php';
include_once 'Model/entity/User.php';
include_once 'Util/ViewUtil.php';
include_once 'Service/Utility.php';


if (!isset($_SESSION['user_logged'])) {
    $_SESSION['user_logged'] = false;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Steven Rumanto (1772026)">
    <meta name="description" content="PHP Navigation and PHP Data Object (PDO)">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemrograman Web 2</title>
    <link rel="stylesheet" href="View/css/index.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript" src="View/js/genre.js"></script>
</head>
<body>
<div class="page">
    <?php
    if ($_SESSION['user_logged']) {
        ?>
        <header>
            <h2>PHP Navigation 6 PDO</h2>
        </header>
        <nav class="flex-container">

            <div><a href="?menu=hm">Home</a></div>
            <div><a href="?menu=at">About</a></div>
            <div><a href="?menu=gr">Genre</a></div>
            <div><a href="?menu=bk">Book</a></div>
            <div><a href="?menu=out">Logout</a></div>
        </nav>
        <main>
            <?php
            $targetMenu = filter_input(INPUT_GET, 'menu');
            switch ($targetMenu) {
                case 'hm';
                    include_once 'View/home.php';
                    break;
                case 'at';
                    include_once 'View/About.php';
                    break;
                case 'gr';
//                    include_once 'View/Genre.php';
                    $genreController=new GenreController();
                    $genreController->index();
                    break;
                case 'gru';
                    include_once 'View/GenreUpdate.php';
                    break;
                case 'bk';
//                    include_once 'View/Book.php';
                    $bookController=new BookController();
                    $bookController->index();
                    break;
                case 'out':
                    session_destroy();
                    header("location:index.php");
                    break;
                default;
                    include_once 'View/home.php';
            }
            ?>
        </main>
        <footer>
            Pemrograman Web 2 &copy;2019
        </footer>
        <?php
    } else {
        $userController=new UserController();
        $userController->index();
//        include_once 'View/login.php';
    }
    ?>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</html>
