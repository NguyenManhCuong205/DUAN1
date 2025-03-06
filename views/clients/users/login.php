<?php include_once ROOT_DIR . "views/clients/header.php" ?>

<div class="container mt-5">

<style>
    #loginEmail{
        width: 550px;
    }
    #loginPassword{
        width: 550px;
    }
    h3{
        text-align: center;
    }
</style>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($message != '') : ?>
                    <div class="alert alert-success">
                        <?= $message ?>
                    </div>
                <?php endif?>
                <?php if ($error != '') : ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php endif?>
                <!-- Thông báo đăng nhập thất bại -->

                <!-- Đăng nhập -->
                <div class="container">
                    <h3>Đăng nhập</h3>
                    <form action="<?= ROOT_URL . '?ctl=login' ?>" method="POST">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="loginEmail"  placeholder="Nhập email">
                     <div class="mb-3">
                           </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include_once ROOT_DIR . "views/clients/footer.php" ?>