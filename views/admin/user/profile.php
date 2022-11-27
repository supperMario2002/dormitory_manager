<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thông tin cá nhân</li>
                </ol>
            </div>
            <h4 class="page-title">Thông tin cá nhân</h4>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-sm-12">
        <div class="card bg-primary">
            <div class="card-body profile-user-box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="<?= _WEB_ROOT ?>/public/avatar/<?= $_SESSION["login"]["avatar_url"] ?>" alt="" class="rounded-circle img-thumbnail">
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <h4 class="mt-1 mb-1 text-white"><?= $_SESSION["login"]["name"] ?></h4>
                                    <p class="font-13 text-white-50"> Quản trị viên siêu cấp</p>

                                    <ul class="mb-0 list-inline text-light">
                                        <li class="list-inline-item me-3">
                                            <h5 class="mb-1 text-white">Cấp độ</h5>
                                            <p class="mb-0 font-13 text-white-50">Trúc cơ</p>
                                        </li>
                                        <li class="list-inline-item">
                                            <h5 class="mb-1 text-white">Kinh nghiệm</h5>
                                            <p class="mb-0 font-13 text-white-50">99%</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="text-center mt-sm-0 mt-3 text-sm-end">
                            <button type="button" class="btn btn-light">
                                <i class="mdi mdi-account-edit me-1"></i> Sửa thông tin
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-12">

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Thông tin</h4>
                <p class="text-muted font-13">
                    Hey
                </p>

                <hr />

                <div class="text-start col-xl-5">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Text</label>
                        <input type="text" id="simpleinput" class="form-control">
                    </div>

                    <p class="text-muted"><strong>Giới tính :</strong><span class="ms-2">(+12) 123 1234 567</span></p>

                    <p class="text-muted"><strong>Ngày sing :</strong> <span class="ms-2">coderthemes@gmail.com</span></p>

                    <p class="text-muted"><strong>Địa chỉ :</strong> <span class="ms-2">USA</span></p>

                    <p class="text-muted"><strong>Email :</strong> <span class="ms-2">USA</span></p>

                    <p class="text-muted"><strong>Số điện thoại :</strong> <span class="ms-2">USA</span></p>

                </div>
            </div>
        </div>

    </div>




</div>