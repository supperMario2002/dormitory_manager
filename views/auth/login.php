<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= _WEB_ROOT ?>/public/css/app.css">
    <link href="<?= _WEB_ROOT ?>/public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= _WEB_ROOT ?>/public/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
</head>

<body>
    <div class="register-page">
        <form action="" method="post">
            <h2 class="text-align mb-20">Login</h2>
            <?php if(isset($_COOKIE["error_login"])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_COOKIE["error_login"]; ?>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="username" class="form-lable">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tài khoản..." required>
            </div>
            <div class="form-group">
                <label for="password" class="form-lable">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập tài khoản..." required>
            </div>
            <button class="btn-submit" type="submit" name="submit">Login</button>
            <a href="register" class="link">Sign Up</a>
        </form>
    </div>
</body>

</html>