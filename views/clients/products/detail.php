<?php include_once ROOT_DIR . "./views/clients/header.php" ?>

<!-- Product Details Section -->
<section class="product-details container py-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6">
            <img src="<?= 'images/' . $product['image'] ?>" alt="<?= $product['name'] ?>" class="img-fluid rounded shadow-sm">
        </div>

        <!-- Product Info -->
        <div class="col-md-6">
            <h1 class="display-4"><?= $product['name'] ?></h1>
            <p class="price text-danger h3">Giá: <?= $product['price'] ?> VNĐ</p>
            <p class="description"><?= $product['description'] ?></p>

            <div class="additional-info mt-4">
                <h3 class="h4">Thông tin chi tiết</h3>
                <div class="pro-info-center">

                    <div class="pro-info-summary">

                        <!--0-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>CPU: Snapdragon X Plus X1P-42-100, 8C, Max Turbo up to 3.4GHz (single-core) / 3.2GHz (8-core), 30MB
                        </span> <br>

                        <!--1-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>NPU: Qualcomm Hexagon NPU, up to 45 TOPS
                        </span> <br>

                        <!--2-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>VGA: Integrated Qualcomm Adreno GPU
                        </span> <br>

                        <!--3-->
                        <span class="item ">
                            <i class="fa fa-check-circle"></i>Màn hình: 14" WUXGA (1920x1200) OLED 400nits Glossy, 100% DCI-P3
                        </span>

                        <!--4-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>RAM: 16GB Soldered LPDDR5x-8448
                        </span>

                        <!--5-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Ổ cứng: 512GB SSD M.2 2242 PCIe 4.0x4 NVMe
                        </span>

                        <!--6-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Pin: 3Cell 57Wh
                        </span>

                        <!--7-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Cân nặng: 1.48 kg
                        </span>

                        <!--8-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Tính năng: Đèn nền bàn phím
                        </span>

                        <!--9-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>Màu sắc: Cloud Grey
                        </span>

                        <!--10-->
                        <span class="item hide d-block">
                            <i class="fa fa-check-circle"></i>OS: Windows® 11 Home Single Language
                        </span>

                    </div>
                </div>
            </div>

            <div class="add-to-cart mt-3">
                <a href="<?= ROOT_URL . '?ctl=add-cart&id=' . $product['id'] ?>" class="btn btn-danger btn-lg">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                </a>
            </div>
        </div>
    </div>
</section>
<hr>
<section>
    <h2>Bình luận</h2>
    <div class="comment">
        <?php foreach ($comments as $comment) : ?>
            <p>
                <b><?= $comment['fullname'] ?></b> <br>
                <b><?= date('d-m-Y H:i:s', strtotime($comment['created_at'])) ?></b> <br>
                <b><?= $comment['content'] ?></b> <br>
            </p>
        <?php endforeach ?>
    </div>

    <?php if (isset($_SESSION['user'])) : ?>
        <form action="" method="post">
            <textarea name="content" rows="3" cols="60" required=""></textarea><br>
            <button type="submit">Gui</button>
        </form>

    <?php else : ?>
        <div>Ban can<b><a href="<?= ROOT_URL . '?ctl=login' ?>">dang nhap</a></b>de binh luan</div>
    <?php endif ?>
    
</section>

<!-- Reviews Section -->
<!-- <section class="reviews container py-5">
    <h2 class="h3 mb-4">Đánh giá từ khách hàng</h2>
    <div class="review mb-4">
        <p><strong>Nguyễn Văn A</strong> <span>★★★★★</span></p>
        <p>Sản phẩm rất tốt, sử dụng mượt mà và pin lâu. Rất hài lòng!</p>
    </div>
    <div class="review mb-4">
        <p><strong>Trần Thị B</strong> <span>★★★★☆</span></p>
        <p>Máy đẹp và nhẹ, rất tiện lợi mang đi làm.</p>
    </div>
</section> -->

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>