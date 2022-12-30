// import models
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword asysn untuk memberi tahu proses aynchronus
  async index(req, res) {
    //memanggil method static all dengan async await
    const students = await Student.all();

    if (students.length > 0 ){
       const data = {
         message: "Menampilkan semua students",
         data: students,
       };

       return res.status(200).json(data);
    }
      const data = {
        messagge : "student is empty"
    }
      return res.status(200).json(data)
    
   
  }

  async store(req, res) {
    /**
     * validasi sederhana
     * menghandle jika salah satu data tidak dikirim
     */
    const {nama, nim, email, jurusan} = req.body

    // jika data undefined maka kirim response
    if(!nama ||  !nim || !email || !jurusan){
      const data = {
        message : "Semua data harus dikirim"
      }
      return res.status(422).json(data)

    }
    // else
    const students = await Student.create(req.body);
    const data = {
      message: "Menampilkan student baru",
      data: students,
    };

    return res.status(200).json(data);
  }

  async update(req, res){
    const { id } = req.params;
    // mencari id student yang ingin diupdate
    const student = await Student.find(id)
    if(student){  
    const student = await Student.update(id,req.body);
      const data = {
        message: "Mengedit data student",
        data: student,
      };
      res.status(200).json(data);
    }else{
      const data = {
        message : "Student not found"
      }
      res.status(404).json(data)
    }
  }

  async destroy(req, res){
    const { id } = req.params;
    const student = await Student.find(id);

    if (student)
    {
      await Student.delete(id);
      const data = {
        message : "Menghapus data student"
      }
      res.status(200).json(data)
    }else{
      const data = {
        message : "Student not found"
      }
      res.status(404).json(data);
    }
  }

  async show(req, res ){
    const { id } = req.params;
    const student = await Student.find(id);

    if (student)
    {
      const data = {
        message : "Menampilkan detail student",
        data : student
      };
      res.status(200).json(data)
    }else{
      const data = {
        mesage : "Student not found"
      };
      res.status(404).json(data);
    }
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
  module.exports = object;
