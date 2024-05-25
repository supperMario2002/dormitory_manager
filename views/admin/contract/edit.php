<?php print_r($data["contract"]) ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/admin/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa hợp đồng</li>
                </ol>
            </div>
            <h4 class="page-title">Sửa hợp đồng</h4>
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
                                <label for="user_id" class="form-label">Sinh viên</label>
                                <input type="text" class="form-control" id="user_id" data-ids="<?php echo $data["contract"]["student_id"]?>" name="user_id" readonly value="<?php echo $data["contract"]["student_id"] . ' - ' .  $data["contract"]["student_name"] ?>">
                            </div>


                            <div class="mb-3">
                                <label for="room_id" class="form-label">Phòng</label>
                                <select class="form-select" id="room_id" name="room_id">
                                    <?php  foreach($data["rooms"] as $value){?>
                                    <option value="<?php echo $value["id"]; ?>" <?php echo ($value["id"] == $data["contract"]["room_id"]) ? 'selected' : ''; ?>><?php echo $value["room_name"]; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_birth">Ngày tạo</label>
                                <input type="date" class="form-control" id="date_birth" name="date_start" value="<?php echo $data["contract"]["date_start"] ?>">
                            </div>
                            <div class="mb-3 position-relative" id="datepicker1">
                                <label class="date_birth">Ngày kết thúc</label>
                                <input type="date" class="form-control" id="date_birth" name="date_end" value="<?php echo $data["contract"]["date_end"] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="status1" class="form-label">Phương thức thanh toán</label>
                                <select class="form-select" id="status1" name="method_payment">
                                    <option value="0">Tiền mặt</option>
                                    <option value="1">Chuyển khoản</option>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Sửa hợp đồng</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var studentId = document.getElementById('user_id').getAttribute('data-ids');
    function loadRoomData() {

        $.ajax({
            type: 'POST',
            url: '', // URL của bạn để xử lý yêu cầu AJAX
            data: {
                idS: studentId,
            },
            success: function(data) {
                $('#room_id').empty();
                $('#room_id').append(data);
            }
        });
    }
    loadRoomData();
});
</script>