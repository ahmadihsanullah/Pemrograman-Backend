// membuat class controller

class StudentController{
    index(req,res){
        const data  = {
            "message": "Menampilkan data student",
            "data" : []
        };
        res.json(data);
    }

    store(req,res){
        const { nama } = req.body;
        const data = {
            "message" : `menambah data student ${nama}`,
            "data" : []
        }
        res.json(data);
    }

    update(req,res){
        const { id } = req.params;
        const { nama } = req.body;
        const data = {
            "message": `mengupdate student ${id} nama ${nama}`,
            "data" : []
        }
        res.json(data);
    }

    destroy(req,res){
        const { id } = req.params;
        const data = {
            "message" : `menghapus student ${id}`,
            "data" : []
        };
        res.json();
    }
}

const object = new StudentController();

module.exports = object;