<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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