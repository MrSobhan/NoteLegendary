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

    
    <?php
    function alertNotNotes()
    {
    ?>
        <div class="flex items-center px-3 py-2 mb-4 text-sm text-indigo-800 rounded-lg bg-indigo-50" role="alert">
          <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div>
            <p class="moraba text-xl">امروز يادداشتي نداشتيد.</p>
          </div>
          <a href=<?= href('notes-add.php') ?> class="ms-auto">
            <button class="group cursor-pointer outline-none hover:rotate-90 duration-300" title="ایجاد یادداشت جدید">
              <svg class="stroke-indigo-500 fill-none group-active:duration-0 duration-300" viewBox="0 0 24 24" height="40px" width="40px" xmlns="http://www.w3.org/2000/svg">
                <path stroke-width="1.5" d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"></path>
                <path stroke-width="1.5" d="M8 12H16"></path>
                <path stroke-width="1.5" d="M12 16V8"></path>
              </svg>
            </button>
          </a>
        </div>
    <?php
    }
    ?>

</body>

</html>