<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3e4a6334d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Final/decor/profile_style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript">


        $(document).ready(function () {
            $("#user").mouseover(function () {
                $(".user_c").show(100);
            });
            $("html").click(function () {
                $(".user_c").hide(100);
            });
        });

        $(document).ready(function () {
            $(".detail").click(function () {
                $(".wrapper").toggleClass("collapse_detail")
            });
        });

        $(document).ready(function () {
            $("#show").mouseover(function () {
                $(".sub-menu").show(100);
            });
            $("html").click(function () {
                $(".sub-menu").hide(100);
            });
        });




    </script>

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

</head>
<body style="background-color: #e1ecf2">
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
                        <p class="v">Nguyen Phuong</p>
                        <img src="../../image/avatar.svg" alt="user" class="l">
                    </div>
                    <div class="user_c">
                        <div class="user_info l">
                            <img src="../../image/avatar.svg" alt="user" class="info_img ">
                            <p>Username</p>
                            <p>User@gmail.com</p>
                        </div>

                        <ul>
                            <li><a href="#">Manage your Profile</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li id="show"><a href="#">
                            <span class="icon" id="show">
                                <i class="fas fa-plus-circle" aria-hidden="true"></i></span>
                        <span class="title">New</span>
                    </a>
                    <div class="sub-menu">
                        <ul>
                            <li><a href="#">
                                         <span class="icon" >
                                        <i class="fas fa-folder-plus" aria-hidden="true"></i></span>
                                    <span class="Add">Create Folder</span></a></li>
                            <li><a href="#">
                                         <span class="icon" >
                                        <i class="fas fa-file-upload" aria-hidden="true"></i></span>
                                    <span class="Add">Upload File</span></a></li>
                            <li><a href="#">
                                         <span class="icon">
                                        <i class="fas fa-folder" aria-hidden="true"></i></span>
                                    <span class="Add">Upload Folder</span></a></li>
                        </ul>
                    </div>
                </li>
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
        <div class="detail">
            <a href="#">
                            <span class="icon_detail">
                                <i class="fas fa-info-circle" aria-hidden="true"></i></span>

            </a>
        </div>

        <div class="container " style="width: 900px; z-index: 0" >
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <h1>Edit Profile</h1>
            <hr >
            <div class="row" style="margin-left: 100px" >

                <div class="col-lg-3" >
                    <div class="text-center">
                        <img src="../../image/avatar.svg" class="img-circle" alt="avatar" width="100" height="100">
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

                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">First name:</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="TDT">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Last name:</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Uni">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Birthday:</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="date" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gender:</label>
                            <div class="col-lg-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="student@gmail.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Username:</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="student">
                            </div>
                        </div>

                        <h3>Security</h3>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password:</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-5 control-label">Confirm password:</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-8">
                                <input id="button" type="button" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</header>

</body>
</html>
