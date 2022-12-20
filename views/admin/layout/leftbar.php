<div class="leftside-menu">

    <a href="<?php _WEB_ROOT ?>" class="logo text-center logo-light" style="margin-top: 18px;">
        <span class="logo-lg">
            <h2>Hunre</h2>
            <!-- <img src="assets/images/logo.png" alt="" height="16"> -->
        </span>
        <span class="logo-sm">
            <h4>Hunre</h4>
            <!-- <img src="assets/images/logo_sm.png" alt="" height="16"> -->
        </span>
    </a>


    <div class="" id="leftside-menu-container" data-simplebar>

        <ul class="side-nav" style="position: fixed;">
            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/") ?>" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <!-- <span class="badge bg-success float-end">4</span> -->
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#student" aria-expanded="false" aria-controls="student" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Quản lý sinh viên  </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="student">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= $this->base_url("admin/student/index") ?>">Danh sách sinh viên</a>
                        </li>
                        <li>
                            <a href="<?= $this->base_url("admin/student/create") ?>">Thêm sinh viên</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#room" aria-expanded="false" aria-controls="room" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Quản lý phòng  </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="room">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= $this->base_url("admin/room/index") ?>">Danh sách phòng</a>
                        </li>
                        <li>
                            <a href="<?= $this->base_url("admin/room/create") ?>">Thêm phòng</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Quản lý người dùng</span>
                    <span class="menu-arrow" ></span>
                </a>
                <div class="collapse" id="user">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= $this->base_url("admin/user/index") ?>">Danh sách quản trị viên</a>
                        </li>
                        <li>
                            <a href="<?= $this->base_url("admin/user/create") ?>">Thêm quản trị viên</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#bill" aria-expanded="false" aria-controls="bill" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Quản lý hóa đơn </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="bill">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= $this->base_url("admin/bill/list-electric-water") ?>">Điện nước</a>
                        </li>
                        <li>
                            <a href="<?= $this->base_url("admin/bill/create-electric-water") ?>">Thêm hóa đơn điện nước</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#contract" aria-expanded="false" aria-controls="contract" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span> Quản lý hợp đồng </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="contract">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= $this->base_url("admin/contract/index") ?>">Danh sách hợp đồng</a>
                        </li>
                        <li>
                            <a href="<?= $this->base_url("admin/contract/create") ?>">Thêm hợp đồng</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/home/statistic") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Báo cáo thống kê </span>
                </a>
            </li>
        </ul>
    </div>

</div>