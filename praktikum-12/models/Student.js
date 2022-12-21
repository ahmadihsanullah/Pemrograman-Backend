// import database

const db = require("../config/database");

// membuat class student
class Student{

    // solution with callback
    // static all(callback)
    // {
    //     const query = "SELECT * FROM students"
    //     /**
    //      * melakukan qery dengan method query
    //      * menerima 2 param (query, callback())
    //      */

    //     db.query(query,(err, results)=>{
    //         callback(results);
    //     });
    // }

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

}

// export class
module.exports = Student;