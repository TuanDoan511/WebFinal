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
            if ($(window).width() >= 1200)
            {
                $(".hamburger").click(function () {
                    $(".wrapper").toggleClass("collapse")
                });
            }
            else{
                $(".sidebar").css("display", "none")
                $(".main_container").css("margin-left", "0px")
                $(".main_container").css("padding-left", "0px")
                $("hr").css("width", "100%")
                $(".hamburger").click(function () {
                    if ($(".sidebar").css("display") == "none")
                    {
                        $(".sidebar").css("display", "")
                    }
                    else{
                        $(".sidebar").css("display", "none")
                    }
                });
            }
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
            $(".search-txt").on("input", function() {
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
                $(".hamburger").click(function () {
                    $(".wrapper").toggleClass("collapse")
                });
            }
        });

        $(document).ready(function () {
            $(".remove_btn").click(function() {
                if (confirm("Are you sure to remove this?")) {
                    $file_path = $(this).parent().attr("path");
                    $.ajax({
                        type: "post",
                        url: "/Final/",
                        data: {data: $file_path, type: "remove"},
                        success: function (data,status,xhr) {
                            // success callback function
                            location.reload();
                        },
                    });
                }
            });
            <?php
            $array = explode("/", $root);
            $root_folder = end($array);
            ?>
            $(".star_btn").click(function() {
                $file_path = $(this).parent().attr("path");
                if ($file_path[0] != "/"){
                    $file_path = "<?= $root_folder . "/" ?>" + $(this).parent().attr("path");
                }
                else{
                    $file_path = "<?= $root_folder ?>" + $(this).parent().attr("path");
                }
                $status = $(this).attr("class").split(" ").pop();
                $.ajax({
                    type: "post",
                    url: "/Final/",
                    data: {data: $file_path, owner: "<?= $user->username ?>", type: "like", curr_status: $status},
                });
            })
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
            <hr>
                <p>Note</p>
            <hr>

            <div class="all-files">
                <?php
                    echo "<br>";

                    foreach ($files as $file) {
                        $file_path = $file->path;
                        $file_path_splited = explode('/', $file_path);
                        if ($file_path_splited[0] == "My Drive"){
                            $action = 'index';
                        }
                        else{
                            $action = 'shared';
                        }
                        $file_name = end($file_path_splited);
                        $root = $_SERVER['DOCUMENT_ROOT'] . "/" . $user->rootDir;
                        $test = explode($file_name, "/");
                        $file_path = str_replace($file_path_splited[0] . "/", "", $file_path);

                        if (count(explode("/", $file_path)) >= 2){
                            $file_path = str_replace('/' . $file_name, "", $file_path);
                        }
                        else{
                            $file_path = str_replace($file_name, "", $file_path);
                        }

                        if (is_dir($root . '/' . $file->path))
                        {
                ?>
                            <div class="file">
                                <a href="?controller=home&action=<?= $action ?>&dir=<?= $file_path ?>">
                                    <div class="card">
                                        <div class="file-type-image">
                                            <img class="file-image" src="/Final/image/folder.jpg"/>
                                        </div>
                                        <br>
                                        <div class="file-name">
                                            <span class="name_hover"><?= $file_name ?></span>
                                            <p><?= $file_name ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                <?php
                        }
                        else{
                ?>
                            <div class="file">
                                <a href="?controller=home&action=<?= $action ?>&dir=<?= $file_path ?>">
                                    <div class="card">
                                        <div class="file-type-image">
                                            <img class="file-image" src="/Final/image/folder.jpg"/>
                                        </div>
                                        <br>
                                        <div class="file-name">
                                            <span class="name_hover"><?= $file_name ?></span>
                                            <p><?= $file_name ?></p>
                                        </div>
                                    </div>
                                </a>
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
