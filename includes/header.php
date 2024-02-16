<?php

// if (isset($_POST['btn_exit'])) {

//     set_s('login', false);
//     set_s('id', '');

//     // session_unset();
//     // session_destroy();
    
// }

?>

<!DOCTYPE html>

<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-beJoAY4VI2Q+5IPXjI207/ntOuaz06QYCdpWfWRv4lSFDyUSqsM0W+wiAMr2I185" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- NotCode -->
    <?php if (isset($page_type)) {
        if ($page_type == "login") {
    ?>
            <link rel="stylesheet" href="/css/login.css">
        <?php
        }
    } else { ?>
        <link rel="stylesheet" href="/css/main.css">
    <?php
    } ?>


    <!-- <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/main.css"> -->


    <script defer src="https://unpkg.com/alpinejs@3.3.4/dist/cdn.min.js"></script>
    
    <!-- SweetAlert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <?php if (!isset($hideHeader)) {
    ?>
        <!-- Header -->
        <header>
            <nav class="header navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand text-light moraba" href="#">پاپی یار</a>
                    <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-menu-button"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-5 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">صفحه اصلی</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    اطلاعات
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#"> لورم ایپسوم</a></li>
                                    <li><a class="dropdown-item" href="#">لورم ایپسوم متن</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">لورم ایپسوم متن ساختگی</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">درباره ما</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">نظرات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">تماس با ما</a>
                            </li>
                        </ul>

                        <?php

                        if (!isset($_SESSION['id'])) {
                        ?>
                            <ul class="nav nav-pills gap-2 bg-btn rounded-pill shadow overflow-hidden d-none d-lg-flex" id="pillNav2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="/login.php">
                                        <button class="nav-link rounded-5 text-light bg-btn" id="home-tab2" type="button" role="tab" aria-selected="true">ورود</button>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="/signup.php">
                                        <button class="nav-link rounded-pill color-c bg-light" id="profile-tab2" type="button" role="tab" aria-selected="false">ثبت نام</button>
                                    </a>
                                </li>
                            </ul>
                        <?php
                        } else {

                        ?>

                            <ul class="nav nav-pills gap-2 bg-btn rounded-pill shadow overflow-hidden d-none d-lg-flex" id="pillNav2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill color-c bg-light" id="profile-tab2" type="button" role="tab" aria-selected="false" name="btn_exit">خروج</button>
                                    <!-- <form action="" method="post">
                                        <a href="#">
                                        </a>
                                    </form> -->
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="../cms/panel/">
                                        <button class="nav-link rounded-5 text-light bg-btn" id="home-tab2" type="button" role="tab" aria-selected="true">پنل کاربری</button>
                                    </a>
                                </li>
                            </ul>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </header>
    <?php
    } ?>