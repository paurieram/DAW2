const express = require("express");
const router = express.Router();

router.route('/login')
  .get(function (req, res) {
    res.render("login");
  })
  .post(function (req, res) {
      if(req.body.user == "12345678A" && req.body.password == "user1234"){
        res.render("index");
      }else{
        res.render("login",{error:"Usuari o Contrasenya incorrectes!"});
      }
  });

module.exports = router;    