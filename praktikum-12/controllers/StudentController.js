// TODO 3: Import data students dari folder data/students.js
// code here

const Students = require("../models/Student")

// Membuat Class StudentController
class StudentController {
  // index(req, res) {
  //   // TODO 4: Tampilkan data students
  //   // code here
  //   Students.all((students)=>{
  //     const data = {
  //       message: "Menampilkan semua students",
  //       data: students,
  //     };
  
  //     res.json(data);
  //   });
  // }

  // menambahkan keyword asysn untuk memberi tahu proses aynchronus
  async index(req, res) {
    //memanggil method static all dengan async await 
    const students = await Students.all()
      const data = {
        message: "Menampilkan semua students",
        data: students
      };
  
      res.json(data);
    };
  

  store(req, res) {
    const { nama } = req.body;

    // TODO 5: Tambahkan data students
    // code here
    const students = Students.push(nama);
    const data = {
      message: `Menambahkan data student: ${nama}`,
      data: students,
    };

    res.json(data);
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    // TODO 6: Update data students
    // code here
    const students = Students[id] = nama;
    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: students,
    };

    res.json(data);
  }

  destroy(req, res) {
    const { id } = req.params;

    // TODO 7: Hapus data students
    // code here
    const students = Students.splice(id, 1);
    
    const data = {
      message: `Menghapus student id ${id}`,
      data: students,
    };

    res.json(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;