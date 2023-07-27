<?php

session_start();

$php =  getdate();
$time =  $php['month'].' '.$php['mday'].' '.$php['year'];

if($_SESSION['login'] == 'false' || isset($_SESSION['login']) == false){
    header("Location:http://localhost/php/Notes/home.php");
    exit;
}

$link = mysqli_connect('localhost:3306' , 'root' ,'' , 'notes');


$link->set_charset('utf8');

$qury = "SELECT * FROM note";

$result = mysqli_query($link , $qury);

$result2 = mysqli_query($link , $qury);

$result3 = mysqli_query($link , $qury);



if(isset($_GET['class']) != '') {

    $id_remove = $_GET['class'];
    $qury2 = "DELETE FROM note WHERE id=$id_remove";

    $dom = mysqli_query($link , $qury2);

    if($dom){
        if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
        }
    }
}

//hearts

if(isset($_GET['heart1']) != '') {

    $id_heart1 = $_GET['heart1'];
    $qury3 = "UPDATE `note` SET `status`='1' WHERE id=$id_heart1";

    $dom3 = mysqli_query($link , $qury3);

    if($dom3){
        if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
        }
    }
}


if(isset($_GET['heart0']) != '') {

    $id_heart0 = $_GET['heart0'];
    $qury4 = "UPDATE `note` SET `status`='0' WHERE id=$id_heart0";

    $dom4 = mysqli_query($link , $qury4);

    if($dom4){
        if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
        }
    }
}

if(isset($_POST['delete-all'])){
    $qury5 = "DELETE FROM note WHERE uid=" . $_GET['id'];

    $dom5 = mysqli_query($link , $qury5);

    if($dom5){
        if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
        }
    }
}

if(isset($_POST['delete'])){
    header("Location:http://localhost/php/Notes/home.php");
}

if(isset($_POST['sub-chat'])){
    $emailChat = htmlspecialchars($_POST['emailChat']);
    $chat = htmlspecialchars($_POST['chat']);
  
    if(trim($emailChat) != '' && trim($chat) != ''){
      $idd = $_SESSION['id'];
      $qury8 = "INSERT INTO `chats`(`uid`, `email`, `chat`) VALUES ('$idd','$emailChat','$chat')";
  
      $result8 = mysqli_query($link , $qury8);
      if($result8){
          if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
          }
      }
    }else{
      echo  "<script>alert('فيلد ها را كامل كنيد')</script>";
    }
  
  }

