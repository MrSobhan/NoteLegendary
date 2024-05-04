<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
        },
      },
    };
  </script>

  <meta name="theme-color" content="#3730a3">
  <meta name="description" content="یک دفترچه یادداشت هوشمند و کاربردی و رایگان برای همه با سرعت بالا و نامحدود در هر لحظه و هر جا !">
  <meta name="keywords" content="دفترچه یادداشت هوشمند, Notelegendary , notelegendary, دفترچه یادداشت کاربردی , نوت لجندری, دفترچه یادداشت">
  <meta name="creator" content="Sobhan Musazadeh (MrLegend)">
  <meta name="author" content="Sobhan Musazadeh (MrLegend)">
  <meta name="publisher" content="Notelegendary | نوت لجندری">
  <!-- OpenGraph Tags -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Notelegendary - دفترچه یادداشت هوشمند و نامحدود">
  <meta property="og:description" content="یک دفترچه یادداشت هوشمند و کاربردی و رایگان برای همه با سرعت بالا و نامحدود در هر لحظه و هر جا !">
  <meta property="og:locale" content="fa_IR">
  <meta property="og:image" content="https://notelegendary.liara.run/images/NoteLegendary.png - Normal">
  <meta property="og:url" content="https://notelegendary.liara.run/">
  <meta property="og:site_name" content="NoteLegendary">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Notelegendary">
  <meta name="twitter:description" content="یک دفترچه یادداشت هوشمند و کاربردی و رایگان برای همه با سرعت بالا و نامحدود در هر لحظه و هر جا !">
  <meta name="twitter:image" content="https://notelegendary.liara.run/images/NoteLegendary.png - Normal">
  <meta name="twitter:site" content="@Mrlegend">
  <meta name="twitter:creator" content="@Mrlegend">
  <!-- End OpenGraph Tags -->
  <!-- Robots -->
  <meta name="robots" content="index, follow">
  <!-- End Robots -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->

  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
  <!-- SweetAlert 2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="icon" href="https://notelegendary.liara.run/images/NoteLegendary.png">
  <link rel="stylesheet" href="./css/main.css">

  <link rel="manifest" href="../manifest.json" />


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
    }
  } ?>

  <link rel="icon" type="image/x-icon" href="https://s31.picofile.com/file/8472908600/NoteLegendary.png">
  <title>Note Legendary</title>
</head>