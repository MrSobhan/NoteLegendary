<!-- <nav class="navbar navbar-expand-lg bg-body-tertiary shadow w-100" id="nav">
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
            <li><a class="dropdown-item" href="<?= href('panel-users.php?id=' . get_session('id')) ?>">پنل كاربري</a></li>
            <li><button class="dropdown-item" name="goNotes">يادداشت ها</button></li>
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
</nav> -->
<nav id="navbar" class="w-full z-full">
  <div class="relative z-10 mx-auto w-full px-2 sm:px-6 lg:px-8 ">
    <div class="relative flex h-16 items-center justify-between">


      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative nav-open shadow-lg inline-flex items-center justify-center rounded-full p-2 text-indigo-800 hover:bg-indigo-100 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-800" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6 menu" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6 exit" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>


      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center me-6">
          <a href="./home.php"><img class="h-10 w-auto" src="./images/NoteLegendary.png" alt="Your Company"></a>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-indigo-700 text-white rounded-md px-3 py-2 text-sm font-medium me-4" aria-current="page">صفحه اصلی</a>
            <a href="#" class="text-indigo-800 hover:bg-indigo-50 hover:indigo-100 rounded-md px-3 py-2 text-sm font-medium">چی شد که ما امدیم؟</a>
            <a href="#" class="text-indigo-800 hover:bg-indigo-50 hover:indigo-100 rounded-md px-3 py-2 text-sm font-medium sm:hidden lg:block">ویژگی ها</a>
            <a href="#" class="text-indigo-800 hover:bg-indigo-50 hover:indigo-100 rounded-md px-3 py-2 text-sm font-medium">سوالات متداول</a>
            <a href="#" class="text-indigo-800 hover:bg-indigo-50 hover:indigo-100 rounded-md px-3 py-2 text-sm font-medium sm:hidden lg:block">نظرات</a>
            <a href="#" class="text-indigo-800 hover:bg-indigo-50 hover:indigo-100 rounded-md px-3 py-2 text-sm font-medium sm:hidden lg:block">درباره ما</a>
          </div>
        </div>
      </div>

      <?php
      if ($isLogin) {

      ?>

        <div class="absolute inset-y-0 right-0 flex items-center pl-2 sm:static sm:inset-auto sm:mr-6 sm:pr-0">
          <button type="button" class="relative rounded-full me-3 p-1 text-gray-900 shadow-lg focus:outline-none focus:ring-1 focus:ring-indigo-800 focus:ring-offset-2 focus:ring-offset-indigo-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6 stroke-indigo-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button" class="relative flex rounded-full shadow-lg text-sm focus:outline-none focus:ring-1 focus:ring-indigo-800 focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://cdn3d.iconscout.com/3d/premium/thumb/user-6332708-5209354.png?f=webp" alt="">
              </button>
            </div>

            <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
            <div class="absolute sm:left-48 md:left-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden dropdown-profile" open="false" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100", Not Active: "" -->
              <a href="<?= href('panel-users.php?id=' . get_session('id')) ?>" class="block px-4 py-2 text-sm text-indigo-900 hover:bg-indigo-100" role="menuitem" tabindex="-1" id="user-menu-item-0"><i class="bi bi-person text-base"></i> پروفایل</a>
              <a href="<?= href('notes.php?id=' . get_session('id')) ?>" class="block px-4 py-2 text-sm text-indigo-900 hover:bg-indigo-100" role="menuitem" tabindex="-1" id="user-menu-item-1"><i class="bi bi-journal"></i> یادداشت ها</a>
              <a href="#" class="block px-4 py-2 text-sm text-indigo-900 hover:bg-indigo-100" role="menuitem" tabindex="-1" id="user-menu-item-1"><i class="bi bi-bell"></i> اعلان ها</a>
              <form action="" method="post">
                <button type="submit" name="exit" class="block px-4 py-2 text-sm text-red-700" role="menuitem" tabindex="-1" id="user-menu-item-2"><i class="bi bi-box-arrow-right"></i> خروج</button>
              </form>
            </div>
          </div>
        </div>

      <?php
      } else {
      ?>
        <a href=<?= href('login.php') ?>>
          <button type="button" class="h-[45px] my-auto absolute inset-y-0 right-0 flex items-center sm:static sm:inset-auto sm:mr-6 flex items-center justify-center rounded-lg border border-transparent md:bg-indigo-100 px-4 py-2 text-sm font-medium text-indigo-600 hover:shadow focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:ring-offset-2">ورود / عضویت</button>
        </a>


      <?php
      }
      ?>

    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden hidden mobile-menu" id="mobile-menu" open="false">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="bg-indigo-800 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">صفحه اصلی</a>
      <a href="#" class="text-indigo-800 hover:bg-indigo-100 block rounded-md px-3 py-2 text-base font-medium">چی شد که ما امدیم؟</a>
      <a href="#" class="text-indigo-800 hover:bg-indigo-100 block rounded-md px-3 py-2 text-base font-medium">ویژگی ها</a>
      <a href="#" class="text-indigo-800 hover:bg-indigo-100 block rounded-md px-3 py-2 text-base font-medium">سوالات متداول</a>
      <a href="#" class="text-indigo-800 hover:bg-indigo-100 block rounded-md px-3 py-2 text-base font-medium">نظرات</a>
      <a href="#" class="text-indigo-800 hover:bg-indigo-100 block rounded-md px-3 py-2 text-base font-medium">درباره ما</a>
    </div>
  </div>
</nav>
<a href="#">
  <div class="btnTop fixed z-full bottom-4 right-8 bg-indigo-800 text-white rounded-full py-2 px-3 animate-bounce hidden">
    <i class="bi bi-caret-up-fill"></i>
  </div>
</a>