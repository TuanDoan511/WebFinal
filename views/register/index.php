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
    <label>email:</label>
    <br>
    <input type="email" name="email" value="<?= $email ?>"/>
    <br>
    <label>phone:</label>
    <br>
    <input type="number" name="phone" value="<?= $phone ?>"/>
    <br>
    <label>first name:</label>
    <br>
    <input type="text" name="firstName" value="<?= $firstName ?>"/>
    <br>
    <label>last name:</label>
    <br>
    <input type="text" name="lastName" value="<?= $lastName ?>"/>
    <br>
    <p style="color:red; "><?= $register_alert ?></p>
    <br>
    <input type="hidden" name="type" value="register_form"/>
    <input type="submit"/>
</form>
</body>
</html>