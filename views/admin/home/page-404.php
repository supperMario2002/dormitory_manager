<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Error 404 </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- App css -->
    <link href="<?= _WEB_ROOT ?>/public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= _WEB_ROOT ?>/public/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <!-- <span><img src="assets/images/logo.png" alt="" height="18"></span> -->
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center">
                                <h1 class="text-error">4<i class="mdi mdi-emoticon-sad"></i>4</h1>
                                <h4 class="text-uppercase text-danger mt-3">Không tìm thấy trang này</h4>
                                <p class="text-muted mt-3">Có vẻ đã có một số sự cố cho trang bạn cần tìm, bạn vui lòng kiểm tra lại đường link đã đúng chưa hoặc liên hệ với quản trị viên để báo lỗi.</p>

                                <a class="btn btn-info mt-3" onclick="quay_lai_trang_truoc()"><i class="mdi mdi-reply"></i> Trở lại</a>
                            </div>
                        </div> <!-- end card-body-->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2018 - <script>
            document.write(new Date().getFullYear())
        </script> © Hyper - Coderthemes.com
    </footer>

    <!-- bundle -->
    <script src="<?= _WEB_ROOT ?>/public/js/vendor.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/js/app.min.js"></script>
    <script>
        function quay_lai_trang_truoc() {
            history.back();
        }
    </script>

</body>

</html>