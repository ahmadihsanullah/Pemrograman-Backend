// import database

const db = require("../config/database");

// membuat class student
class Student {
  // solution with promise * async await
  static all() {
    return new Promise((resolve, reject) => {
      const query = "SELECT * FROM students";
      /**
       * melakukan qery dengan method query
       * menerima 2 param (query, callback())
       */

      db.query(query, (err, results) => {
        resolve(results);
      });
    });
  }

  /**
   * Todo 1 : Buat fungsi create untuk insert data
   *  method menerima parameter data yang akan diinsert
   *  method mengembalikan data student yang baru diinsert
   */
  static async create(data){
    // melakukan insert data ke database
    const id = await new Promise((resolve, reject)=>{
      const sql = "INSERT INTO students SET ?";
      db.query(sql, data, (err, result)=>{
        resolve(result.insertId);
      });
    });
    // melakukan query berdasarkan id
    // mencari data yang baru diupdate
    const student = await this.find(id);
    return student;
  }

  static find(id){
    return new Promise((resolve, reject)=>{
      const sql = "SELECT * FROM students WHERE id = ?" 
      db.query(sql,id, (err, results)=>{
        const [student] = results
        resolve(student)
      })
    })
  }

  // mengupdate data student+
  static async update(id, data){
    await new Promise((resolve, reject)=>{
      const sql = "UPDATE students SET ? where id = ?";
      db.query(sql, [data, id], (err, results)=>{
        resolve(results);
      })
    })

    // mencaridatayangbarudiupate
    const student = await this.find(id);
    return student;
  }

  // menghapus data student
  static delete(id){
    return new Promise((resolve, reject)=>{
      const sql = "DELETE FROM students WHERE id = ?";
      db.query(sql,id, (err, results)=>{
        resolve(results);
      })
    })
  }
}

// export class
module.exports = Student;
