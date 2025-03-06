<?php

class ProductController
{
    //hiển thị danh sách sản phẩm theo danh mục
    public function list()
    {

        $id = $_GET['id'];
        $products = (new Product)->listProductInCategory($id);

        $title = (new Category)->show($id);
        $title = $title['cate_name'];
        $categories = (new Category)->list();

        return view(
            'clients.products.list',
            compact('products', 'title', 'categories')
        );
    }


    public function show()
    {

        $id = $_GET['id'];
        $product = (new Product)->find($id);

        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $data = $_POST;
            $data['product_id'] = $id;
            $data['user_id'] = $_SESSION['user']['id'];
            (new Comment)->create($data);
        } 

        $title = $product['name'] ?? '';
        $categories = (new Category)->list();

        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];

       $comments = (new Comment)->listCommentInProductClient($id);

        return view(
            'clients.products.detail',
            compact('product', 'categories', 'title', 'comments')
        );
    }
}
