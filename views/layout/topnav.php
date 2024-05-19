<nav class="navbar navbar-dark navbar-expand-lg topnav-menu">
    <div class="collapse navbar-collapse" id="topnav-menu-content">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="<?= _WEB_ROOT ?>/">
                    Trang chủ
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="<?= _WEB_ROOT; ?>/room/index">
                    Phòng
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="<?= _WEB_ROOT ?>/contract/index">
                    Hợp đồng
                </a>
            </li>
            <li class="nav-item ">
                <div class="dropdown">
                    <a class="dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Hóa đơn
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= _WEB_ROOT ?>/bill/contracindex">
                            Hóa đơn hợp đồng
                        </a>
                        <a class="dropdown-item" href="<?= _WEB_ROOT ?>/bill/index">
                            Hóa đơn Điện nước
                        </a>
                        <a class="dropdown-item" href="<?= _WEB_ROOT ?>/bill/serviceindex">
                            Hóa đơn dịch vụ
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link " href="<?= _WEB_ROOT ?>/report/index">
                    Báo cáo
                </a>
            </li>
        </ul>
    </div>
</nav>