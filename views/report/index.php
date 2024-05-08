<div class="d-flex justify-content-center flex-column text-center align-items-center">
    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã thông báo</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Thời gian</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                        if (isset($data["listRepot"])) {
                            foreach ($data["listRepot"] as $key => $value) {
                        ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value["id"]; ?></td>
                <td><?= $value["title"]; ?></td>
                <td><?= $value["message"]; ?></td>
                <td><?= $value["created_at"]; ?></td>
                <td><?php if($value['status'] == 0){
                                        echo "<span class='text-warning'>Chờ duyệt</span>";
                                    }else{
                                        echo "<span class='text-success'>Đã xác nhận</span>";
                                    } ?></td>
                <td class="table-action">
                    <form action="<?= $this->base_url("admin/report/delete/" . $value["id"]) ?>" class="form-delete"
                        id="form-delete" method="get">
                        <a class=" btn-delete btn"> <i class="mdi mdi-delete"></i></a>
                    </form>
                </td>
            </tr>
            <?php
                            }
                        }
                        ?>
        </tbody>
    </table>
    <a href="<?= _WEB_ROOT ?>/report/create" class="btn btn-primary">Tạo báo cáo</a>
</div>