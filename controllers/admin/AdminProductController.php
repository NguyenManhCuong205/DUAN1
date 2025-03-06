<?php
//Controller điều khiền sản phẩm
class AdminProductController
{
    //hiển thị danh sách sản phẩm
    public function index()
    {

        $message = $_SESSION['message'] ?? '';
        unset($_SESSION['message']);
        $products = (new Product)->all();
        return view('admin.products.list', compact('products', 'message'));
    }

    //Hiển thị form thêm
    public function create()
    {
        $categories = (new Category)->list();
        return view('admin.products.add', compact('categories'));
    }

    //Thêm dữ liệu sản phẩm vào database
    public function store()
    {
        $data = $_POST;

        $image = ''; 
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = $file['name'];

            move_uploaded_file($file['tmp_name'], "../images/" . $image);
        }
        //thêm ảnh vào $data
        $data['image'] = $image;
        $product = new Product;
        $product->create($data);
        header("location: " . ADMIN_URL . "?ctl=listsp");
    }

    //Hiển thị form cập nhật
    public function edit()
    {
        $id = $_GET['id'];
        $product = (new Product)->find($id);
        $categories = (new Category)->list();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    //Cập nhật dữ liệu
    public function update()
    {
        $data = $_POST;
        $product = new Product;
        $item = $product->find($data['id']);
        $image = $item['image'];

        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = $file['name'];
            move_uploaded_file($file['tmp_name'], ROOT_DIR . "images/" . $image);
        }
        //Thểm ảnh vào data
        $data['image'] = $image;
        //Cập nhật
        $product->update($data['id'], $data);
        //Quay về trang edit
        header("location: " . ADMIN_URL . "?ctl=editsp&id=" . $data['id']);
        die;
    }

    //Xóa dữ liệu
    public function delete()
    {
        $id = $_GET['id'];
        (new Product)->delete($id);
        $_SESSION['message'] = "Xóa dữ liệu thành công";
        header("location: " . ADMIN_URL . "?ctl=listsp");
        die;
    }
}
