function deleteGenre(id) {
    var confirmation=window.confirm("Are you sure want to delete?");
    if(confirmation){

        window.location = "index.php?menu=gr&delcom=1&id="+id;
    }

}