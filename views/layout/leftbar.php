<div class="leftside-menu">

    <a href="<?php _WEB_ROOT ?>" class="logo text-center logo-light">
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
                <a href="<?= $this->base_url() ?>" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <!-- <span class="badge bg-success float-end">4</span> -->
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("student/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý sinh viên </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý phòng </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý người dùng </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý điện nước </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Quản lý thu/chi lưu trú </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= $this->base_url("room/index") ?>" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Báo cáo thống kê </span>
                </a>
            </li>
        </ul>
    </div>

</div>