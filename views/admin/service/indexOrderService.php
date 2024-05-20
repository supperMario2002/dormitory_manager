<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                    <li class="breadcrumb-item active">Đơn hàng dịch vụ</li>
                </ol>
            </div>
            <h4 class="page-title">Danh sách đơn hàng dịch vụ</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (isset($_COOKIE["err"])) : ?>
                <div class="alert alert-danger " role="alert">
                    <?= $_COOKIE["err"]; ?>
                </div>
                <?php endif; ?>
                <?php if (isset($_COOKIE["suc"])) : ?>
                <div class="alert alert-success " role="alert">
                    <?= $_COOKIE["suc"]; ?>
                </div>
                <?php endif; ?>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên Đơn hàng</th>
                            <th>Người đặt</th>
                            <th>Phòng</th>
                            <th>Tổng tiền (VND)</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data["list_order_service"] as $value ) { ?>
                        <tr>
                            <td><?= $value["order_id"]; ?></td>
                            <td><?= $value["service_name"]; ?></td>
                            <td><?= $value["student_name"]; ?></td>
                            <td><?= $value["room_name"]; ?></td>
                            <td><?= $value["total_price"]; ?></td>
                            <td>
                                <?php if ($value["status"] == 1) { ?>
                                <span class="badge bg-success">Đã thanh toán</span>
                                <?php } else { ?>
                                <span class="badge bg-danger">Chưa thanh toán</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($value["order_status"] == 0) { ?>
                                <a href="<?= $this->base_url("admin/service/acceptorderservice/" . $value["order_id"]) ?>"
                                    class="btn btn-success"> Xác nhận </a>
                                <a href="<?= $this->base_url("admin/service/deactiveorderservice/" . $value["order_id"]) ?>"
                                    class="btn btn-danger"> Hủy</a>
                                <?php } if ($value["order_status"] == 1) { ?>
                                <span class="badge bg-success">Đã xác nhận</span>
                                <?php } if ($value["order_status"] == 2) { ?>
                                <span class="badge bg-danger">Đã hủy</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
const x = document.getElementsByClassName("form-delete");
for (let i = 0; i < x.length; i++) {
    x[i].onclick = function() {
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'OK',
            denyButtonText: `Không`,
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    }
}
</script>

<style>
.inbox-item-img img {
    height: 40px;
}

#form-delete {
    font-size: 1.2rem;
    display: inline-block;
    padding: 0 3px;
}

#form-delete a {
    color: #98a6ad;
    padding: 0;
    border: 0;

}

#form-delete a:hover {
    color: red;
}

#form-delete a i {
    font-size: 1.2rem;

}
</style>