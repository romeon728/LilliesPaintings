var express = require('express');
var app = express();
var path = require('path');

app.get('/', function(req, res) {
	res.sendFile(path.join(__dirname + '/home.html'));
});
app.listen(9000);
