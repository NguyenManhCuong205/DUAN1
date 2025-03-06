<?php


class ClientCategoryController
{
    public function index()
    {
        // Lấy tất cả danh mục
        $categories = (new Category)->list();
        
        // Trả về view với danh sách danh mục
        return view("category.list", ['categories' => $categories]);
    }
}
