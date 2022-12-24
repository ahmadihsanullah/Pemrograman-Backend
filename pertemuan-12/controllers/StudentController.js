// import models
const Student = require("../models/Student");

class StudentController{
    // menambahkan keyword asysn untuk memberi tahu proses aynchronus
    async index(req, res) {
        //memanggil method static all dengan async await 
        const students = await Student.all()
        const data = {
            message: "Menampilkan semua students",
            data: students
            };
        
            res.json(data);
    };

    async store (req, res)
    {
        /**
         * Todo 2 : memanggil method create
         * method create mengembalikan data yang baru diinsert
         * kembalikan dalam bentuk json
        */
        const { nama } = req.body;
        const { nim } = req.body;
        const { email } = req.body;
        const { jurusan } = req.body;
        const students = await Student.create(nama, nim, email, jurusan); 
        const data = {
            message: "Menampilkan student baru",
            data: students
            };
              
        res.json(data);

    }

}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
