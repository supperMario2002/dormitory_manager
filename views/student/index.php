<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                    <li class="breadcrumb-item active">Sinh viên</li>
                </ol>
            </div>
            <h4 class="page-title">Quản lý sinh viên</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <a href="<?= _WEB_ROOT; ?>/student/create" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Thêm sinh viên</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION["err"])) : ?>
                    <div class="alert alert-danger " role="alert">
                        <?= $_SESSION["err"];
                        unset($_SESSION["err"]); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION["suc"])) : ?>
                    <div class="alert alert-success " role="alert">
                        <?= $_SESSION["suc"];
                        unset($_SESSION["suc"]); ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Mã sinh viên</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data["students"])) {
                                foreach ($data["students"] as $key => $value) {
                            ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value["id"]; ?></td>
                                        <td><?= $value["name"]; ?></td>
                                        <td><a href="mailto:<?= $value["email"]; ?>"><?= $value["email"]; ?></a></td>
                                        <td><a href="tel:<?= $value["phone"]; ?>"><?= $value["phone"]; ?></a></td>
                                        <td class="table-action">
                                            <a href="javascript:void(0);" class="action-icon" data-bs-toggle="modal" data-bs-target="#centermodal<?= $value["id"]; ?>"> <i class="mdi mdi-eye"></i></a>

                                            <div class="modal fade" id="centermodal<?= $value["id"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myCenterModalLabel">Thông tin chi tiết</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="card text-center">
                                                            <div class="modal-body">
                                                                <img src="<?= _WEB_ROOT ?>/public/avatar/<?= $value["avatar"] ?>" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                                                <div class="text-start mt-3">
                                                                    <p class="text-muted"><strong>Mã sinh viên:</strong> <span class="ms-2"><?= $value["id"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Họ và tên:</strong> <span class="ms-2"><?= $value["name"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Giới tính:</strong> <span class="ms-2"><?= ($value["sex"] == 0) ? "Nam" : "Nữ"; ?></span></p>
                                                                    <p class="text-muted"><strong>Ngày sinh:</strong> <span class="ms-2"><?= $value["date_birth"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Địa chỉ:</strong> <span class="ms-2"><?= $value["address"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Email:</strong> <span class="ms-2"><?= $value["email"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Số điện thoại:</strong> <span class="ms-2"><?= $value["phone"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Lớp:</strong> <span class="ms-2"><?= $value["class"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Tên phòng:</strong> <span class="ms-2"><?php foreach ($data["rooms"] as $k => $t) {
                                                                                                                                                echo ($value["room_id"] == $t["id"]) ? $t["name"] : "";
                                                                                                                                            } ?></span></p>
                                                                    <p class="text-muted"><strong>Ngày đăng ký:</strong> <span class="ms-2"><?= $value["date_start"]; ?></span></p>
                                                                    <p class="text-muted"><strong>Ngày hết hạn:</strong> <span class="ms-2"><?= $value["date_end"]; ?></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                <a href="<?= $this->base_url("student/edit/" . $value["id"]) ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="<?= $this->base_url("student/delete/" . $value["id"]) ?>" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>