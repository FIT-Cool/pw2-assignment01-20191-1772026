<?php
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $isbn = filter_input(INPUT_POST, 'txtISBN');
    $title = filter_input(INPUT_POST, 'txtTitle');
    $author = filter_input(INPUT_POST, 'txtAuthor');
    $publisher = filter_input(INPUT_POST, 'txtPublisher');
    $publish_date = filter_input(INPUT_POST, 'txtPublishDate');
    $synopsis = filter_input(INPUT_POST, 'txtSynopsis');
    $genre_id = filter_input(INPUT_POST, 'comboGenre');
    if (fieldNotEmpty(array($isbn, $title, $author, $publisher, $publish_date, $genre_id, $synopsis))) {
        try {
            if (isset($_FILES['txtCover']['name'])){
                $targetDirectory = 'uploads/';
                $targetFile = $targetDirectory . $isbn . '.' . pathinfo($_FILES['txtCover']['name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['txtCover']['tmp_name'], $targetFile);
                addBook($isbn, $title, $author, $publisher, $publish_date, $genre_id, $synopsis,$targetFile);
            }else{
                addBook($isbn, $title, $author, $publisher, $publish_date, $genre_id, $synopsis);
            }
            header("Location: index.php?menu=bk");
        } catch (Exception $e) {
            echo '<script language="javascript">';
            echo 'alert("ISBN tidak boleh duplicate")';  //not showing an alert box.
            echo '</script>';
        }
//        var_dump($targetFile);
    } else {
        $errMessage = 'Please check you input';
    }


//    addBook($isbn, $title, $author, $publisher, $publish_date,$synopsis, $genre);
}
if (isset($errMessage)) {
    echo '<div class="err-msg">' . $errMessage . '</div>';
}
?>
<form method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>New Book</legend>

        <label class="form-label">ISBN</label><br>
        <input type="text" id="txtNameIdx" name="txtISBN" placeholder="ISBN" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Title</label><br>
        <input type="text" id="txtNameIdx" name="txtTitle" placeholder="Title" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Author</label><br>
        <input type="text" id="txtNameIdx" name="txtAuthor" placeholder="Author" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Publisher</label><br>
        <input type="text" id="txtNameIdx" name="txtPublisher" placeholder="Publisher" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Publish_Date</label><br>
        <input type="date" id="txtDateIdx" name="txtPublishDate" placeholder="Publish_Date" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Synopsis</label><br>
        <textarea type="text" id="txtSynopsisIdx" name="txtSynopsis" placeholder="Synopsis" autofocus required
                  class="form-input"></textarea>
        <br>
        <label for="txtCoverIdx" class="form-label">Cover</label><br>
        <input type="file" name="txtCover" class="form-input">
        <br>
        <label class="form-label">Genre</label>
        <select name="comboGenre" id="">
            <?php
            $genres = getAllGenre();
            foreach ($genres as $genre) {
                echo '<option value="' . $genre['id'] . '">' . $genre['name'] . '</option>';
            }
            ?>
        </select>
        <br>
        <input type="submit" name="btnSubmit" value="Add Book" class="button button-primary">

    </fieldset>
</form>

<table id="myTable" class="display">
    <thead>
    <tr>
        <th>Cover</th>
        <th>ISBN</th>
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Publish_Date</th>
        <th>Genre</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $books = getAllBook();
    foreach ($books as $book) {
        echo '<tr>';
        echo isset($book['cover']) && file_exists($book['cover']) ? '<td><img src="'.$book['cover'].'"></td>' :'<td></td>';
        echo '<td>' . $book['isbn'] . '</td>';
        echo '<td>' . $book['title'] . '</td>';
        echo '<td>' . $book['author'] . '</td>';
        echo '<td>' . $book['publisher'] . '</td>';

        echo '<td>' .
            DateTime::createFromFormat('Y-m-d', $book['publish_date'])->format('d M Y')
            . '</td>';
        echo '<td>' . $book['name'] . '</td>';
    }
    ?>
    </tbody>
</table>