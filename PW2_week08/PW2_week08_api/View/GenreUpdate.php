<?php
$genreDao=new GenreDao();
/* @var $genre Genre*/
//Block below for delete
$id=filter_input(INPUT_GET,'id');
if (isset($id)){
    $genre=$genreDao->getGenre($id);


}
//Block below for insert
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    header("Location: index.php?menu=gr");
    $name = filter_input(INPUT_POST, 'txtName');
    $genre->setName($name);
    $genre->setId($id);
    $genreDao->updateGenre($genre);
}
?>
<form method="post">
    <fieldset>
        <legend>Update Genre</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name (e.g Cooking)" autofocus required
               class="form-input" value="<?php echo $genre->getName(); ?>">

            <input  type="submit" name="btnSubmit" value="Update Genre" class="button button-primary">

    </fieldset>
</form>