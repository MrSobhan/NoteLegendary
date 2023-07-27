<?php

session_start();

if($_SESSION['login'] == 'false'|| isset($_SESSION['login']) == false){
    header("Location:http://localhost/php/Notes/home.php");
    exit;
}

$link = mysqli_connect('localhost:3306' , 'root' ,'' , 'notes');


$link->set_charset('utf8');

$qury2 = "SELECT * FROM note";

$result2 = mysqli_query($link , $qury2);

if(isset($_POST['sub'])){
    $title = htmlspecialchars($_POST['title']);
    $text = $_POST['text'];

    $php =  getdate();
    $time =  $php['month'].' '.$php['mday'].' '.$php['year'];

    if($text != '' && $title != ''){
    $idd = $_SESSION['id'];
    $id_top=$_GET['id'];

    $qury="UPDATE `note` SET `uid`='$idd',`title`='$title',`text`='$text' ,`time`='$time' WHERE `id`= $id_top";

    $result = mysqli_query($link , $qury);
    if($result){
        if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
            header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
        }
    }
    }
}

if(isset($_POST['delete'])){
    if($_SESSION['login'] == 'true' && $_SESSION['id'] != ''){
        header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
    }
}

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script >
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    <title>ذخيره متن</title>
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
        .btn-open{
            position: fixed;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: blueviolet;
            color: aliceblue;
            top: 90vh;
            left: 20px;
        }
    </style>
</head>
<body>
<h1 class="text-primary text-center mt-4"><i class="bi bi-chat-left-text"></i> ويرايش يادداشت</h1>
    <div class="container mt-5">
        <form action="" method="post">
            <?php
            while($row = $result2->fetch_assoc()){
                if ($_GET['id'] == $row['id']) {
            ?>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">موضوع متن:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="موضوع" name="title" value="<?php echo $row['title']?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">متن:</label>
                <textarea class="form-control" id="mytextarea" name="text"><?php echo $row['text']?></textarea>
            </div>
            
            <div class="row align-items-center">
            <div class="col-6">
                <button class="btn btn-lg btn-outline-danger" name="delete"><i class="bi bi-x-circle"></i> لغو</button>
                <button class="btn btn-lg btn-outline-primary" name="sub"><i class="bi bi-pen"></i> ويراش</button>
            </div>
            <?php
                if($row['status'] == 1){
            ?>
            <div class="col-6">
                    <div style="color: red; font-size:25px;text-align:end"><i class="bi bi-heart-fill"></i></div>
                </div>
            </div>
            <?php
                    }
                }
            }
            ?>
        </form>
    </div>

    <script>
        $.addEventListener('contextmenu' , (event)=>{
        event.preventDefault()
      })
    </script>
</body>
</html>