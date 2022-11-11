<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/room/index">Phòng</a></li>
                    <li class="breadcrumb-item active">Thêm phòng</li>
                </ol>
            </div>
            <h4 class="page-title">Thêm phòng</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-3 "></div>
                        <div class="col-xl-6 ">
                            <?php if (isset($_COOKIE["err"])) : ?>
                                <div class="alert alert-danger " role="alert">
                                    <?= $_COOKIE["err"]; ?>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên phòng <span class="text-danger">(*)</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên" required>
                            </div>

                            <div class="mb-3">
                                <label for="status1" class="form-label">Phòng</label>
                                <select class="form-select" id="status1" name="status">
                                    <option value="0">Hoạt Động</option>
                                    <option value="1">Bảo Trì</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="user1" class="form-label">Người quản lý</label>
                                <select class="form-select" id="user1" name="user_id">
                                    <option value="1">Lương Văn Hòa</option>
                                    <option value="2">Đỗ Kim Khánh</option>
                                    <option value="3">Lưu Quang Vinh</option>
                                    <option value="4">Nguyễn Đình Khang An</option>
                                    <option value="5">Trần Ngọc Thắng</option>
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