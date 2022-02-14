const express = require("express");
const app = express();
const productos = require("./routes/productos");
//---directori public
app.use(express.static("./public"));
//---vizualitzacions
app.set("view engine", "pug");
app.set("views", "./views");
//---rebre post
// app.use(express.json);
app.use(express.urlencoded({extended: true}));
//---enrutament
app.use("/productos", productos);
//---enllaços
app.get("/", (req,res) => {
    // res.send("<h1>HOME</h1>");
    res.render("home");
});
app.all("*", (req,res) => {
    res.send("<h1>SITIO NO ENCONTRADO</h1>");
});

app.listen(80);