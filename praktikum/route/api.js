// import student controller
const StudentController = require("../controllers/StudentController.js");

//import express
const express =  require("express");

// membuat objek router
const router = express.Router();

// membuat routing 

router.get("/",(req,res)=>{
    res.send("hello bro");
});

router.get('/students',StudentController.index);

router.post('/students',StudentController.store);

router.put('/students/:id',StudentController.update);

router.delete('/students/:id',StudentController.destroy);

// export router
module.exports = router;