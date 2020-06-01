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
            $(".search-txt").on('input', function() {
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

        $(document).ready(function(){
            $("html").on("dragover", function(e) {
                e.preventDefault();
                e.stopPropagation();
            });

            $("html").on("drop", function(e) {
                e.preventDefault();
                e.stopPropagation();
            });

            $('#fileUpload').on('dragover', function (e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).find("p").text("Drop");
            });

            $('#fileUpload').on('dragleave', function (e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).find("p").text("Drag here to upload");
            });

            $('#fileUpload').on('drop', function (e) {
                e.preventDefault()
                e.stopPropagation();
                $(this).find("p").text("Drag here to upload");

                //$(this).find("#myFile").files = e.originalEvent.dataTransfer.files;
                document.getElementById("myFile").files = e.originalEvent.dataTransfer.files;
                console.log(document.getElementById("myFile").files)

            });
        })
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
                                    <li><a href="?controller=profile&action=index">Manage your Profile</a></li>
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
                    <li><a href="/Final/?controller=home&action=note">
                            <span class="icon">
                                <i class="fas fa-star" aria-hidden="true"></i></span>
                            <span class="title">Note</span>
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
                <div id="fileUpload">
                    <form method="post" enctype="multipart/form-data" action="/Final/">
                        <input type="hidden" name="type" value = "upload_files"/>
                        <input type="file" name="myFile[]" id="myFile" multiple/>
                        <input type="hidden" name="dir" value="<?= substr($dir, 1) ?>"/>
                        <p style="text-align: center; color: grey; opacity: 50%">Drag here to upload</p>
                        <button class="file_button" type="submit">Upload File</button>
                    </form>
                </div>
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
                        $like = "unchecked";
                        if (is_dir($dir_path . "/" . $file)) {
                            $file_path = str_replace($root . "/", "", $dir_path . "/" . $file);
                            if ($file_path[0] == "/"){
                                foreach ($liked_post as $post){
                                    if ($post->path == substr($file_path, 1)){
                                        $like = "checked";
                                        break;
                                    }
                                }
                            }
                            else{
                                foreach ($liked_post as $post){
                                    if ($post->path == $file_path){
                                        $like = "checked";
                                        break;
                                    }
                                }
                            }
                ?>
                            <div class="file">
                                <a href="?controller=home&action=<?= $action ?>&dir=<?= $file_path ?>">
                                    <div class="card">
                                        <div class="file-type-image">
                                            <img class="file-image" src="/Final/image/folder.jpg"/>
                                        </div>
                                        <br>
                                        <div class="file-name">
                                            <span class="name_hover"><?= $file ?></span>
                                            <p><?= $file ?></p>
                                        </div>
                                    </div>
                                </a>
                                <div path="<?= str_replace($root . "/", "", $dir_path . "/" . $file) ?>" class="card_button">
                                    <button class="share_btn">Share</button>
                                    <button class="star_btn fa fa-star <?= $like ?>"></button>
                                    <button class="remove_btn">Remove</button>
                                </div>
                            </div>
                <?php
                        }
                        else
                        {
                            $file_path = str_replace($root . "/", "", $dir_path . "/" . $file);
                            if ($file_path[0] == "/"){
                                foreach ($liked_post as $post){
                                    if ($post->path == substr($file_path, 1)){
                                        $like = "checked";
                                        break;
                                    }
                                }
                            }
                            else{
                                foreach ($liked_post as $post){
                                    if ($post->path == $file_path){
                                        $like = "checked";
                                        break;
                                    }
                                }
                            }
                            $file_path = str_replace($_SERVER["DOCUMENT_ROOT"], "", $dir_path . "/" . $file);
                ?>
                            <div class="file">
                                <a href="<?= $file_path ?>">
                                    <div class="card">
                                        <div class="file-type-image">
                                            <img class="file-image" src="/Final/image/folder.jpg"/>
                                        </div>
                                        <br>
                                        <div class="file-name">
                                            <span class="name_hover"><?= $file ?></span>
                                            <p><?= $file ?></p>
                                        </div>
                                    </div>
                                </a>
                                <div path="<?= str_replace($root . "/", "", $dir_path . "/" . $file) ?>" class="card_button">
                                    <button class="share_btn">Share</button>
                                    <button class="star_btn fa fa-star <?= $like ?>"></button>
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
