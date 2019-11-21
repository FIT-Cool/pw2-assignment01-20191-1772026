var http = require('http')
var fs = require('fs')

http.createServer(function (req, res) {
    res.writeHead(200, {'Content-type': 'text/html'})
    fs.readFile('./view/index.html',function (err, data) {
        if(err){
            res.writeHead(404)
            res.write('File not Found')
        }else {
            res.write(data)
        }
    res.end()
    })
}).listen(8080)
