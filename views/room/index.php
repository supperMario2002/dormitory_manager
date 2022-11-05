<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?php _WEB_ROOT ?>">Trang chủ</a></li>
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li> -->
                    <li class="breadcrumb-item active">Phòng</li>
                </ol>
            </div>
            <h4 class="page-title">Quản lý phòng</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <a href="<?= _WEB_ROOT; ?>/room/create" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i>Thêm phòng</a>
                    </div>
                    <div class="col-sm-7">
                        <div class="text-sm-end">
                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION["suc"])) : ?>
                    <div class="alert alert-success " role="alert">
                        <?= $_SESSION["suc"];
                        unset($_SESSION["suc"]); ?>
                    </div>
                <?php endif; ?>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên phòng</th>
                            <th>Người quản lý</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        if (isset($data)) {
                            foreach ($data as $key => $value) {
                        ?>
                                <tr>
                                    <td><?= $key+1; ?></td>
                                    <td><?= $value["name"]; ?></td>
                                    <td><?= $value["name_user"]; ?></td>
                                    <td>
                                        <?php if($value["status"] == 1){ ?>
                                        <span class="badge bg-success">Hoạt động</span>
                                        <?php }else{ ?>
                                        <span class="badge bg-danger">Bảo trì</span>
                                        <?php } ?>
                                    </td>

                                    <td class="table-action">
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="<?= $this->base_url("room/edit/".$value["id"]) ?>" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>