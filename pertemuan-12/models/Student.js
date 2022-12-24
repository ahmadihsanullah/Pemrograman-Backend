// import database

const db = require("../config/database");


// membuat class student
class Student{  
    // solution with promise * async await
    static all()
    {
        return new Promise((resolve,reject)=>{
            const query = "SELECT * FROM students"
            /**
             * melakukan qery dengan method query
             * menerima 2 param (query, callback())
             */
    
            db.query(query,(err, results)=>{
                resolve(results);
            });
        })
       
    }

    /**
     * Todo 1 : Buat funsi create untuk insert data
     *  method menerima parameter data yang akan diinsert
     *  method mengembalikan data student yang baru diinsert 
     */
    static create(nama, nim, email, jurusan)
    {       
        return new Promise((resolve, reject)=>{
            
            const query = `INSERT INTO students  VALUES (default,"${nama}", "${nim}", "${email}", "${jurusan}", now(), now())`

            const view = `SELECT * FROM students where nim = "${nim}"`

            db.query(query)
            db.query(view,(err,results)=>{
                resolve(results)
            })
        });     
       

    }

}

// export class
module.exports = Student;
