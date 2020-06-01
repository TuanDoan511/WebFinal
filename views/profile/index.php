<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3e4a6334d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Final/decor/home_style.css">
    <link rel="stylesheet" href="/Final/decor/test.css">
    <link rel="stylesheet" href="/Final/decor/profile_style.css">
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

            var message = "<?= $alert ?>";
            console.log(message)
            if (message != ""){
                alert(message)
            }

            var old_first_name = "<?=$user->first_name?>";
            var old_last_name = "<?=$user->last_name?>";
            var old_email = "<?=$user->email?>";
            var old_phone = "<?=$user->phone?>";
            console.log(old_first_name, old_last_name, old_email, old_phone)
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
            <h1>Edit Profile</h1>
            <hr >
            <div class="row" style="margin-left: 100px" >

                <div>
                    <div class="text-center">
                        <img src="/Final/image/avatar.svg" class="img-circle" alt="avatar" width="100" height="100">
                    </div>

                    <div class="text-center">

                        <label class="custom-upload">
                            <span class="fas fa-camera"></span>
                            Upload Image
                            <input type="file" class="form-control" accept="image/*">
                        </label>
                    </div>
                </div>

                <div class="col-lg-8 personal-info" style="margin-left: 50px">

                    <h3>Personal info</h3>

                    <form method="post" action="/Final/" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="first-name" type="text" value="<?= $user->first_name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="last-name" type="text" value="<?= $user->last_name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="email" type="text" value="<?= $user->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Phone number:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="phone" type="text" value="<?= $user->phone ?>">
                            </div>
                        </div>
                        <input type="hidden" name="type" value="change-profile"/>
                        <div class="col-lg-8">
                            <input type="submit" class="btn btn-default" value="Save Changes">
                        </div>
                    </form>

                        <h3 style="margin-top: 50px">Security</h3>
                    <form method="post" action="/Final/" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Old password:</label>
                            <div class="col-lg-9">
                                <input name="old_password" class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password:</label>
                            <div class="col-lg-9">
                                <input name="new_password" class="form-control" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-5 control-label">Confirm password:</label>
                            <div class="col-lg-9">
                                <input name="confirm_password" class="form-control" type="password">
                            </div>
                        </div>
                        <input type="hidden" name="type" value="change-password"/>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-8">
                                <input type="submit" class="btn btn-default" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
