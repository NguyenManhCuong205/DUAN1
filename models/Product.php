<?php
class Product extends BaseModel
{
    // lấy ra tất cả các bản ghi
    public function all()
    {
        $sql = 'SELECT * from products';
        //chuẩn bị thực thi 
        $stmt = $this->conn->prepare($sql);
        //thực thi
        $stmt->execute();
        //trả vể dữ liệu
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Thêm mới sản phẩm
    public function create($data)
    {
        $sql = " INSERT into products (name,image,price,quantity,description,category_id) values (:name,:image,:price,:quantity,:description,:category_id) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
}
