<?php

session_start();


$link = mysqli_connect('localhost:3306' , 'root' ,'' , 'notes');


$link->set_charset('utf8');

$qury2 = "SELECT * FROM chats";

$result2 = mysqli_query($link , $qury2);


if(isset($_POST['go'])){
    if(isset($_SESSION['login']) == true){
      if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
        header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
    }
    }
}

if(isset($_POST['exit'])){
    $_SESSION['login'] = 'false';
}


if(isset($_POST['sub-chat'])){
  $emailChat = htmlspecialchars($_POST['emailChat']);
  $chat = htmlspecialchars($_POST['chat']);

  if(trim($emailChat) != '' && trim($chat) != ''){
    $idd = $_SESSION['id'];
    $qury = "INSERT INTO `chats`(`uid`, `email`, `chat`) VALUES ('$idd','$emailChat','$chat')";

    $result = mysqli_query($link , $qury);
    if($result){
        if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/home.php");
        }
    }
  }else{
    echo  "<script>alert('فيلد ها را كامل كنيد')</script>";
  }

}

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLxYvmYo9rTuvkLR1C05WwbQ5u443pJrzR__kXSV7vVSAmGY_eJN_KfwxnkixbkYFOdb8&usqp=CAU">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Legendary Notes</title>
    <style>
        @font-face {
            font-family: vazir;
            src: url(../fonts/Vazir-Regular.woff) format('woff'),
             url(../fonts/Vazir-Regular.ttf) format('ttf'),
             url(../fonts/Vazir-Regular.woff2) format('woff2'),
             url(../fonts/Vazir-Regular.eot);
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: vazir;
        }
        body{
            overflow-x: hidden;
        }
        ::-webkit-scrollbar{
            width: 13px;
        }
        ::-webkit-scrollbar-thumb{
            background-color: blue;
            border-radius: 10px;
        }
        .sec-1{
            background-image: url(https://s26.picofile.com/d/8458068600/cc045ccb-3b8d-438b-831a-93f44d1d91ef/wave.svg);
            background-repeat: no-repeat;
            background-position: bottom;
        }
        .sec-card{
          background: rgba(186, 226, 245, 0.432);
          border: none;
        }
        .card-sec1{
          background-color: rgba(255, 255, 255, 0.884);
          transition: all .7s;
          padding: 15px;
        }
        .card-sec1:hover{
          transform: scale(1.1);
        }
        .card-img-top{
          margin-top: -60px;
        }
        .hr-card{
          width: 100px;
          height: 2px;
        }
        .footer{
          background-color: rgba(186, 226, 245, 0.432);
          padding: 20px;
          font-size: 30px;
        }
        .btn-footer{
          width: 40px;
          height: 40px;
          border-radius: 20px 10px 20px 10px;
          transition: all .3s;
        }
        .btn-footer:active{
          transform: scale(.7) rotate(30deg);
        }
        .col-chats{
          padding: 10px;
          border: 5px dashed rgba(186, 226, 245, 0.432);
          transition: all .8s;
        }
        .col-chats:hover{
          transform: scale(.9);
        }
        #nav{
          z-index: 99999999999999;
        }
        .all{
            width: 50px;
            height: 50px;
            margin: 100px auto;
            margin-top: 200px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            animation: loded 1.4s linear infinite;
        }
        .for{
            margin-left: 5px;
            margin-top: 5px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }
        @keyframes loded{
            0%{
                transform: scale(.6) rotate(0deg);
            }
            50%{
                transform: scale(1.6) rotate(182.5deg);
            }
            100%{
                transform: scale(.6) rotate(365deg);
            }
        }
        .div1{
            background-color: rgb(97, 97, 206);
        }
        .div2{
            background-color: blue;
        }
    </style>
