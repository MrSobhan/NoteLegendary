<?php

require_once("./configurations/conn.php");

if (!$isLogin) {
    home();
    exit;
}

$id_user = get_session('id');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['sub'])) {
        $title = valid($_POST['title']);
        $text = $_POST['text'];

        if ($text  && $title) {

            $ID = uniqid();
            
            $queryAddNotes = "INSERT INTO `note`(`id`,`uid`, `title`, `text` ) VALUES ('$ID','$id_user','$title','$text')";

            $result = mysqli_query($conn, $queryAddNotes);
            if ($result) {
                Locatoin('notes.php?id='. get_session('id'));
            }
        }else{
            alertErrorInput();
        }
    }

    if (isset($_POST['noteBack'])) {
        Locatoin('notes.php?id='. get_session('id'));
    }
}
$page_type = 'notes';
include_once("./includes/header.php");
?>


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
    <script src="./js/main.js"></script>

</body>

</html>