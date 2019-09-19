<?php
//Block below for delete
$id=filter_input(INPUT_GET,'id');
if (isset($id)){
    $genre=getGenre($id);

}
//Block below for insert
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $name = filter_input(INPUT_POST, 'txtName');
    updateGenre($id,$name);
}
?>
<form method="post">
    <fieldset>
        <legend>Update Genre</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name (e.g Cooking)" autofocus required
               class="form-input" value="<?php echo $genre['name']; ?>">
        <input  type="submit" name="btnSubmit" value="Update Genre" class="button button-primary">
    </fieldset>
</form>
<!---->
<!--<table id="myTable" class="display">-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>ID</th>-->
<!--        <th>Name</th>-->
<!--        <th>Actions Delete</th>-->
<!--        <th>Actions Update</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    --><?php
//    $genres = getAllGenre();
//    foreach ($genres as $genre) {
//        echo '<tr>';
//        echo '<td>' . $genre['id'] . '</td>';
//        echo '<td>' . $genre['name'] . '</td>';
//        echo '<td><button onclick="deleteGenre(' . $genre['id'] . ')">Delete</button></td>';
//        echo '<td><button onclick="updateGenre(' . $genre['id'] . ')">Updates</button></td>';
//        echo '</tr>';
//    }
//    ?>
<!--    </tbody>-->
<!--</table>-->