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

$page_type = 'notes';
include_once("./includes/header.php");
?>


<body>
    <div class="absolute inset-x-0 top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <main class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="flex items-center justify-between my-10">
            <h1 class="text-3xl moraba"><img src="https://github.com/Tarikul-Islam-Anik/tarikul-islam-anik/raw/main/assets/images/Hourglass%20Done.png" class="h-8 w-8 inline" alt=""> ویرایش يادداشت</h1>
            <form action="" method="post">
                <button name="noteBack" class="relative shadow-lg border-2 rounded-lg border-indigo-800 group w-9 h-9 duration-500 overflow-hidden" type="submit">
                    <p class="font-Manrope mt-0.5 text-3xl h-full w-full flex items-center justify-center text-black duration-500 relative z-10 group-hover:scale-0">
                        ×
                    </p>
                    <span class="absolute w-full h-full bg-indigo-800 rotate-45 group-hover:top-7 duration-500 top-12 left-0"></span>
                    <span class="absolute w-full h-full bg-indigo-800 rotate-45 top-0 group-hover:left-7 duration-500 left-12"></span>
                    <span class="absolute w-full h-full bg-indigo-800 rotate-45 top-0 group-hover:right-7 duration-500 right-12"></span>
                    <span class="absolute w-full h-full bg-indigo-800 rotate-45 group-hover:bottom-7 duration-500 bottom-12 right-0"></span>
                </button>
            </form>
        </div>


        <div class="container mt-5">
            <form action="" method="post">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="text-indigo-800 mb-4">عنوان یادداشت:</label>
                    <input type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2" placeholder="موضوع" name="title" value="<?= $note_user['title'] ?>">
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleFormControlTextarea1" class="form-label">متن:</label> -->
                    <textarea class="text-indigo-800 text-end mt-5" id="editor" name="text"><?= $note_user['text'] ?></textarea>
                </div>

                <button type="submit" name="sub" class="bookmarkBtn shadow-lg bg-gray-50 mb-4">
                    <span class="IconContainer">
                        <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                            <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path>
                        </svg>
                    </span>
                    <p class="text">ویرایش</p>
                </button>

            </form>
        </div>

    </main>

        <?php include_once('./includes/footer.php'); ?>
    <script src="./js/main.js"></script>

</body>

</html>