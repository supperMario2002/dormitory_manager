<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                        <span class="input-group-text bg-primary border-primary text-white">
                            <i class="mdi mdi-calendar-range font-13"></i>
                        </span>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <a href="javascript: void(0);" class="btn btn-primary ms-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Trang chủ</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12 col-lg-12">

        <div class="side-nav-title side-nav-item">Số liệu sinh viên</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Tổng số sinh viên</h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['students']); ?></h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-calendar-remove widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Sinh viên hết hạn</h5>
                            <h3 class="mt-3 mb-3"><?php echo count($data['students_end']); ?></h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="header-title">Biểu đồ sinh viên vào ra</h4>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>
                    </div>

                    <div dir="ltr">
                        <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
        <div class="side-nav-title side-nav-item">Số liệu phòng</div>
        <div class="row">
            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Tổng số phòng</h5>
                            <h3 class="mt-3 mb-3">300</h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home-remove widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Số phòng trống</h5>
                            <h3 class="mt-3 mb-3">20</h3>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card widget-flat">
                    <a href="">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-home-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Phòng chưa ghép đủ </h5>
                            <h3 class="mt-3 mb-3">80</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>