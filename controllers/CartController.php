 <?php

class CartController {
    public function addToCart() {

        $carts = $_SESSION['cart'] ?? [];
        $id = $_GET['id'];
        $product = (new Product)->find($id);

        if (isset($carts[$id])) {
            $carts[$id]['quantity'] += 1;
        } else {
            $carts[$id] = [
                'name'       => $product['name'],
                'image'      => $product['image'],
                'price'      => $product['price'],
                'quantity'   => 1,
            ];
        }

        $_SESSION['totalQuantity'] = $this-> totalSumQuantity($carts);
        $_SESSION['cart'] = $carts;

        $uri = $_SESSION['URI']; 
        return header("Location: " . $uri);
    }

    public function totalSumQuantity($carts)
    {   
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'];
        }
        return $total;
    }

    public function totalPriceOrder(){
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['price'] * $cart['quantity'];
        }
        return $total;
        
    }
    // view của giỏ hàng
    public function viewCart() {
        $carts = $_SESSION['cart']?? [];
        $totalPriceOrder = (new CartController)->totalPriceOrder();
        $totalPriceOrder = $this->totalPriceOrder();

        $categories = (new Category)->list();
        
        return view('clients.carts.carts', compact('carts', 'totalPriceOrder', 'categories'));
    }
    // Xóa sản phẩm trong giỏ hàng
    public function deleteProductInCart() {
        $id = $_GET['id'];
        unset($_SESSION['cart'][$id]);

        $_SESSION['totalQuantity'] = (new CartController)->totalSumQuantity($_SESSION['cart']);
        return header("Location:" . ROOT_URL . '?ctl=view-cart');
    }

    // cập nhật giỏ hàng
    public function updateCart(){
        $quantities = $_POST['quantity'];
        foreach($quantities as $id => $qty){
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }

        $_SESSION['totalQuantity'] = $this-> totalSumQuantity($_SESSION['cart']);
        return header("Location:" . ROOT_URL . '?ctl=view-cart');
    }

    public function viewCheckOut(){

        if (!isset($_SESSION['user'])){
            return header("Location:" . ROOT_URL . '?ctl=login');
        }

        $user = $_SESSION['user'];
        $carts = $_SESSION['cart'] ?? [];
        $totalPriceOrder = (new CartController)->totalPriceOrder();
        return view("clients.carts.checkout", compact('user', 'carts', 'totalPriceOrder'));
    }

    // thanh toán
    public function checkOut(){

        $user = [
            'id' => $_POST['id'],
            'fullname' => $_POST['fullname'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'role' => $_SESSION['user']['role'],
            'active' => $_SESSION['user']['active'],
        ];

        $totalPriceOrder = (new CartController)->totalPriceOrder();
        $order = [
            'user_id' => $_POST['id'],
            'status' => 1,
            'payment_method'=> $_POST['payment_method'],
            'total_price' => $totalPriceOrder,
        ];

        (new user)->update($user['id'], $user);
        $order_id = (new Order)->create($order);

        $carts = $_SESSION['cart'];
        foreach($carts as $id => $cart){
            $or_detail = [
                'order_id' => $order_id,
                 'product_id' => $id,
                  'price' => $cart['price'],
                  'quantity' => $cart['quantity'],
            ];

            (new Order)->createOrderDetail($or_detail);
        } 

        $this->clearCart();
        return header("Location: " . ROOT_URL . "?ctl=success");
    }

    // xóa giỏ hàng
    public function clearCart(){
        unset($_SESSION['cart']);
        unset($_SESSION['totalQuantity']);
        unset($_SESSION['URI']);
    }

    public function success(){
        return view("clients.carts.success");
    }
}


    