<?php

class Category extends BaseModel
{
    public function list()
    {
        $sql = "SELECT * FROM categories where soft_delete =0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    //thêm bản ghi
    public function create($data){
        $sql = "INSERT INTO categories (cate_name, type) VALUEs(:cate_name,:type)";
        $stmt = $this->conn->prepare($sql);
        $stmt-> execute($data);
    }

    public function update($id, $data){
        $sql="UPDATE categories  SET cate_name = :cate_name, type =:type WHERE id= :id ";
        $stmt = $this->conn->prepare($sql);
        $data['id']=$id;
        $stmt->execute($data);
    }
    //xóa mềm
    public function delete($id){
        //chuyển trạng thái của ssoft_delete từ 0 sang 1
        $sql="UPDATE categories set soft_delete =1 where $id = id ";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute(['id'=> $id]);
    }

    //chi tiết 1 bản ghi 
    public function show($id){
        $sql= "SELECT * from categories ";
        $stmt= $this->conn->prepare($sql);
        $stmt-> execute();
        return $stmt ->fetch(PDO::FETCH_ASSOC);
    }
    
}
