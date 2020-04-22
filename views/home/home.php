<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3e4a6334d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../decor/home_style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".hamburger").click(function () {
                $(".wrapper").toggleClass("collapse")
            });
        });

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
            <div class="detailbar">
                <nav>
                    <a href="#">Details</a>
                    <a href="#">Activity</a>
                    <div class="line"></div>
                 </nav>
            </div>



        </div>

    </header>

</body>
</html>
