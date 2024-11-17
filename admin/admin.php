<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lenovo Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="admin-navbar">
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Quản lý danh mục</a></li>
                    <li><a href="#">Quản lý sản phẩm</a></li>
                    <li><a href="#">Quản lý người dùng</a></li>
                    <li><a href="#">Quản lý bình luận</a></li>
                    <li><a href="#">Quản lý đơn hàng</a></li>
                    <li><a href="#">Đăng xuất</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- Quản lý Sản phẩm -->
        <section class="admin-section">
            <h2>Quản lý Sản phẩm</h2>
            <button class="btn-add-product">Thêm Sản Phẩm</button>
            <div class="product-list">
                <table>
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên Sản phẩm</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="img/68889a97-51bc-4602-9b45-fd5484b4c325.png" alt="Laptop 1" width="50" height="50"></td>
                            <td>Laptop A</td>
                            <td>20,000,000 VND</td>
                            <td>Laptop gaming</td>
                            <td>
                                <button class="btn-edit">Chỉnh sửa</button>
                                <button class="btn-delete">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="img/68889a97-51bc-4602-9b45-fd5484b4c325.png" alt="Laptop 2" width="50" height="50"></td>
                            <td>Laptop B</td>
                            <td>25,000,000 VND</td>
                            <td>Laptop văn phòng</td>
                            <td>
                                <button class="btn-edit">Chỉnh sửa</button>
                                <button class="btn-delete">Xóa</button>
                            </td>
                        </tr>
                        <!-- Thêm các sản phẩm khác ở đây -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Quản lý Tin tức -->
        <section class="admin-section">
            <h2>Quản lý Tin tức</h2>
            <button class="btn-add-news">Thêm Tin tức</button>
            <div class="news-list">
                <table>
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="img/laptop-lenovo-1.webp" alt="Tin tức 1" width="50" height="50"></td>
                            <td>Khuyến mãi đặc biệt mùa khai giảng</td>
                            <td>Chúng tôi có chương trình khuyến mãi đặc biệt...</td>
                            <td>
                                <button class="btn-edit">Chỉnh sửa</button>
                                <button class="btn-delete">Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="img/laptop-lenovo-15.webp" alt="Tin tức 2" width="50" height="50"></td>
                            <td>Giới thiệu dòng laptop mới nhất của Lenovo</td>
                            <td>Khám phá dòng laptop mới nhất của Lenovo...</td>
                            <td>
                                <button class="btn-edit">Chỉnh sửa</button>
                                <button class="btn-delete">Xóa</button>
                            </td>
                        </tr>
                        <!-- Thêm các bài viết khác ở đây -->
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Quản lý Đơn hàng -->
        <section class="admin-section">
            <h2>Quản lý Đơn hàng</h2>
            <div class="order-list">
                <table>
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#001</td>
                            <td>Nguyễn Văn A</td>
                            <td>Laptop A</td>
                            <td>Đang xử lý</td>
                            <td>
                                <button class="btn-update-status">Cập nhật</button>
                            </td>
                        </tr>
                        <tr>
                            <td>#002</td>
                            <td>Trần Thị B</td>
                            <td>Laptop B</td>
                            <td>Đã giao</td>
                            <td>
                                <button class="btn-update-status">Cập nhật</button>
                            </td>
                        </tr>
                        <!-- Thêm các đơn hàng khác ở đây -->
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Lenovo Store. All rights reserved.</p>
    </footer>

</body>
</html>
