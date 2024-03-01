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
                Locatoin('notes.php?id=' . get_session('id'));
            }
        } else {
            alertErrorInput();
        }
    }

    if (isset($_POST['noteBack'])) {
        Locatoin('notes.php?id=' . get_session('id'));
    }
}
$page_type = 'notes';
include_once("./includes/header.php");
// include_once('./includes/Navbar.php');

?>


<body>
    <div class="absolute inset-x-0 top-20 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <main class="mx-auto max-w-7xl px-6 lg:px-8">
        <h1 class="text-3xl moraba my-10 mx-auto"><img src="https://github.com/Tarikul-Islam-Anik/tarikul-islam-anik/raw/main/assets/images/Hourglass%20Done.png" class="h-8 w-8 inline" alt=""> ايجاد يادداشت</h1>
        <div class="container mt-5">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="text-indigo-800 mb-4">عنوان یادداشت:</label>
                    <input type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2" placeholder="موضوع" name="title">
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleFormControlTextarea1" class="text-indigo-800 mb-4">متن یادداشت:</label> -->
                    <textarea id="editor" name="text" class="text-indigo-800 text-end mt-5" placeholder="...روز اول"></textarea>
                </div>


                <button  type="submit" name="sub" class="bookmarkBtn shadow-lg bg-gray-50">
                    <span class="IconContainer">
                        <svg viewBox="0 0 384 512" height="0.9em" class="icon">
                            <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path>
                        </svg>
                    </span>
                    <p class="text">ذخیره</p>
                </button>

                <!-- <button class="btn btn-lg btn-outline-danger" name="noteBack"><i class="bi bi-x-circle"></i> لغو</button> -->
                <!-- <button type="submit" name="submit" class="flex w-[200px] justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ذخیره</button> -->
            </form>
        </div>
    </main>

    <?php include_once('./includes/footer.php'); ?>
    <script src="./js/main.js"></script>

</body>

</html>