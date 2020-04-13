<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../decor/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<img class="wave" src="../../image/wave.png">
<div class="container">
    <div class="img">
        <img src="../../image/save.svg">
    </div>
    <div class="login-container">
        <form action="#" method="post">
            <img class="avatar" src="../../image/avatar.svg">
            <h2>Welcome</h2>
            <div class="input-div one ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>First name</h5>
                    <input name="firstname" class="input" type="text" >
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Last name</h5>
                    <input name="lastname" class="input" type="text" >
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5>Username</h5>
                    <input name="username" class="input" type="text" >
                </div>
            </div>
            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <h5>Password</h5>
                    <input class="input" type="password">
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h5>Email</h5>
                    <input name="email" class="input" type="text" >
                </div>
            </div>
            <div class="input-div two ">
                <div class="i">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div>
                    <h5>Phone</h5>
                    <input name="phone" class="input" type="text" >
                </div>
            </div>
            <pre>  </pre>
            <input type="submit" class="btn" value="Register">
            <a class="reg" href="http://localhost:63342/WebFinal-master/views/login/index.php?controller=register&action=index">Already have an account? Login </a>
        </form>
    </div>
</div>
<script type="text/javascript" src="../../decor/main.js"></script>

</div>
</div>
</body>
</html>