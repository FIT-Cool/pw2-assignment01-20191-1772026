function deleteGenre(id) {
    var confirmation=window.confirm("Are you sure want to delete?");
    if(confirmation){
        window.location = "index.php?menu=gru&delcom=1&id="+id;
    }
}

function updateGenre(id) {

    window.location = "index.php?menu=gru&id="+id;
}

