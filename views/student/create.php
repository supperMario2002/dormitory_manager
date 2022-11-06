<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Sinh viên</a></li>
                    <li class="breadcrumb-item active">Thêm sinh viên</li>
                </ol>
            </div>
            <h4 class="page-title">Thêm sinh viên</h4>
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
                            <div class="mb-3">
                                <label for="id" class="form-label">Mã sinh viên <span class="text-danger">(*)</span></label>
                                <input type="text" id="id" name="id" class="form-control" placeholder="Nhập mã sinh viên..." required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên <span class="text-danger">(*)</span></label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên" required>
                            </div>

                            <label for="gender" class="form-label">Giới tính</label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gender1" name="gender" value="0" class="form-check-input" checked>
                                    <label class="form-check-label" for="gender1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="gender2" name="gender" value="1" class="form-check-input">
                                    <label class="form-check-label" for="gender2">Nữ</label>
                                </div>
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_birth">Ngày sinh</label>
                                <input type="date" class="form-control" id="date_birth" name="date_birth">
                            </div>

                            <div class="mb-0">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <textarea class="form-control" id="address" name="address" rows="5" placeholder="Nhập địa chỉ ..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">(*)</span></label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Nhập email..." required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại <span class="text-danger">(*)</span></label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại..." required>
                            </div>

                            <div class="mb-3">
                                <label for="class" class="form-label">Lớp</label>
                                <input type="text" id="class" name="class" class="form-control" placeholder="Nhập tên lớp...">
                            </div>

                            <div class="mb-3">
                                <label for="room_id" class="form-label">Phòng</label>
                                <select class="form-select" id="room_id" name="room_id">
                                <?php
                                    if (isset($data["room"])) {
                                        var_dump($data);
                                        foreach ($data["room"] as $key => $val) {
                                    ?>
                                            <option value="<?php echo $val["id"]; ?>"><?php echo $val["name"]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_start">Ngày đăng ký <span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control" id="date_start" name="date_start" required>
                            </div>

                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_end">Ngày hết hạn <span class="text-danger">(*)</span></label>
                                <input type="date" class="form-control" id="date_end" name="date_end" required>
                            </div>
                            <div class="mb-3">
                                <label class="avatar">Ảnh</label>
                                <input class="form-control" type="file" name="avatar" id="avatar" accept=".jpg, .png">
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Success</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>