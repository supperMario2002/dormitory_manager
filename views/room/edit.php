<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/room/index">Phòng</a></li>
                    <li class="breadcrumb-item active">Sửa phòng</li>
                </ol>
            </div>
            <h4 class="page-title">Sửa phòng</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-xl-3 "></div>
                        <div class="col-xl-6 ">
                            <?php if (isset($_SESSION["err"])) : ?>
                                <div class="alert alert-danger " role="alert">
                                    <?= $_SESSION["err"];
                                    unset($_SESSION["err"]); ?>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên phòng <span class="text-danger">(*)</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="<?= $data["room"]["name"]; ?>" placeholder="Nhập tên" required>
                            </div>

                            <div class="mb-3">
                                <label for="status1" class="form-label">Phòng</label>
                                <select class="form-select" id="status1" name="status">
                                    <option value="1" <?= ($data["room"]["status"] == 0) ? "selected" : ""; ?>>Hoạt Động</option>
                                    <option value="0" <?= ($data["room"]["status"] == 1) ? "selected" : ""; ?>>Bảo Trì</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="user1" class="form-label">Người quản lý</label>
                                <select class="form-select" id="user1" name="user_id">
                                    <?php
                                    if (isset($data["user"])) {
                                        var_dump($data);
                                        foreach ($data["user"] as $key => $val) {
                                    ?>
                                            <option value="<?php echo $val["id"]; ?>"><?php echo $val["name"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="describes" class="form-label">Thông tin</label>
                                <textarea class="form-control" id="describes" name="describes" rows="5" placeholder="Nhập địa chỉ ..."></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Gửi</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>