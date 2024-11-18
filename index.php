<?php
require_once __DIR__ . "/common/function.php";
require_once __DIR__ . "/models/BaseModel.php";
require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Product.php";

require_once __DIR__ . "/controllers/HomeController.php";
require_once __DIR__ . "/controllers/ClientCategoryController.php";

include "views/header.php";
include "views/banner.php";
include "views/home.php";
include "views/footer.php"; 



$ctl = $_GET['ctl'] ?? '';

$data = [
    'name' => 'thức ăn cho chó',
    'image' => '',
    'price' => 50000,
    'quantity' => 10,
    'description' => 'thức ăn cho chó',
    'category_id' => 1
];
$product = new Product;
$product->create($data);

match ($ctl) {
    '', 'home' => (new HomeController)->index(),
    'category' => (new ClientCategoryController)->index(),
    default => view("404.404"),
};?>
