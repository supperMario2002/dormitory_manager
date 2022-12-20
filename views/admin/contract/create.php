<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/admin/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm hợp đồng</li>
                </ol>
            </div> 
            <h4 class="page-title">Thêm hợp đồng</h4>
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
                            <?php if (isset($_COOKIE["err"])) : ?>
                                <div class="alert alert-danger " role="alert">
                                    <?= $_COOKIE["err"]; ?>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="user1" class="form-label">Sinh viên</label>
                                <select class="form-select" id="user1" name="user_id">
                                    <?php  foreach($data["students"] as $value){?>
                                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="user1" class="form-label">Phòng</label>
                                <select class="form-select" id="user1" name="user_id">
                                    <?php  foreach($data["rooms"] as $value){?>
                                    <option value="<?php echo $value["id"]; ?>"><?php echo $value["room_name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status1" class="form-label">Trạng thái</label>
                                <select class="form-select" id="status1" name="status">
                                    <option value="1">Hoạt Động</option>
                                    <option value="0">Bảo Trì</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Giá phòng <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" id="price" name="price"  placeholder="Nhập giá tiền...">
                            </div>

                            <div class="mb-3">
                                <label for="max_num" class="form-label">Số người ở tối đa <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" id="max_num" name="max_num"  placeholder="Nhập tổng số người có thể ở...">
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Tạo phòng</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>