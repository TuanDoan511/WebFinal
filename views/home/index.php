<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=firefox"
    <script src="https://kit.fontawesome.com/3e4a6334d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Final/decor/home_style.css"
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <h1 class="logo-text"><span>TDT</span>Drive</h1>
        </div>
        <i class="fas fa-bars menu-toggle"></i>
        <ul class="nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    User
                    <i class="fas fa-chevron-down" style="font-size: .8em;"></i>
                </a>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="?controller=logout&action=logout" class="Logout" id="myBtn">Logout</a></li>

                </ul>
            </li>
        </ul>
    </header>
    <?php
        echo "<a href='?controller=home&action=index'>My Drive</a>";
        $url = "";

        foreach (explode("/", $dir) as $item) {
            if ($item == "") {
                continue;
            }
            $url = $url . "/" . $item;
            if ($url == "") {
                $url = $item;
            }
            echo "  >  <a href='?controller=home&action=index&dir=$url'>$item</a>";
        }

        echo "<br>";

        $files = scandir($dir_path);
        foreach ($files as $file) {
            if (substr($file, 0, 1) == '.'){
                continue;
            }
            if (is_dir($dir_path . "/" . $file)) {
                $file_path = str_replace($root . "/", "", $dir_path . "/" . $file);
                echo "<a href='?controller=home&action=index&dir=$file_path'>$file<a>";
                echo "<br>";
            }
            else
            {
                $file_path = str_replace($root . "/", "", $dir_path . "/" . $file);
                echo "<a href='?controller=home&action=index&file=$file_path'>$file<a>";
                echo "<br>";
            }
        }
    ?>
    <br>

    <form action="/Final/" method="get">
        <input type="hidden" name="controller" value="home"/>
        <input type="hidden" name="action" value="create_dir"/>
        <input type="hidden" name="dir" value="<?= str_replace("//", "/", substr($dir, 2)) ?>"/>
        <input type="text" name="new_folder_name"/>
        <input type="submit" value="create new folder"/>
    </form>
</body>
</html>
