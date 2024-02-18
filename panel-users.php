<?php

require_once("./configurations/conn.php");

if($isLogin){
    home();
    exit;
}



$quryGetUsers = "SELECT * FROM users";

$allUsers = mysqli_query($conn, $quryGetUsers);


$id_top = $_GET['id'];

$qury4 = "SELECT * FROM users WHERE `id` = $id_top";

$result4 = mysqli_query($link , $qury4);

$row4 = $result4->fetch_assoc();


$qury3 = "SELECT * FROM chats";

$result3 = mysqli_query($link , $qury3);


if(isset($_POST['sub'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $pass = htmlspecialchars($_POST['pass']);


    $_SESSION['uname'] = $name;

    $id_top=$_GET['id'];

    $qury="UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone' ,`password`='$pass' WHERE `id`= $id_top";

    $result = mysqli_query($link , $qury);
    if($result){
        if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/home.php");
        }
    }
    
}

if(isset($_POST['delete'])){
    header("Location:http://localhost/php/Notes/home.php");
}

if(isset($_POST['go'])){
    if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
        header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
    }
}

//for btn remove chats
if(isset($_GET['del']) != '') {

  $id_remove = $_GET['del'];
  $qury6 = "DELETE FROM chats WHERE id=$id_remove";

  $dom = mysqli_query($link , $qury6);

  if($dom){
    header("Location:http://localhost/php/Notes/panel-users.php?id=" . $_SESSION['id']);
  }
}

//for btn ok status chats
if(isset($_GET['sta']) != '') {

  $id_update = $_GET['sta'];
  $qury9 = "UPDATE `chats` SET `status`='1' WHERE id= $id_update";

  $dom2 = mysqli_query($link , $qury9);

  if($dom2){
    header("Location:http://localhost/php/Notes/panel-users.php?id=" . $_SESSION['id']);
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
    <title>Panel / <?php echo $_SESSION['uname'];?></title>
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
                      <li><a class="dropdown-item" href="#">پنل كاربري</a></li>
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

    <section>
        <div class="container mt-5">
            <form action="" method="post">
                <?php
                while($row = $result2->fetch_assoc()){
                    if ($_GET['id'] == $row['id']) {
                ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">نام شما:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="سبحان"  value="<?php echo $row['name']?>" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ايميل شما:</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Sobhan@gmail.com"  value="<?php echo $row['email']?>" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">شماره تلفن شما:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="09128422739"  value="<?php echo $row['phone']?>" name="phone">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">رمز ورود:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ABCD...."  value="<?php echo $row['password']?>" name="pass">
                </div>
                
                <div class="row align-items-center mt-4">
                <div class="col">
                <button class="btn btn-lg btn-outline-danger" name="delete"><i class="bi bi-x-circle"></i> لغو</button>
                    <button class="btn btn-lg btn-outline-primary" name="sub"><i class="bi bi-pen"></i> ويراش</button>
                </div>
                <?php
                    }
                }
                ?>
            </form>
        </div>
    </section>

    <section>
      <?php
      if($row4['phone'] == '09222311258' && $row4['password'] == '1234' && $row4['name'] == 'سبحان موسي زاده'){
      ?>
      <h1 class="text-center text-primary mt-5">:) Hello Admin</h1>
        <div class="container-fluid mt-5">
        <table class="table table-responsiv border table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>ايميل</th>
                        <th>گفت و گو</th>
                        <th>وضعيت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row3 = $result3->fetch_assoc()){
                      if($row3['status'] == 0){
                    ?>
                    <tr>
                        <td><?php echo $row3['id']?></td>
                        <td><?php echo $row3['email']?></td>
                        <td><?php echo $row3['chat']?></td>
                        <td>
                          <a href="http://localhost/php/Notes/panel-users.php?id=<?php echo $_SESSION['id'];?>&del=<?php echo $row3['id']?>"><button class="btn btn-outline-danger fs-5 "><i class="bi bi-x-circle"></i></button></a>
                          <a href="http://localhost/php/Notes/panel-users.php?id=<?php echo $_SESSION['id'];?>&sta=<?php echo $row3['id']?>"><button class="btn btn-outline-success  fs-5 "><i class="bi bi-bookmark-check"></i></button></a>  
                        </td>
                    </tr>

                    <?php
                      }
                    }
                    ?>
                </tbody>
            </table>
        </div>
      <?php
      }
      ?>  
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        var $ = document , _id = id => $.getElementById(id);

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
    </script>
</body>
</html>