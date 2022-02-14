const express = require("express");
const app = express();
const polizas = require("./routes/polizas");
const partes = require("./routes/partes");
const clientes = require("./routes/clientes");
//---directori public
app.use(express.static("./public"));
//---vizualitzacions
app.set("view engine", "pug");
app.set("views", "./views");
//---rebre post
// app.use(express.json);
app.use(express.urlencoded({extended: true}));

//---enrutament
app.use("/polizas", polizas);
app.use("/partes", partes);
app.use("/clientes", clientes);

//rutas
app.post("/presupuesto", (req,res) => {
    req.body.tercers=req.body.potencia*6;
    if(req.body.edad>=28 && req.body.edad<=50){
      req.body.tercers=req.body.tercers-100;
    }
    if(req.body.sexo>="M"){
      req.body.tercers=req.body.tercers-25;
    } 
    if(req.body.anos>=25){
      req.body.tercers=req.body.tercers-200;
    }else if(req.body.anos>=10){
      req.body.tercers=req.body.tercers-100;
    }
    if(req.body.partes>=2 && req.body.partes<=3){
      req.body.tercers=req.body.tercers-25;
    }else if(req.body.partes<=1){
      req.body.tercers=req.body.tercers-50;
    }
    if(req.body.kilometros<=25000){
      req.body.tercers=req.body.tercers-25;
    } 
    if(req.body.garaje!="N"){
      req.body.tercers=req.body.tercers-100;
    } 
    res.render("presupuesto",req.body);
});
app.get("/info", (req,res) => {
    res.render("info");
});

app.get("/", (req,res) => {
    res.render("index");
});

app.all("*", (req,res) => {
    res.render("404");
});

app.listen(80);