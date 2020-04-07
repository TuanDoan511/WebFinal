<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <form action="/Final/" method="post">
            <label>username:</label>
            <br>
            <input type="text" name="username" value="<?= $username ?>"/>
            <br>
            <label>password:</label>
            <br>
            <input type="password" name="password"/>
            <br>
            <a href="?controller=register&action=index">Don't have account? Register now!</a>
            <br>
            <p style="color:red; "><?= $login_alert ?></p>
            <br>
            <input type="hidden" name="type" value="login_form"/>
            <input type="submit"/>
        </form>
    </body>
</html>