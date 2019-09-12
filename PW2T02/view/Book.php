<?php
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $isbn = filter_input(INPUT_POST, 'txtISBN');
    $title = filter_input(INPUT_POST, 'txtTitle');
    $author = filter_input(INPUT_POST, 'txtAuthor');
    $publisher = filter_input(INPUT_POST, 'txtPublisher');
    $publish_date = filter_input(INPUT_POST, 'txtPublishDate');
    $genre = filter_input(INPUT_POST, 'genre');
    addBook($isbn,$title,$author,$publisher,$publish_date,$genre);
}
?>
<form method="post">
    <fieldset>
        <legend>New Book</legend>

        <label class="form-label">ISBN</label>
        <input type="text" id="txtNameIdx" name="txtISBN" placeholder="ISBN" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Title</label>
        <input type="text" id="txtNameIdx" name="txtTitle" placeholder="Title" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Author</label>
        <input type="text" id="txtNameIdx" name="txtAuthor" placeholder="Author" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Publisher</label>
        <input type="text" id="txtNameIdx" name="txtPublisher" placeholder="Publisher" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Publish_Date</label>
        <input type="text" id="txtNameIdx" name="txtPublishDate" placeholder="Publish_Date" autofocus required
               class="form-input">
        <br>
        <label  class="form-label">Genre</label>
        <select name="genre" id="">
            <?php
            $genres = getAllGenre();
            foreach ($genres as $genre) {
                echo '<option value="'.$genre['id'].'">' . $genre['name'] . '</option>';
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