$num= 0;
$num1 = 0;
$num2 = 0;
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Notes</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap');
        @font-face {
            font-family: vazir;
            src: url(../fonts/Vazir-Regular.woff) format('woff'),
             url(../fonts/Vazir-Regular.ttf) format('ttf'),
             url(../fonts/Vazir-Regular.woff2) format('woff2'),
             url(../fonts/Vazir-Regular.eot);
        }
        :root{
            --var-them : blue;
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
        .btn-add{
            position: fixed;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: aliceblue;
            top: 90vh;
            left: 20px;
        }
        .btn-exit{
            width: 40px;
            height: 40px;
            position: fixed;
            top: 90vh;
            right: 20px;
            border-radius: 50%;
        }
        .btn-heart{
            border: none;
            background-color: white;
            transition: all .3s;
        }
        .btn-heart:active{
            transform: scale(.7);
        }
        .card{
            margin-top: 60px;
            transition: all .3s;
        }
        .card:hover{
            transform: scale(1.1);
        }
        .div-card-h1{
            margin-top: 20px;
            width: 100px;
            height: 2px;
            background-color: var(--var-them);
        }
        .div-card-h1::before{
            position: absolute;
            content: '';
            background-color: var(--var-them);
            width: 30px;
            height: 7px;
            margin-right: -15px;
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
        #nav{
          z-index: 99999999999999;
        }
    </style>
</head>
<body>
    <nav>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow w-100" id="nav">
            <div class="container">
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
                      <li><button class="dropdown-item text-danger" name="delete">بازگشت</button></li>
                    </ul>
              </div>
              </form>
              <a class="navbar-brand" href="#">Legendary Notes <i class="bi bi-pencil-square"></i></a>
            </div>
          </nav>
    </nav>

    <center>
        <ul class="nav nav-pills nav-fill gap-2 p-1 small rounded-5 shadow bg-primary mt-5" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white); width:350px;">
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-5" id="love-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">علاقهمندي</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-5" id="note-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">يادداشت</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-5" id="now-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">يادداشت امروز</button>
            </li>
        </ul>
    </center>

    <div class="container mt-5" id="note-page" data-aos="zoom-out-up">
        <center>
            <div class="row g-4">
            <?php 
                while($row2 = $result->fetch_assoc()){
                    if ($_GET['id'] == $row2['uid']) {
                        if($row2['status'] == 0){
                ?>
                <div class="col-lg-4">
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title" style="color: var(--var-them);"><?php echo $row2['title']?></h5>
                          <p class="card-text"><?php echo substr($row2['text'] , 0 , 170)?></p>
                          <a href="http://localhost/php/Notes/notes.php?id=<?php echo $_GET['id']?>&class=<?php echo $row2['id']?>" class="btn btn-outline-danger">حذف</a>
                          <a href="http://localhost/php/Notes/notes-update.php?id=<?php echo $row2['id']?>" class="btn btn-outline-primary">ويرايش</a>
                          <div class="div-card-h1"></div>
                          <div class="row mt-4 align-items-center">
                            <div class="col-6">
                            <h6 style="font-family: 'Kdam Thmor Pro', sans-serif; font-size: 13px;"><?php echo $row2['time']?></h6>
                            </div>
                            <div class="col-6">
                            <a href="http://localhost/php/Notes/notes.php?heart1=<?php echo $row2['id']?>"><button  class="btn-heart" style="color: rgba(19, 19, 19, 0.192);"><i class="bi bi-heart-fill"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <?php
                $num++;
                        }else if($row2['status'] == 1){
                ?>
                <div class="col-lg-4">
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title" style="color: var(--var-them);"><?php echo $row2['title']?></h5>
                          <p class="card-text"><?php echo substr($row2['text'] , 0 , 170)?></p>
                          <a href="http://localhost/php/Notes/notes.php?id=<?php echo $_GET['id']?>&class=<?php echo $row2['id']?>" class="btn btn-outline-danger">حذف</a>
                          <a href="http://localhost/php/Notes/notes-update.php?id=<?php echo $row2['id']?>" class="btn btn-outline-primary">ويرايش</a>
                          <div class="div-card-h1"></div>
                          <div class="row mt-4 align-items-center">
                            <div class="col-6">
                            <h6 style="font-family: 'Kdam Thmor Pro', sans-serif;font-size: 13px;"><?php echo $row2['time']?></h6>
                            </div>
                            <div class="col-6">
                            <a href="http://localhost/php/Notes/notes.php?heart0=<?php echo $row2['id']?>"><button  class="btn-heart" style="color: red;"><i class="bi bi-heart-fill"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <?php
                $num++;
                        }
                    }
                }
                ?>
            </div>
        </center>
        <?php
        if($num != 0){
        ?>
        <div class="row align-items-center">
            <div class="col-6">
                <div class="badge bg-primary text-light fs-5 mt-5 ms-5"><i class="bi bi-award-fill"></i> تعداد نوشته :<?php echo $num?></div>
            </div>
            <div class="col-6">
                <form action="" method="post">
                    <button class="btn btn-danger fs-7 float-end mt-5 me-5" name="delete-all"><i class="bi bi-trash3-fill"></i> حذف همه</button>
                </form>
            </div>
        </div>
        <?php
        }else{
        ?>
        <div class="alert alert-danger" role="alert">
            يادداشتي وجود ندارد.
        </div>
        <?php
        }
        ?>
    </div>

    <div class="container mt-5" id="love-page" hidden>
        <center>
            <div class="row g-4">
            <?php 
                while($row = $result2->fetch_assoc()){
                    if ($_GET['id'] == $row['uid']) {
                        if($row['status'] == 1){
                ?>
                <div class="col-lg-4">
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title" style="color: var(--var-them);"><?php echo $row['title']?></h5>
                          <p class="card-text"><?php echo substr($row['text'] , 0 , 170)?></p>
                          <a href="http://localhost/php/Notes/notes.php?id=<?php echo $_GET['id']?>&class=<?php echo $row['id']?>" class="btn btn-outline-danger">حذف</a>
                          <a href="http://localhost/php/Notes/notes-update.php?id=<?php echo $row['id']?>" class="btn btn-outline-primary">ويرايش</a>
                          <div class="div-card-h1"></div>
                          <div class="row mt-4 align-items-center">
                            <div class="col-6">
                            <h6 style="font-family: 'Kdam Thmor Pro', sans-serif; font-size: 13px;"><?php echo $row['time']?></h6>
                            </div>
                            <div class="col-6">
                            <a href="http://localhost/php/Notes/notes.php?heart1=<?php echo $row['id']?>"><button  class="btn-heart" style="color: red;"><i class="bi bi-heart-fill"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <?php
                $num1++;
                        }
                    }
                }
                ?>
            </div>
        </center>
        <?php
        if($num1 != 0){
        ?>
        <div class="row align-items-center">
            <div class="col-6">
                <div class="badge bg-primary text-light fs-5 mt-5 ms-5"><i class="bi bi-award-fill"></i> تعداد نوشته :<?php echo $num1?></div>
            </div>
            <div class="col-6">
                <form action="" method="post">
                    <button class="btn btn-danger fs-7 float-end mt-5 me-5" name="delete-all"><i class="bi bi-trash3-fill"></i> حذف همه</button>
                </form>
            </div>
        </div>
        <?php
        }else{
        ?>
        <div class="alert alert-danger" role="alert">
            يادداشتي وجود ندارد.
        </div>
        <?php
        }
        ?>
    </div>

    <div class="container mt-5" id="now-page" hidden>
        <center>
            <div class="row g-4">
            <?php 
                while($row = $result3->fetch_assoc()){
                    if ($_GET['id'] == $row['uid']) {
                        if($row['time'] == $time){
                            if($row['status'] == 0){
                ?>
                <div class="col-lg-4">
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title" style="color: var(--var-them);"><?php echo $row['title']?></h5>
                          <p class="card-text"><?php echo substr($row['text'] , 0 ,170)?></p>
                          <a href="http://localhost/php/Notes/notes.php?id=<?php echo $_GET['id']?>&class=<?php echo $row['id']?>" class="btn btn-outline-danger">حذف</a>
                          <a href="http://localhost/php/Notes/notes-update.php?id=<?php echo $row['id']?>" class="btn btn-outline-primary">ويرايش</a>
                          <div class="div-card-h1"></div>
                          <div class="row mt-4 align-items-center">
                            <div class="col-6">
                            <h6 style="font-family: 'Kdam Thmor Pro', sans-serif; font-size: 13px;"><?php echo $row['time']?></h6>
                            </div>
                            <div class="col-6">
                            <a href="http://localhost/php/Notes/notes.php?heart1=<?php echo $row['id']?>"><button  class="btn-heart" style="color: rgba(19, 19, 19, 0.192);"><i class="bi bi-heart-fill"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <?php
                $num2++;
                            }else if($row['status'] == 1){
                   
                ?>
                <div class="col-lg-4">
                    <div class="card shadow" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title" style="color: var(--var-them);"><?php echo $row['title']?></h5>
                          <p class="card-text"><?php echo substr($row['text'] , 0 , 170)?></p>
                          <a href="http://localhost/php/Notes/notes.php?id=<?php echo $_GET['id']?>&class=<?php echo $row['id']?>" class="btn btn-outline-danger">حذف</a>
                          <a href="http://localhost/php/Notes/notes-update.php?id=<?php echo $row['id']?>" class="btn btn-outline-primary">ويرايش</a>
                          <div class="div-card-h1"></div>
                          <div class="row mt-4 align-items-center">
                            <div class="col-6">
                            <h6 style="font-family: 'Kdam Thmor Pro', sans-serif; font-size: 13px;"><?php echo $row['time']?></h6>
                            </div>
                            <div class="col-6">
                            <a href="http://localhost/php/Notes/notes.php?heart1=<?php echo $row['id']?>"><button  class="btn-heart" style="color: red;"><i class="bi bi-heart-fill"></i></button></a>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <?php
                $num2++;
                        }
                    }
                }
            }
                ?>
            </div>
        </center>
        <?php
        if($num2 != 0){
        ?>
        <div class="row align-items-center">
            <div class="col-6">
                <div class="badge bg-primary text-light fs-5 mt-5 ms-5"><i class="bi bi-award-fill"></i> تعداد نوشته :<?php echo $num2?></div>
            </div>
            <div class="col-6">
                <form action="" method="post">
                    <button class="btn btn-danger fs-7 float-end mt-5 me-5" name="delete-all"><i class="bi bi-trash3-fill"></i> حذف همه</button>
                </form>
            </div>
        </div>
        <?php
        }else{
        ?>
        <div class="alert alert-primary" role="alert">
            امروز يادداشتي نداشتيد.
        </div>
        <?php
        }
        ?>
    </div>

    <div class="container mt-5" data-aos="zoom-out-up">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <center><img src="https://img.freepik.com/premium-vector/programmer-working-concept-isolated-creation-development-software-programs-people-scene-flat-cartoon-design-vector-illustration-blogging-website-mobile-app-promotional-materials_9209-6543.jpg" alt="" class="img-fluid"></center>
            </div>
            <div class="col-lg-6 text-center">
                <center><input type="color" class="form-control form-control-color bg-light shadow" id="exampleColorInput" value="#563d7c" title="Choose your color"></center>
                <button class="btn btn-outline-info mt-4" id="btn-them"><i class="bi bi-brush-fill"></i> اعمال تم </button>
            </div>
        </div>
    </div>
    
    <section data-aos="fade-up">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-6 p-4">
            <form action="" class="form" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">ايميل:</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="emailChat">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">توضيحات:</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="chat"></textarea>
            </div>
            <button class="btn btn-lg btn-primary" name="sub-chat">ارسال <i class="bi bi-send-fill"></i></button>
            </form>
          </div>
          <div class="col-lg-6">
            <img src="https://img.freepik.com/free-vector/programmer-concept-illustration_114360-2417.jpg" alt="Not Dwon" class="img-fluid w-100" style="border-radius: 20px; height: 400px;">
            <div class="row">
              <div class="col-lg-6">
                <center>
                  <div class="card shadow bg-light mt-4" style="width: 15rem;">
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
            <h2 class="fs-4">Mr.Legend <img src="https://farsgraphic.com/wp-content/uploads/2018/07/1-1-1.png" alt="" style="width: 20px; height: 20px;"></h2>
          </div>
        </div>
        <h6 class="text-center mt-5">Create by 💙 Mr.Legend 2023 &copy;</h6>
      </div>
    </section>
   
    <a href="http://localhost/php/Notes/notes-add.php"><button class="btn btn-add btn-primary"><i class="bi bi-pencil-square"></i></button></a>
    <a href="http://localhost/php/Notes/home.php"><span class="badge bg-danger text-light fs-5 btn-exit"><i class="bi bi-house-fill" style="margin-right: -2px;"></i></span></a>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
        var $ = document , _id = id => $.getElementById(id);

        _id('note-tab2').addEventListener('click' , ()=>{
            _id('note-page').hidden = false;
            _id('love-page').hidden = true;
            _id('now-page').hidden = true;
        })

        _id('love-tab2').addEventListener('click' , ()=>{
            _id('note-page').hidden = true;
            _id('now-page').hidden = true;
            _id('love-page').hidden = false;
        })

        _id('now-tab2').addEventListener('click' , ()=>{
            _id('note-page').hidden = true;
            _id('now-page').hidden = false;
            _id('love-page').hidden = true;
        })

        _id('btn-them').addEventListener('click' , ()=>{
            var ithem = _id('exampleColorInput').value;
            $.documentElement.style.setProperty('--var-them' , ithem);
        })

        setInterval(() => {
        if($.documentElement.scrollTop <= 12){
          _id('nav').style.position = 'relative';
        }else{
          _id('nav').style.position = 'fixed';
          _id('nav').style.top = '0px';
        }
        });

        $.addEventListener('contextmenu' , (event)=>{
        event.preventDefault()
      })

      AOS.init();
    </script>
</body>
</html>