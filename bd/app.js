var express = require("express");
const path = require('path');
const morgan = require ('morgan');
const mysql = require('mysql');
const myConnection = require('express-myconnection');

const app = express();

app.set('port',process.env.PORT || 3000);
app.set('view engine','ejs');
app.set("views", path.join(__dirname,'views'));

app.use(morgan('dev'));
app.use(myConnection(mysql,{
  host: "localhost",
  user: "root",
  password: "289154",
  port:3306,
  database:"sistema_ventas" 
}, "single"));

app.listen(app.get('port'), ()=>{
  console.log("Server on port 3000");
});
// var con = mysql.createConnection({
//   host: "localhost",
//   database:"sistema_ventas",
//   user: "root",
//   password: "289154"
// });

// con.connect(function(err) {
//   if (err) throw err;
//   console.log("Connected!");
// });
// con.end();