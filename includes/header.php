<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLxYvmYo9rTuvkLR1C05WwbQ5u443pJrzR__kXSV7vVSAmGY_eJN_KfwxnkixbkYFOdb8&usqp=CAU">
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->

  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
  <!-- SweetAlert 2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/tailwind.config.js"></script>

  <link rel="stylesheet" href="./css/main.css">

  <?php if (isset($page_type)) {
    if ($page_type == "home") {
  ?>
      <link rel="stylesheet" href="./css/home.css">
    <?php
    } elseif ($page_type == "login") { ?>
    <link rel="stylesheet" href="./css/login.css">
  <?php
  } elseif ($page_type == "notes") { ?>
    <link rel="stylesheet" href="./css/notes.css">
  <?php
  } elseif ($page_type == "panel") { ?>
    <link rel="stylesheet" href="./css/panel-user.css">
  <?php
  } }?>


  <title>SobhanDev</title>
</head>