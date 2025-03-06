<?php

class Product extends BaseModel
{

    public function all()
    {
        //Câu lệnh sql
        $sql = "SELECT p.*, c.cate_name FROM products p JOIN categories c ON p.category_id=c.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchProductName($name){
        $sql = "SELECT p.*, c.cate_name FROM products p JOIN categories c ON p.category_id=c.id WHERE name LIKE '%$name%' ";
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //Lấy sản phẩm theo loại
    public function listProductInCategory($id)
    {
        $sql = "SELECT p.*, c.cate_name FROM products p JOIN categories c ON p.category_id=c.id WHERE c.id=:id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Lọc sản phẩm theo sản phẩm
    public function listPets()
    {
        $sql = "SELECT p.*, c.cate_name, type FROM products p JOIN categories c ON p.category_id=c.id WHERE type=1 LIMIT 4";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
    public function listOtherProduct()
    {
        $sql = "SELECT p.*, c.cate_name, type FROM products p JOIN categories c ON p.category_id=c.id WHERE type=0";
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Thêm mới sản phẩm
    public function create($data)
    {
        $sql = "INSERT INTO products(name, image, price, quantity, status, description, category_id) VALUES(:name, :image, :price, :quantity, :status, :description, :category_id)";
        echo $sql;
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE products SET name=:name, image=:image, price=:price, quantity=:quantity, description=:description, status=:status, category_id=:category_id WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        //Thêm id và mảngr data
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}


