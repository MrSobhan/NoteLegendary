<?php

require_once("./configurations/conn.php");

if (!$isLogin) {
    home();
    exit;
}

$id_user = get_session('id');

function noteBackPage(){
    global $id_user;
    Locatoin('notes.php?id='. $id_user);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['sub'])) {
        $title = valid($_POST['title']);
        $text = $_POST['text'];

        if ($text  && $title) {

            $ID = uniqid();
            
            $queryAddNotes = "INSERT INTO `note`(`id`,`uid`, `title`, `text` ) VALUES ('$ID','$id_user','$title','$text')";

            $result = mysqli_query($conn, $queryAddNotes);
            if ($result) {
                noteBackPage();
            }
        }else{
            alertErrorInput();
        }
    }

    if (isset($_POST['noteBack'])) {
        noteBackPage();
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- TinyMCE -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js">
    </script>
    <link rel="stylesheet" href="./css/notes.css">
    <script src="./js/main.js" defer></script>
    <title>ذخيره متن</title>
</head>

<body>
    <h1 class="text-primary text-center mt-4"><i class="bi bi-chat-left-text"></i> ايجاد يادداشت</h1>
    <div class="container mt-5">
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">موضوع متن:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="موضوع" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">متن:</label>
                <textarea id="editor" name="text" placeholder="...روز اول"></textarea>
            </div>
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-lg btn-outline-danger" name="noteBack"><i class="bi bi-x-circle"></i> لغو</button>
                    <button class="btn btn-lg btn-outline-success" name="sub"><i class="bi bi-bookmark-plus-fill"></i> ذخيره</button>
                </div>
            </div>
        </form>
    </div>

    <?php include_once('./includes/footer.php'); ?>


</body>

</html>