<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/Final//decor/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<img class="wave" src="/Final//image/wave.png">
<div class="container">
    <div class="img">
        <img src="/Final//image/save.svg">
    </div>
    <div class="login-container">
        <form action="#" method="post">
            <img class="avatar" src="/Final//image/avatar.svg">
            <h2>Welcome</h2>
            <div class="input-div one ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>First name <span style="color: red">*</span></h5>
                    <input type="text" class="input" name="firstName" value="<?= $firstName ?>"/>
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Last name <span style="color: red">*</span></h5>
                    <input type="text" class="input" name="lastName" value="<?= $lastName ?>"/>
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Username <span style="color: red">*</span></h5>
                    <input type="text" name="username" class="input" value="<?= $username ?>"/>
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>Password <span style="color: red">*</span></h5>
                    <input type="password" class="input" name="password"/>
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>Retype Password <span style="color: red">*</span></h5>
                    <input type="password" class="input re_password"/>
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5>Email <span style="color: red">*</span></h5>
                    <input type="email" class="input" name="email" value="<?= $email ?>"/>
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div>
                    <h5>Phone <span style="color: red">*</span></h5>
                    <input type="number" class="input" name="phone" value="<?= $phone ?>"/>
                </div>
            </div>
            <p style="color:red; "><?= $register_alert ?></p>
            <br>
            <pre>  </pre>
            <input type="hidden" name="type" value="register_form"/>
            <input type="submit" class="btn" value="Register">
            <a class="reg" href="/Final/">Already have an account? Login </a>
        </form>
    </div>
</div>
<script type="text/javascript" src="/Final//decor/main.js"></script>

</div>
</div>
</body>
</html>