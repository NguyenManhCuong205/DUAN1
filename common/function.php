<?php

function view($view, $data = [])
{
    extract($data);

    $view = str_replace('.', '/', $view);
    include_once ROOT_DIR . "views/$view.php";
}

//hàm dd dùng để debug 
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function session_flash($key){
    $message = $_SESSION[$key] ?? '';
    unset($_SESSION[$key]);
    return $message;
}

function getOrderStatus($status){
    $status_details=[
        1=>'Chờ xử lý',
        2=>'Đang xử lý',
        3=>'Hoàn thành',
        4=>'Đã hủy'
        
    ];
    return $status_details[$status];
}

// function view($path_view, $data = []){
//     extract($data);
//     $path_view = str_replace(".", "/", $path_view);
//     include_once ROOT_DIR . "views/$path_view.php";
// }

// function dd($data)
// {
//     echo "<pre>";
//     var_dump($data);
//     echo "</pre>";
// }