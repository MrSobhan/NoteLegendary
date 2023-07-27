<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="png" href="https://img.lovepik.com/element/45007/0204.png_300.png">
    <title>Login Notes</title>
    <style>
        @font-face {
            font-family: vazir;
            src: url(../fonts/Vazir-Regular.woff) format('woff'),
             url(../fonts/Vazir-Regular.ttf) format('ttf'),
             url(../fonts/Vazir-Regular.woff2) format('woff2'),
             url(../fonts/Vazir-Regular.eot);
        }
        :root{
            --color-them :rgb(193, 54, 206);
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: vazir;
        }
        body{
            background-color: var(--color-them);
            height: 100vh;
            overflow: hidden;
        }
        .container{
            width: 350px;
            background-color: rgba(240, 248, 255, 0.459);
            border-radius: 10px;
            margin-top: 100px;
        }
        .btn5{
            width: 100%;
            height: 40px;
            background-color: var(--color-them);
            color: aliceblue;
            border: none;
            border-radius: 5px;
        }
        .a{
            width: 70%;
            height: 30px;
            background-color: rgba(240, 248, 255, 0);
            color: black;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container p-5 shadow">
        <form action="" class="form" method="post">
        <a href="http://localhost/php/Notes/home.php" style="text-decoration: none;cursor:pointer;"><h1 class="fs-3 text-center mb-3 text-dark">Legendary Notes <i class="bi bi-pencil-square"></i></h1></a>
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
                <a href="http://localhost/php/Notes/singup.php" style="text-decoration: none;"><div class="a"><i class="bi bi-person-circle"></i> ثبت نام</div></a>
            </center>
        </form>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    function alert(){
    ?>
    <script>
        Swal.fire(
            'رمز ورود اشتباه است',
            '',
            'error'
        )
    </script>
    <?php
    }
    ?>

<?php

session_start();



if(isset($_POST['submit'])){
    $email2 = htmlspecialchars($_POST['email2']);
$password2 = htmlspecialchars($_POST['password2']);


$link = mysqli_connect('localhost:3306' , 'root' ,'' , 'notes');


$link->set_charset('utf8');

$qury = "SELECT * FROM users";

$result = mysqli_query($link , $qury);


if($email2 !='' && $password2 != ''){
    while($row = $result->fetch_assoc()){
        if ($email2 == $row['email']) {
            if($password2 == $row['password']){
                $_SESSION['login'] = 'true';
                $_SESSION['id'] = $row['id'];
                $_SESSION['uname']  =$row['name'];
                header("Location:http://localhost/php/Notes/home.php");
            }else{
                $_SESSION['login'] = 'false';
                alert();
            }
        }
    }
}else{
    alert();
}
}



?>

<script>
    $.addEventListener('contextmenu' , (event)=>{
        event.preventDefault()
    })
</script>
    
</body>
</html>
