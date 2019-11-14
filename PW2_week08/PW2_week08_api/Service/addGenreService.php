<?php
include_once '../Model/db_function/ConnectionUtil.php';
include_once '../Model/db_function/GenreDao.php';
include_once '../Model/entity/Genre.php';
$name=filter_input(INPUT_POST,'txtName');
$genre=new Genre();
$genre->setName($name);
$genreDao=new GenreDao();
$result=$genreDao->addGenre($genre);
$data=array('status'=>$result);
header('Content-type:application/json');
echo json_encode($data);