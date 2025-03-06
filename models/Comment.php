<?php

class Comment extends BaseModel
{
    // hien thi
    public function listCommentInProduct($product_id) {
        $sql = "SELECT c.*, fullname FROM comments c JOIN users u ON u.id=c.user_id WHERE product_id=:product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    // hien thi cac san pham co binh luan
    public function listProductHasComments(){
        $sql = "SELECT p.id, name, count(c.id) 'count' FROM products p JOIN comments c ON p.id=c.product_id GROUP BY p.id, name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO comments(user_id, product_id, content) VALUES (:user_id, :product_id, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }

    public function updateActive($id, $active){
        $sql = "UPDATE comments SET active=:active WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id, 'active' => $active]);
    }

    // hien thi binh luan ơ clients
    public function listCommentInProductClient($product_id) {
        $sql = "SELECT c.*, fullname FROM comments c JOIN users u ON u.id=c.user_id WHERE product_id=:product_id AND c.active = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