</head>
<body>
    <section id="page00">
        <div class="all">
            <div class="div1 for"></div>
            <div class="div2 for"></div>
            <div class="div2 for"></div>
            <div class="div2 for"></div>
        </div>
    </section>

    <section id="page01" hidden>
    <nav>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow w-100" id="nav">
            <div class="container">
              <?php
              if(isset($_SESSION['login']) == false || $_SESSION['login'] == 'false'){
                
              ?>
              <div>
              <button class="btn" ><a href="http://localhost/php/Notes/singup.php" class="text-dark" style="text-decoration: none;"><i class="bi bi-pen-fill"></i> ثبت نام</a></button>
              <button class="btn btn-primary"><a href="http://localhost/php/Notes/login.php" class="text-light" style="text-decoration: none;"><i class="bi bi-person-fill"></i> ورود</a></button>
              </div>
              <?php
              }else{
              ?>
              <form method="post">
              <div class="dropdown">
                <?php
                if(isset($_SESSION['uname'])){
                ?>
                    <a class="dropdown-toggle text-dark" style="text-decoration: none;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['uname'];?></a>
                <?php
                }
                ?>    
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="http://localhost/php/Notes/panel-users.php?id=<?php echo $_SESSION['id'];?>">پنل كاربري</a></li>
                      <li><button class="dropdown-item" name="go">يادداشت ها</button></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><button class="dropdown-item text-danger" name="exit">خروج</button></li>
                    </ul>
              </div>
              </form>
              <?php
              }
              ?>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">صفحه اصلي</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#p1">ويژگي ها</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#p2">سوالات مهم</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#p3">نظرات</a>
                  </li>
                </ul>
              </div>
              <a class="navbar-brand fs-6" href="#">Legendary Notes <i class="bi bi-pencil-square"></i></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
    </nav>
    
    <section>
        <div class="container-fluid sec-1" style="margin-top: 100px;margin-bottom:150px;">
            <div class="row justify-content-center align-items-start">
                <div class="col-lg-6">
                    <center>
                    <h1 id="app" class="text-primary">يادداشت آنلاين</h1>
                    <h3 class="mt-3 h5 text-muted">يادداشت هاي زيبا و محيطي امن با قابليت هاي فراوان!</h3>
                    <form action="" method="post"><button class="btn btn-lg btn-primary mt-5" name="go">بزن بريم!</button></form>
                    <div class="mt-4"><i class="bi bi-arrow-down-circle-fill fs-2 text-light d-lg-block d-none"></i></div>
                    </center>
                </div>
                <div class="col-lg-6">
                    <center><img src="https://raman01.ir/wp-content/uploads/2020/08/raman01.ir_-1.png" alt="" class="img-fluid"></center>
                </div>
            </div>
        </div>
    </section>

    <section  data-aos="flip-down">
      <div class="container mt-5 mb-5" id="p1">
          <div class="row justify-content-center align-items-center g-0">
            <div class="col-lg-6 p-5" style="background: rgba(186, 226, 245, 0.432);">
              <h3 class="text-primary"><i class="bi bi-card-checklist"></i> دفترچه ي يادداشت هوشمند</h3>
              <h6 class="text-muted mt-4" style="line-height: 25px;">هميشه تو زندگيمون به اين موضوع بر خورديم كه مثلا به دليل مشغله هاي كاري در طول روز پيش مياد كه بخواهيم چيزي رو يادداشت كنيم و ممكنه در اون لحظه قلم كاغذي كه بتوانيم با آن بنويسيم نداشته باشيم . امروزه با پيشرفت روز افزون تكنولوژي در عرصه هاي مختلف همه ي ماها حداقل يك تلفن همراه را داريم كه با كمك آن كار هاي روز مره خود را انجام ميدهيم حال با كمك اين وبسايت به صورت كاملا رايگان و با داشتن تلفن هوشمند ديگر نيازي به استفاده از قلم و كاغذ نيست!</h6>
            </div>
            <div class="col-lg-6">
              <img src="https://files.virgool.io/upload/users/298113/posts/alwxkye1k5vf/6airntzpplo0.jpeg" alt="" class="img-fluid">
            </div>
          </div>
      </div>
    </section>

    <div data-aos="zoom-in">
    <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C263.82,205.76 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgba(186, 226, 245, 0.432);"></path></svg></div>
    <section>
      <div class="container-fluid sec-card mt-4">
        <center>
          <div class="row g-4">
            <div class="col-lg-4 mt-5">
              <div class="card shadow card-sec1" style="width: 18rem;">
                <img src="https://techfars.com/wp-content/uploads/2022/12/tech-gh-pg.jpg" class="card-img-top" alt="...">
                <div class="card-body text center">
                  <h5 class="card-title text-primary">اديتور هوشمند</h5>
                  <p class="card-text text-muted">اين وبسايت با بهره گيري از تكنولوژي روز دنيا يك اديتور كامل و جذاب را براي نوشته هاي شما فراهم مي كند.</p>
                  <div class="hr-card bg-primary"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-5">
              <div class="card shadow card-sec1" style="width: 18rem;">
                <img src="https://www.iraniancyber.com/wp-content/uploads/2022/01/%D8%A2%D9%85%D9%88%D8%B2%D8%B4-%D8%B1%D8%A7%DB%8C%DA%AF%D8%A7%D9%86-%D8%A8%D8%B1%D9%86%D8%A7%D9%85%D9%87-%D9%86%D9%88%DB%8C%D8%B3%DB%8C-%D8%A7%D8%B2-%D8%B5%D9%81%D8%B1.jpg" class="card-img-top" alt="...">
                <div class="card-body text center">
                  <h5 class="card-title text-primary">امنيت كامل</h5>
                  <p class="card-text text-muted">در اينجا تمامي اطلاعات شما محفوظ است و نوشته هاي شما امنيتي كامل را در اختيار دارد.</p>
                  <div class="hr-card bg-primary"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-5">
              <div class="card shadow card-sec1" style="width: 18rem;">
                <img src="https://files.virgool.io/upload/users/1462351/posts/wg9rklqv3xes/b24q1fcdupkd.png" class="card-img-top" alt="...">
                <div class="card-body text center">
                  <h5 class="card-title text-primary">دسترسي راحت در لحظه</h5>
                  <p class="card-text text-muted">در اين وبسايت شما دسترسي كامل رايگان در هر زمان و مكاني به نوشته هايتان داريد.</p>
                  <div class="hr-card bg-primary"></div>
                </div>
              </div>
            </div>
          </div>
        </center>
      </div>
    </section>
    <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C191.59,193.92 271.49,-49.99 500.00,49.99 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: rgba(186, 226, 245, 0.432);"></path></svg></div>
    </div>

    <section data-aos="zoom-in-up">
      <div class="container mt-5">
        <center>
        <div class="row g-4">
          <div class="col-lg-4">

            <div class="card shadow sec-card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-center"><i class="bi bi-check2-square"></i> امنيت قوي</h5>
              </div>
            </div>

          </div>
          <div class="col-lg-4">

            <div class="card shadow sec-card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-center"><i class="bi bi-clipboard2-data"></i> دسترسي آسان</h5>
              </div>
            </div>

          </div>
          <div class="col-lg-4">

            <div class="card shadow sec-card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-center"><i class="bi bi-alarm-fill"></i> نامحدود و رايگان</h5>
              </div>
            </div>

          </div>
        </div>
        </center>
      </div>
    </section>

    <section data-aos="zoom-in-down">
      <div class="container mt-5 p-5" id="p2">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        هدف از خلق اين وبسايت چه بود؟
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body px-5">
                ما توانستيم بعد از سال ها تلاش كوشش وبا تشخيص نياز برخي مردم يك وبسايتي را براي شما عزيزان به نمايش بگذاريم كه نيازي حقيقي شما را برطرف كند و بتواند راه كار خوبي براي استفاده نكردن از كاغذ و دسترسي راحت تر نسبت به آن باشد تا مردم بتوانند با خيال راحت تر و به صورت كاملا رايگان نوشته ها و يادداشت هاي خود را بنويسند و از اين وبسايت استفاده كنند.
          </div>
        </div>
      </div>
      <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              آيا نوشته هاي ما از امنيت كامل برخوردار است؟
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
          <div class="accordion-body px-5">
            براي پاسخ به اين سوال بايد بگوييم بله! اين وبسايت با بهره گيري كامل و دقيق از تكنولوژي روز دنيا در صنعت برنامه نويسي توانسته اعتماد تعداد زيادي از كاربران خود را جلب كند و هدف اصلي يادداشت افسانه اي بالا بردن امنيت اطلاعات و يادداشت هاي كاربرانش بوده و خواهد بود همچنين در اين راستا تلاش هاي بسيار زيادي نموده .
          </div>
        </div>
      </div>
      <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  اين وبسايت چه برتري نسبت به رقبا دارد؟
          </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body px-5">
                اين وبسايت با وجود امنيت كامل طبق هدفش و همچنين دسترسي كامل و رايگان در تمامي ساعات شبانه روز و مجهز بودن به اديتور نوشته توانسته اعتماد بيشتر كاربرانش را جلب كند.
            </div>
        </div>
      </div>
      <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-heading">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse" aria-expanded="false" aria-controls="panelsStayOpen-collapse">
                  آيا امكان ارتباط با سازندگان سايت وجود دارد؟
                </button>
            </h2>
        <div id="panelsStayOpen-collapse" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading">
            <div class="accordion-body px-5">
                شما در اين وبسايت با وجود امكانات زياد ميتوانيد پس از ورود در آن نظرات  و مشكلات خود را با ما مطرح كنيد همچنين با وجود راه هاي ارتباطي نيز ميتوانيد با ما در ارتباط باشيد منتظر نظرات شما عزيزان هستيم! 
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>

    <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C263.82,205.76 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgba(186, 226, 245, 0.432);"></path></svg></div>
    <section data-aos="zoom-out-up">
      <div class="container-fluid sec-card" id="p3">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-6 p-4">
              <?php
              if(isset($_SESSION['login']) == false || $_SESSION['login'] == 'false'){
              ?>
              <center>
              <h1 class="text-primary fs-2">نظرات</h1>
              <h4 class="fs-5 text-danger">ابتدا براي ثبت نظر بايد وارد شويد.</h4>
              <button class="btn btn-primary btn-lg"><a href="http://localhost/php/Notes/login.php" class="text-light" style="text-decoration: none;"><i class="bi bi-person-fill"></i> ورود</a></button>
              </center>
              <?php
              }else{
              ?>
              <form action="" class="form" method="post">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">ايميل:</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="emailChat">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">توضيحات:</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="chat"></textarea>
                </div>
                <button class="btn btn-lg btn-outline-primary" name="sub-chat">ارسال <i class="bi bi-send-fill"></i></button>
              </form>
              <?php
              }
              ?>
          </div>
          <div class="col-lg-6">
            <img src="https://img.freepik.com/free-vector/programmer-concept-illustration_114360-2417.jpg" alt="Not Dwon" class="img-fluid w-100" style="border-radius: 20px; height: 400px;">
            <div class="row align-items-center">
              <div class="col-lg-6">
                  <center>
                  <div class="card shadow bg-light mt-4" style="width: 16rem;">
                    <div class="card-body" style="border: none;">
                      <h5 class="card-title text-primary"><i class="bi bi-telephone-fill"></i> تماس با ما</h5>
                      <p class="card-text text-muted">98-92223111258+</p>
                    </div>
                  </div>
                  </center>
              </div>
              <div class="col-lg-6">
                  <center>
                  <div class="card shadow bg-light mt-4" style="width: 18rem;">
                    <div class="card-body" style="border: none;">
                      <h5 class="card-title text-primary"><i class="bi bi-envelope-fill"></i> ايميل</h5>
                      <p class="card-text text-muted">sobhanmosazadeh85@yahoo.com</p>
                    </div>
                  </div>
                  </center>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C191.59,193.92 271.49,-49.99 500.00,49.99 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: rgba(186, 226, 245, 0.432);"></path></svg></div>

    <section data-aos="zoom-in">
      <div class="container mt-5 mb-3">
        <div class="row g-4">
        <?php
          while($row3 = $result2->fetch_assoc()){
          if($row3['status'] == 1){
        ?>
          <div class="col-12">
            <div class="card col-chats w-100 shadow">
              <div class="card-body">
                <h5 class="card-title text-primary"><i class="bi bi-person-circle"></i> <?php echo $row3['email'];?></h5>
                <p class="card-text text-muted mt-3"><?php echo $row3['chat'];?></p>
              </div>
            </div>
          </div>
          <?php
          }
        }
        ?>
        </div>
      </div>
    </section>

    <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C263.82,205.76 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgba(186, 226, 245, 0.432);"></path></svg></div>
    <section>
      <div class="container-fluid footer">
        <div class="row align-items-center justify-content-center g-4">
          <div class="col-lg-6">
            <center>
              <h1 class="fs-5 text-muted">يادداشت افسانه اي با اطمينان كنار شماست.</h1>
            <button class="btn  btn-footer text-light bg-primary"><i class="bi bi-github"></i></button>
            <button class="btn  btn-footer text-light bg-primary"><i class="bi bi-telegram"></i></button>
            <button class="btn  btn-footer text-light bg-primary"><i class="bi bi-envelope-fill"></i></button>
            <button class="btn  btn-footer text-light bg-primary"><i class="bi bi-whatsapp"></i></button>
            </center>
          </div>
          <div class="col-lg-6 text-center">
            <a href="http://mrlegend.gigfa.com" class="text-dark " style="text-decoration: none;"><h2 class="fs-4">Mr.Legend <img src="https://farsgraphic.com/wp-content/uploads/2018/07/1-1-1.png" alt="" style="width: 20px; height: 20px;"></h2></a>
          </div>
        </div>
        <h6 class="text-center mt-5">Create by 💙 Mr.Legend 2023 &copy;</h6>
      </div>
    </section>
    </section>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
      var $ = document;
      var app = $.getElementById('app');

      var typewriter = new Typewriter(app, {
        loop: true,
        delay: 75,
      });
      
      typewriter
      .pauseFor(2500)
      .typeString('نوشته')
      .pauseFor(300)
      .deleteChars(10)
      .typeString('يادداشت')
      .deleteChars(17)
      .typeString('يادداشت هاي افسانه اي')
      .pauseFor(1000)
      .start();


      setInterval(() => {
        if($.documentElement.scrollTop <= 12){
          $.getElementById('nav').style.position = 'relative';
        }else{
          $.getElementById('nav').style.position = 'fixed';
          $.getElementById('nav').style.top = '0px';
        }
      });

      $.addEventListener('DOMContentLoaded' , ()=>{
            $.getElementById('page00').hidden=true;
            $.getElementById('page01').hidden=false;
      })

      $.addEventListener('contextmenu' , (event)=>{
        event.preventDefault()
      })

      AOS.init();
    </script>
</body>
</html>