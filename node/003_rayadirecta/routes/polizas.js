const express = require("express");
const router = express.Router();

router.get("/", (req,res) => {
    polizas = ["P12345678","P12345679","P12345670"];
    res.render("polizas",{array: polizas});
});
router.get("/:id(P[0-9]{8})", (req,res) => {
    res.render("poliza", req.params);
});

module.exports = router;    