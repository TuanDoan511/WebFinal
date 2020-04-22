<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3e4a6334d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Final/decor/home_style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".hamburger").click(function () {
                $(".wrapper").toggleClass("collapse")
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#user").mouseover(function () {
                $(".user_c").show(100);
            });
            $("html").click(function () {
                $(".user_c").hide(100);
            });
        });
    </script>

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

</head>
<body>
    <header>
        <div class="wrapper">
            <div class="top_navbar">
                <div class="hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="top_menu">
                    <div class="logo">TDT Drive</div>
                    <div class="search-box">
                        <label>
                            <input class="search-txt" type="text" name="" placeholder="Search your file ">
                        </label>
                        <a class="search-btn" href="#">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                    <div class="head">
                        <div class="user_section" id="user">
                            <img src="/Final/image/avatar.svg" alt="user" class="l">
                        </div>
                        <div class="user_c">
                            <div class="user_info l">
                            <img src="/Final/image/avatar.svg" alt="user" class="info_img ">
                            <p><?= $user->username?></p>
                            <p><?= $user->email?></p>

                        </div>
                                <ul>
                                    <li><a href="#">Manage your Profile</a></li>
                                    <li><a href="?controller=logout&action=logout">Logout</a></li>
                                </ul>

                        </div>
                    </div>

                </div>
            </div>
            <div class="sidebar">
                <ul>
                    <li><a href="#">
                            <span class="icon">
                                <i class="fas fa-box-open" aria-hidden="true"></i></span>
                            <span class="title">My Drive</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon">
                                <i class="fas fa-users" aria-hidden="true"></i></span>
                            <span class="title">Shared with me</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon">
                            <i class="fas fa-clock" aria-hidden="true"></i></span>
                            <span class="title">Recent</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon">
                                <i class="fas fa-star" aria-hidden="true"></i></span>
                            <span class="title">Note</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon">
                                <i class="fas fa-trash" aria-hidden="true"></i></span>
                            <span class="title">Trash</span>
                        </a></li>
                    <li><a href="#">
                            <span class="icon">
                                <i class="fas fa-cog" aria-hidden="true"></i></span>
                            <span class="title">Setting</span>
                        </a></li>
                </ul>
            </div>

            <div class="main_container">
                <form method="post" enctype="multipart/form-data" action="/Final/">
                    <input type="hidden" name="type" value = "upload_files"/>
                    <input type="file" name="myFile[]" id="myFile" multiple/>
                    <input type="hidden" name="dir" value="<?= substr($dir, 1) ?>"/>
                    <button class="file_button" type="submit">Upload File</button>
                </form>
                <form action="/Final/" method="get">
                    <input type="hidden" name="controller" value="home"/>
                    <input type="hidden" name="action" value="create_dir"/>
                    <input type="hidden" name="dir" value="<?= substr($dir, 1) ?>"/>
                    <input type="text" name="new_folder_name"/>
                    <button class="file_button" type="submit" >create new folder</button>
                </form>
                <br>
                <hr>
                <?php
                    echo $alert;
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
                ?>
                <hr>
                <div class="row">
                    <div class="col-xl-12" style=""></div>
                </div>
                <?php

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
                <script type="text/javascript" src="/Final/decor/home.js"></script>

        </div>
        </div>
    </header>

</body>
</html>
