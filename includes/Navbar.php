<nav class="navbar navbar-expand-lg bg-body-tertiary shadow w-100" id="nav">
    <div class="container">
        <?php
        if (!$isLogin) {

        ?>
            <div>
                <button class="btn"><a href=<?= href('singup.php') ?> class="text-dark" style="text-decoration: none;"><i class="bi bi-pen-fill"></i> ثبت نام</a></button>
                <button class="btn btn-primary"><a href=<?= href('login.php') ?> class="text-light" style="text-decoration: none;"><i class="bi bi-person-fill"></i> ورود</a></button>
            </div>
        <?php
        } else {
        ?>
            <form method="post">
                <div class="dropdown">
                    <?php
                    if (isset($_SESSION['uname'])) {
                    ?>
                        <a class="dropdown-toggle text-dark" style="text-decoration: none;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['uname']; ?></a>
                    <?php
                    }
                    ?>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= href('panel-users.php?id='.get_session('id'))?>">پنل كاربري</a></li>
                        <li><button class="dropdown-item" name="go">يادداشت ها</button></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><button class="dropdown-item text-danger" name="exit">خروج</button></li>
                    </ul>
                </div>
            </form>
        <?php
        }
        ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">صفحه اصلي</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#p1">ويژگي ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#p2">سوالات مهم</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#p3">نظرات</a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand fs-6" href="<?= href('home.php'); ?>">Legendary Notes <i class="bi bi-pencil-square"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>