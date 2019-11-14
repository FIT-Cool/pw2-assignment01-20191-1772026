<?php
include_once '../Model/entity/Genre.php';
include_once '../Model/db_function/GenreDao.php';
include_once '../Model/db_function/ConnectionUtil.php';

$genreDao=new GenreDao();
$genres=$genreDao->getAllGenre();
header('Content-type:application/json');
echo json_encode($genres->fetchAll());

