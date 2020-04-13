<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/Final/decor/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<img class="wave" src="/Final/image/wave.png">
<div class="container">
    <div class="img">
        <img src="/Final/image/save.svg">
    </div>
    <div class="login-container">
        <form  action="/Final/" method="post">
            <img class="avatar" src="/Final/image/avatar.svg">
            <h2>TDT drive</h2>
            <div class="input-div one ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Username</h5>
                    <input type="text" name="username" class="input" value="<?= $username ?>"/>
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>Password</h5>
                    <input class="input"  type="password" name="password">
                </div>
            </div>
            <p style="color:red; "><?= $login_alert ?></p>
            <br>
            <a href="#">Forgot Password? </a>
            <input type="hidden" name="type" value="login_form"/>
            <input type="submit" class="btn" value="Login">
            <a class="reg" href="?controller=register&action=index">Don't have account? Register now!</a>
        </form>
    </div>
</div>
<script type="text/javascript" src="/Final/decor/main.js"></script>

</body>
</html>