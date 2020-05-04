<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3e4a6334d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Final/decor/home_style.css">
    <link rel="stylesheet" href="/Final/decor/test.css">
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
            $("#user").mouseenter(function () {
                if (!$('.user_c').is(":visible")){
                    $(".user_c").show(100);
                }
            })
            $("#user").mouseleave(function () {
                if (!$('.user_c').is(':hover')) {
                    $(".user_c").hide(100);
                }
            })
            $(".user_c").mouseleave(function () {
                if (!$('#user').is(':hover')) {
                    $(".user_c").hide(100);
                }
            })
        });

        $(document).ready(function () {
            $(".search-btn").on("click", function() {
                var input = $(".search-txt").val().trim();
                $(".file").each(function() {
                    if (input === "" && $(this).hasClass("hidden")){
                        $(this).removeClass("hidden")
                    }
                    else{
                        $(this).removeClass("hidden")
                        let file_name = $(this).find(".file-name").children("p").text();
                        if (!file_name.toLowerCase().includes(input.toLowerCase())){
                            $(this).addClass("hidden")
                        }
                    }
                });
                $(".search-txt").val("");
            });
        });

        $(window).resize(function() {
            var width = $(window).width();
            if (width < 1200){
                $(".sidebar").css("display", "none")
                $(".main_container").css("margin-left", "0px")
                $(".main_container").css("padding-left", "0px")
                $("hr").css("width", "100%")
            }
            else{
                $(".sidebar").css("display", "")
                $(".main_container").css("margin-left", "200px")
                $(".main_container").css("padding-left", "15px")
                $("hr").css("width", "100%")
            }
        });
    </script>

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

</head>
<body>
    <div>
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
                        <button class="search-btn" >
                            <i class="fas fa-search"></i>
                        </button>
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
                    <li><a href="/Final/?controller=home&action=index">
                            <span class="icon">
                                <i class="fas fa-box-open" aria-hidden="true"></i></span>
                            <span class="title">My Drive</span>
                        </a></li>
                    <li><a href="/Final/?controller=home&action=shared">
                            <span class="icon">
                                <i class="fas fa-users" aria-hidden="true"></i></span>
                            <span class="title">Shared with me</span>
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
                </ul>
            </div>

            <div class="main_container">
            <?php
                $array = explode("/", $root);
                $root_folder = end($array);
                switch($root_folder){
                    case "My Drive":
                        $action = "index";
                        break;
                    case "Share With Me":
                        $action = "shared";
                        break;
                }
                if ($action == "index")
                {
            ?>
                <form method="post" enctype="multipart/form-data" action="/Final/">
                    <input type="hidden" name="type" value = "upload_files"/>
                    <input type="file" name="myFile[]" id="myFile" multiple/>
                    <input type="hidden" name="dir" value="<?= substr($dir, 1) ?>"/>
                    <button class="file_button" type="submit">Upload File</button>
                </form>
                <br>
                <form action="/Final/" method="get">
                    <button class="file_button" type="submit" >create new folder</button>
                    <input type="hidden" name="controller" value="home"/>
                    <input type="hidden" name="action" value="create_dir"/>
                    <input type="hidden" name="dir" value="<?= substr($dir, 1) ?>"/>
                    <input style="margin-top:10px" type="text" name="new_folder_name"/>
                </form>

                <br>
            <?php
                }
            ?>
                <hr>
                <?php
                    echo $alert;
                    $array = explode("/", $root);
                    $root_folder = end($array);
                    switch($root_folder){
                        case "My Drive":
                            $action = "index";
                            break;
                        case "Share With Me":
                            $action = "shared";
                            break;
                    }
                    echo "<a href='?controller=home&action=$action'>$root_folder</a>";
                    $url = "";

                    foreach (explode("/", $dir) as $item) {
                        if ($item == "") {
                            continue;
                        }
                        $url = $url . "/" . $item;
                        if ($url == "") {
                            $url = $item;
                        }
                        echo "  >  <a href='?controller=home&action=$action&dir=$url'>$item</a>";
                    }
                ?>

                <hr>

                <div class="all-files">
                <?php
                    echo "<br>";

                    $files = scandir($dir_path);
                    foreach ($files as $file) {
                        if (substr($file, 0, 1) == '.'){
                            continue;
                        }
                        if (is_dir($dir_path . "/" . $file)) {
                            $file_path = str_replace($root . "/", "", $dir_path . "/" . $file);
                ?>
                            <div class="file">
                                <a href="?controller=home&action=<?= $action ?>&dir=<?= $file_path ?>">
                                    <div class="card">
                                        <div class="file-type-image">
                                            <img class="file-image" src="/Final/image/folder.jpg"/>
                                        </div>
                                        <div class="file-name">
                                            <span class="name_hover"><?= $file ?></span>
                                            <p><?= $file ?></p>
                                        </div>
                                    </div>
                                </a>
                                <div class="card_button">
                                    <button class="share_btn">Share</button>
                                    <button class="star_btn fa fa-star unchecked"></button>
                                    <button class="remove_btn">Remove</button>
                                </div>
                            </div>
                <?php
                        }
                        else
                        {
                            $file_path = str_replace($_SERVER["DOCUMENT_ROOT"], "", $dir_path . "/" . $file);
                ?>
                            <div class="file">
                                <a href="<?= $file_path ?>">
                                    <div class="card">
                                        <div class="file-type-image">
                                            <img class="file-image" src="/Final/image/folder.jpg"/>
                                        </div>
                                        <div class="file-name">
                                            <span class="name_hover"><?= $file ?></span>
                                            <p><?= $file ?></p>
                                        </div>
                                    </div>
                                </a>
                                <div class="card_button">
                                    <button class="share_btn">Share</button>
                                    <button class="star_btn fa fa-star unchecked"></button>
                                    <button class="remove_btn">Remove</button>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>
                </div>
                <script> 
                    $(document).ready(function() {
                        $('.star_btn.fa.fa-star').on('click', function(){
                            if ($(this).hasClass("unchecked")){
                                $(this).removeClass('unchecked');
                                $(this).addClass('checked');
                            }
                            else {
                                $(this).removeClass('checked');
                                $(this).addClass('unchecked');
                            }
                        });
                    });
                </script>
                <script type="text/javascript" src="/Final/decor/home.js"></script>

            </div>
        </div>
    </div>
</body>
</html>
