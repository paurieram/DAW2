const express = require("express");
const fileUpload = require('express-fileupload');
const router = express.Router();
router.use(fileUpload());
router.route('/')
  .get(function (req, res) {
    res.render("parte");
  })
  .post(function (req, res) {
      // 
      let File;
      let uploadPath;
      if (!req.files || Object.keys(req.files).length === 0) {
        return res.status(400).send('No files were uploaded.');
      }
    
      // The name of the input field (i.e. "File") is used to retrieve the uploaded file
      File = req.files.pdf;
      uploadPath = __dirname + '/../files/' + Math.random().toString(36).substr(2)+".pdf";
    
      // Use the mv() method to place the file somewhere on your server
      File.mv(uploadPath, function(err) {
        if (err)
          return res.status(500).send(err);
    
        res.send('File uploaded!');
      });
  });

module.exports = router;    
