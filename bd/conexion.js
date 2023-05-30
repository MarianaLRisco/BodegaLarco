var mysql = require("mysql");

var con = mysql.createConnection({
  host: "localhost",
  database:"sistema_ventas",
  user: "root",
  password: "289154"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});