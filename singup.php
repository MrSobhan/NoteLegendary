<?php require_once("./configurations/conn.php");  ?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="png" href="https://img.lovepik.com/element/45007/0204.png_300.png">
    <link rel="stylesheet" href="./css/login.css">
    <title>Singup Notes</title>
</head>

<body>
    <div class="container p-5 shadow">
        <form class="form" method="post">
            <a href="http://localhost/php/Notes/home.php" style="text-decoration: none;cursor:pointer;">
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
                <a href="http://localhost/php/Notes/login.php" style="text-decoration: none;">
                    <div class="a"><i class="bi bi-person-circle"></i> ورود</div>
                </a>
            </center>
        </form>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    function alert()
    {
    ?>
        <script>
            Swal.fire(
                'اطلاعات شما ثبت نشد.',
                '',
                'error'
            )
        </script>
    <?php
    }
    ?>

    <?php

    if (isset($_POST['submit'])) {
        $email = htmlspecialchars($_POST['email']);
        $name = htmlspecialchars($_POST['num']);
        $pass = htmlspecialchars($_POST['password']);
        $number = htmlspecialchars($_POST['phone']);


        if ($name == '' || $email == '' || $pass == '' || $number == '') {
            alert();
        } else {

            $ID = uniqid();

            $querySetUser = "INSERT INTO users(id , username ,email ,phonenumber , password) values('{$ID}', '{$name}','{$email}' ,'{$number}' , '{$pass}')";

            $com = mysqli_query($conn, $querySetUser);

            // $quryGetUser = "SELECT * FROM users";

            // $result = mysqli_query($conn, $quryGetUser);

            if ($com) {
                set_s('id', $ID);
                set_s('uname', $name);
                set_s('login', true);
                home();
            } else {
                set_s('login', false);
                alert();
            }
        }
    }




    ?>

    <script src="./js/main.js"></script>
</body>

</html>