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
            /* @var $genre Genre */
            foreach ($genres as $genre) {
                echo '<option value="' . $genre->getId() . '">' . $genre->getName() . '</option>';
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
    /* @var $book Book */
    foreach ($books as $book) {
        echo '<tr>';
        echo $book->getCover()!= null && file_exists($book->getCover()) ? '<td><img src="'.$book->getCover().'"></td>' :'<td></td>';
        echo '<td>' . $book->getIsbn(). '</td>';
        echo '<td>' . $book->getTitle() . '</td>';
        echo '<td>' . $book->getAuthor() . '</td>';
        echo '<td>' . $book->getPublisher() . '</td>';

        echo '<td>' .
            DateTime::createFromFormat('Y-m-d', $book->getPublishDate())->format('d M Y')
            . '</td>';
        echo '<td>' . $book->getGenre()->getName() . '</td>';
    }
    ?>
    </tbody>
</table>