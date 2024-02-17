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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
    function alertErrorLogin()
    {
    ?>
        <script>
            Swal.fire(
                'متاسفانه اطلاعات شما با موفقیت ثبت نشد.',
                'دوباره تلاش کنید!',
                'error'
            )
        </script>
    <?php
    }
    ?>
    
    <?php
    function alertErrorInput()
    {
    ?>
        <script>
            Swal.fire(
                'فيلد ها را كامل كنيد.',
                'تمامی اطلاعات خواسته شده را وارد کنید❤️',
                'error'
            )
        </script>
    <?php
    }
    ?>

</body>

</html>