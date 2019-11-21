var http = require('http')
// var mod1 = require('./module')
var mod2 = require('./module02')


http.createServer(function (req, res) {
    res.writeHead(200, {'Content-type': 'text/plain'})
    res.write("Hello from JS\n")
    // mod1.myfunc()
    mod2.myfunc()
    mod2.buildHtml()
    // res.write(mod1.myvar)
    res.write(mod2.othervar)
    res.end()
}).listen(8080)