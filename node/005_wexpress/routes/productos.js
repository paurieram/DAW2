const express = require("express");
const router = express.Router();


router.get("/", (req,res) => {
    res.send("<h1>LISTADO DE PRODUCTOS</h1>");
});
router.get("/nuevo", (req,res) => {
    res.render("nuevo.pug")
});
router.get("/:cat", (req,res) => {
    res.send("<h1>LISTADO DE "+req.params.cat+"</h1>");
});
router.get("/:cat/:sub", (req,res) => {
    res.send("<h1>LISTADO DE "+req.params.cat+" ("+req.params.sub+")</h1>");
});
router.post("/", (req,res) => {
    // res.send("<h1>PRODUCTO AÑADIDO CORRECTAMENTE</h1>");
    req.body.iva = (req.body.precio*1.21);
    res.render("datos", req.body);
});
module.exports = router;    