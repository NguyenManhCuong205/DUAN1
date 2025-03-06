<?php
class HomeController
{
    //Hiển thị trang chủ
    public function index()
    {

        $product = new Product;
        $pets = $product->listPets();

        $list_products = $product->listOtherProduct();

        $categories = (new Category)->list();

        $_SESSION['URI'] = $_SERVER['REQUEST_URI'];
        return view(
            'clients.home',
            compact('pets', 'list_products', 'categories')
        );
    }
}
