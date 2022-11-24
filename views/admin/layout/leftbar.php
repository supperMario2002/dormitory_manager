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


    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <ul class="side-nav">
            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/") ?>" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <!-- <span class="badge bg-success float-end">4</span> -->
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/student/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý sinh viên </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý phòng </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/user/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý người dùng </span>
                </a>
            </li>
            <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                                <i class="uil-location-point"></i>
                                <span> Quản lý hóa đơn </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMaps">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="<?= $this->base_url("admin/bill/createEWB") ?>">Điện nước</a>
                                    </li>
                                    <li>
                                        <a href="maps-vector.html">Dịch vụ</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý thu/chi lưu trú </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("admin/room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Báo cáo thống kê </span>
                </a>
            </li>
        </ul>
    </div>

</div>