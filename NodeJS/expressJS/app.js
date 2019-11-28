var express=require('express');
var app=express();

app.get('/',function (req, res) {
    res.send('Hello World')
})
app.get('/home',function (req, res) {
    res.send("Home Page")
})
app.get('/about',function (req, res) {
    res.send('About')
})
var server=app.listen(8080)