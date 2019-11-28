var express = require('express');
var bodyParser=require('body-parser');
var app = express();
var urlParser=bodyParser.urlencoded({extended:false});

app.use(express.static(__dirname +'/public'));
app.get('/', function (req, res) {
    res.send('Hello World')
})
app.get('/home', function (req, res) {
    res.send("Home Page")
})
app.get('/about', function (req, res) {
    res.send('About')
})
// app.get('/genre', function (req, res) {
//     response={
//         genre_name:req.query.txtName
//     }
//     console.log(response);
//     res.sendFile(__dirname + '/view/genre_view.html')
// })
app.get('/book', function (req, res) {
    res.sendFile(__dirname + '/view/book_view.html')
})
app.post('/book',urlParser,function (req, res) {
    response={
        book_isbn: req.body.txtISBN,
        book_title: req.body.txtTitle,
        book_author: req.body.txtAuthor,
        book_publisher: req.body.txtPublisher,
        book_pdate: req.body.txtPublishDate,
        book_desc: req.body.txtSynopsis
    };
    console.log(response);
    res.sendFile(__dirname + '/view/book_view.html')
})
var server = app.listen(8080,function () {
    console.log("Server Start")
})