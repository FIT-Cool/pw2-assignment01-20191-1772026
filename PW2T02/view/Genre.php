<?php
$submitted =filter_input(INPUT_POST,'btnSubmit');
if(isset($submitted)){
    $name=filter_input(INPUT_POST,'txtName');
    addGenre($name);
}
?>
<form method="post">
    <fieldset>
        <legend>New Genre</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name (e.g Cooking)" autofocus required
               class="form-input">
        <input type="submit" name="btnSubmit" value="Add Genre" class="button button-primary">
    </fieldset>
</form>

<table id="myTable" class="display">
    <thead>
    <tr>
        <tb>ID</tb>
        <tb>Name</tb>
    </tr>
    </thead>
    <tbody>
    <?php
    $genres = getAllGenre();
    foreach ($genres as $genre) {
        echo '<tr>';
        echo '<td>' . $genre['id'] . '</td>';
        echo '<td>' . $genre['name'] . '</td>';
    }
    ?>
    </tbody>
</table>