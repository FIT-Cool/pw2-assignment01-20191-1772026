var http=require('http');
http.createServer(function (req, res) {
    res.writeHead(200,{'Content-type': 'text/plain'})
    res.write('Hello World')
    res.end()
}).listen(8080)