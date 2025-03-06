<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div class="container mt-5">

    <!-- Bảng sản phẩm -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Số lượng bình luận</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $pro): ?>
                    <tr>
                        <th scope="row"><?= $pro['id'] ?></th>
                        <td><?= $pro['name'] ?></td>
                        <td><?= $pro['count'] ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="<?= ADMIN_URL . '?ctl=comment-detail&id=' . $pro['id'] ?>" class="btn btn-primary btn-sm">Chi tiết</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>