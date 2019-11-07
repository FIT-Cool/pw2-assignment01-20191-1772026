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
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    /* @var $genre Genre */
    foreach ($genres as $genre) {
        echo '<tr>';
        echo '<td>' . $genre->getId() . '</td>';
        echo '<td>' . $genre->getName() . '</td>';
        echo '<td><button onclick="deleteGenre(\''. $genre->getId() .'\')">Delete</button><button onclick="updateGenre(\''. $genre->getId() .'\')">Edit</button></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>