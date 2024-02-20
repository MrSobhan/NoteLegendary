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
    
    <?php
    function counterNotes($count)
    {
    ?>
        <div class="row align-items-center">
        <div class="col-6">
          <div class="badge bg-primary text-light fs-5 mt-5 ms-5"><i class="bi bi-award-fill"></i> تعداد نوشته :<?= $count ?></div>
        </div>
        <div class="col-6">
          <form action="" method="post">
            <button class="btn btn-danger fs-7 float-end mt-5 me-5" name="delete-all"><i class="bi bi-trash3-fill"></i> حذف همه</button>
          </form>
        </div>
      </div>
    <?php
    }
    ?>

</body>

</html>