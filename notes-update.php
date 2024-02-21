<?php

require_once("./configurations/conn.php");

if (!$isLogin) {
    home();
    exit;
}

// vd($getTime);
// exit;

$id_user = get_session('id');

$queryGetUserNoteUpdate = "SELECT * FROM note WHERE `uid` = '$id_user'";

$note_user = mysqli_query($conn, $queryGetUserNoteUpdate)->fetch_assoc();

// vd($note_user);
// exit;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sub'])) {
        $title = valid($_POST['title']);
        $text = $_POST['text'];

        // $php =  getdate();
        // $time =  $php['month'] . ' ' . $php['mday'] . ' ' . $php['year'];

        if ($text  && $title) {


            $ID_header = get_id_header('id');

            $queryUpdateNotes = "UPDATE `note` SET `title`='$title',`text`='$text' ,`updateAt`='$Today' WHERE `id`= '$ID_header'";

            $result = mysqli_query($conn, $queryUpdateNotes);
            if ($result) {
                Locatoin('notes.php?id=' . get_session('id'));
            }
        }
    }

    if (isset($_POST['noteBack'])) {
        Locatoin('notes.php?id=' . get_session('id'));
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
    <!-- TinyMCE -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js">
    </script>
    <link rel="stylesheet" href="./css/notes.css">
    <script src="./js/main.js" defer></script>
    <title>ذخيره متن</title>
</head>

<body>
    <h1 class="text-primary text-center mt-4"><i class="bi bi-chat-left-text"></i> ويرايش يادداشت</h1>
    <div class="container mt-5">
        <form action="" method="post">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">موضوع متن:</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="موضوع" name="title" value="<?= $note_user['title'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">متن:</label>
                <textarea class="form-control" id="editor" name="text"><?= $note_user['text'] ?></textarea>
            </div>

            <div class="row align-items-center">
                <div class="col-6">
                    <button class="btn btn-lg btn-outline-danger" name="noteBack"><i class="bi bi-x-circle"></i> لغو</button>
                    <button class="btn btn-lg btn-outline-primary" name="sub"><i class="bi bi-pen"></i> ويراش</button>
                </div>
                <?php
                if ($note_user['status'] == 'true') {
                ?>
                    <div class="col-6">
                        <div style="color: red; font-size:25px;text-align:end"><i class="bi bi-heart-fill"></i></div>
                    </div>
                <?php
                }

                ?>
            </div>

        </form>
    </div>

</body>

</html>