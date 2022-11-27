<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dormitory Manager System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?= _WEB_ROOT ?>/public/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="<?= _WEB_ROOT ?>/public/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= _WEB_ROOT ?>/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link href="<?= _WEB_ROOT ?>/public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= _WEB_ROOT ?>/public/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <script src="<?= _WEB_ROOT ?>/public/js/jquery-3.6.1.min.js"></script>
</head>

<body class="loading" data-layout-color="<?= $_SESSION["color-bg"] == 1 ? "dark" : "light" ; ?>" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <div class="wrapper">

        <?php include("leftbar.php"); ?>

        <div class="content-page">
            <div class="content">
                <?php include("topbar.php"); ?>
                <div class="container-fluid">

                    <?php
                    if (isset($view)) {
                        include($view);
                    }
                    ?>

                </div>

            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Mượn tí code
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">Về chúng tôi</a>
                                <a href="javascript: void(0);">Hỗ trợ</a>
                                <a href="javascript: void(0);">Liên hệ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <script src="<?= _WEB_ROOT ?>/public/js/vendor.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/js/app.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

    <script src="<?= _WEB_ROOT ?>/public/js/vendor/jquery.dataTables.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/js/pages/demo.datatable-init.js"></script>


</body>

</html>