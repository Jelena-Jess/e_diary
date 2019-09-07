<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">

    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.7.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>

</head>
<body class="login-img">

    <div class="wrapper overflow-hidden">
        <div class="card login-card overflow-hidden">
            <div class="card-body">
                <div class="row icon-wrapper mb-5 mt-5">
                    <i class="fas fa-graduation-cap ml-auto mr-auto"></i>
                </div>
                <h2 class="card-title-login text-center">WELCOME</h2>
                <div class="row justify-content-center">
                    <div class="col-7">
                        <form action="" method="post">
                            <div class="form-group">
                                <i class="fas fa-user d-none d-sm-block"></i>
                                <input type="text" name="username" class="form-control login-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required autofocus="autofocus">
                            </div>
                            <div class="form-group">
                                <i class="fas fa-lock d-none d-sm-block"></i>
                                <input type="password" name="password" class="form-control login-input" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary submit">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 message text-center mt-2">
                    <span class="text-danger"><?php echo $data['username_err']; ?></span>
                    <span class="text-danger mt-2"><?php echo $data['password_err']; ?></span>
                </div>
            </div>
        </div>
    </div>


    <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>