var url=require('url')
var fs=require('fs')

function readHtmlFile(path, response) {
    fs.readFile(path,function (err, data) {
        if(err){
            response.writeHead(404)
            response.write('File not Found')
        }else {
            response.write(data)
        }
        response.end()
    })
}

module.exports={
    handleRequest:function (req,res){
        res.writeHead(200,{'Content-type': 'text/html'});
        var path=url.parse(req.url).pathname;
        switch (path) {
            case '/':
                readHtmlFile('./view/index.html',res);
                break;
            case '/home':
                readHtmlFile('./view/index.html',res);
                break;
            case '/about':
                readHtmlFile('./view/about.html',res);
                break;
            default:
                readHtmlFile('./view/index.html', res);
                break
        }
    }
}