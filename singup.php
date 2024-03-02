<?php
require_once("./configurations/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['submit'])) {

        // Regex

        $emailRegex = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/gm" ;
        $passRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/gm" ;
        $numberRegex = "/(0|\+98)?([ ]|-|[()]){0,2}9[1|2|3|4]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}/ig" ;

        $email = preg_match($emailRegex , valid($_POST['email']));
        $name = valid($_POST['num']);
        $pass = preg_match($passRegex, valid($_POST['password']));
        $number = preg_match($numberRegex, valid($_POST['phone']));

        

        if (!$name || !$email || !$pass || !$number) {
            alertErrorInput();
        } else {

            $ID = uniqid();

            $passHash = pas_hash($pass);

            $querySetUser = "INSERT INTO `users` (id , username ,email ,phonenumber , password) values('{$ID}', '{$name}','{$email}' ,'{$number}' , '{$passHash}')";

            $com = mysqli_query($conn, $querySetUser);


            if ($com) {
                set_session('id', $ID);
                set_session('uname', $name);
                set_session('login', true);
                Locatoin('notes.php?id=' . get_session('id'));
            } else {
                set_session('login', false);
                alertErrorLogin();
            }
        }
    }
}
$page_type = 'login';
include_once("./includes/header.php");
?>



<body class="h-full">
    <!-- <div class="container p-5 shadow">
        <form class="form" method="post">
            <a href=<?= href('home.php') ?> style="text-decoration: none;cursor:pointer;">
                <h1 class="fs-3 text-center mb-3 text-dark">Legendary Notes <i class="bi bi-pencil-square"></i></h1>
            </a>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">نام:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ُSobhan" name="num">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ايميل:</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">تلفن:</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="09222877197" name="phone">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">رمز ورود:</label>
                <input type="password" name="password" class="form-control" placeholder="Abcd...">
            </div>
            <center>
                <button class="btn5 mt-4 mb-4" name="submit" type="submit">ثبت نام</button>
                <a href=<?= href('login.php') ?> style="text-decoration: none;">
                    <div class="a"><i class="bi bi-person-circle"></i> ورود</div>
                </a>
            </center>
        </form>
    </div> -->

    <div class="flex min-h-full w-auto flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="./home.php"><img class="mx-auto h-40 w-auto" src="./images/NoteLegendary.png" alt="Your Company"></a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">نام:</label>
                        <div class="mt-2">
                            <input id="text" name="num" type="text" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">ايميل:</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">تلفن:</label>
                        <div class="mt-2">
                            <input id="phone" name="phone" type="number" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
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

                </div>
                <div>
                    <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ثبت نام</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                مثل اینکه اکانت داری برو به
                <a href=<?= href('login.php') ?> class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">ورود</a>
            </p>
        </div>
    </div>

    <script src="./js/main.js"></script>
</body>

</html>