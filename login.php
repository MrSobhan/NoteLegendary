<?php

require_once("./configurations/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $email2 = valid($_POST['email']);
        $password2 = valid($_POST['password']);

        $queryGetUsers = "SELECT * FROM users";

        $allUsers = mysqli_query($conn, $queryGetUsers);


        if ($email2  && $password2) {
            while ($user = $allUsers->fetch_assoc()) {
                if ($email2 == $user['email'] && password_verify($password2, $user["password"])) {

                    set_session('id', $user['id']);
                    set_session('uname', $user['username']);
                    set_session('login', true);
                    home();
                } else {
                    set_session('login', false);
                    alertErrorLogin();
                }
            }
        } else {
            alertErrorInput();
        }
    }
}
$page_type = 'login';
include_once("./includes/header.php");
?>


<body class="h-full">
    <!-- <div class="container p-5 shadow">
        <form action="" class="form" method="post">
            <a href=<?= href('home.php') ?> style="text-decoration: none;cursor:pointer;">
                <h1 class="fs-3 text-center mb-3 text-dark">Legendary Notes <i class="bi bi-pencil-square"></i></h1>
            </a>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ايميل:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email2">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">رمز ورود:</label>
                <input type="password" name="password2" class="form-control" placeholder="ُSobhan">
            </div>
            <center>
                <button class="btn5 mt-4 mb-4" name="submit" type="submit">ورود</button>
                <a href=<?= href('singup.php') ?> style="text-decoration: none;">
                    <div class="a"><i class="bi bi-person-circle"></i> ثبت نام</div>
                </a>
            </center>
        </form>
    </div> -->


    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">به حساب خود وارد شوید.</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">ايميل:</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">رمز ورود:</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                    </div>
                </div>

                <div>
                    <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ورود</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                رمزت یادت رفته! نگران نباش
                <a href=<?= href('singup.php') ?> class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">ثبت نام</a>
            </p>
        </div>
    </div>




    <script src="./js/main.js"></script>

</body>

</html>