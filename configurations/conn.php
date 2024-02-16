<?php
// $hostname = "localhost";
// $username = "";
// $password = "";
// $database = "";
// $conn = mysqli_connect( $hostname , $username , $password ); // For Host

echo "loded...";

$conn = mysqli_connect("localhost", "root", null, 'notes');
if ($conn) {
    $conn->set_charset("utf8");
    $DOCROOT = $_SERVER['DOCUMENT_ROOT'];
    mysqli_multi_query($conn, file_get_contents("$DOCROOT/php/NoteLegendary/db/db.sql"));
    while (mysqli_next_result($conn));
}else{
    exit();
}

session_start();

$isLogin = isset($_SESSION['login']) && $_SESSION['login'] == 'true' && $_SESSION['id'] != null;


if (isset($_POST['go'])) {
    if ($isLogin) {
        header("Location:http://localhost/php/Notes/notes.php?id=" . $_SESSION['id']);
    }
}

if (isset($_POST['exit'])) {
    $_SESSION['login'] = 'false';
}

//Helper Func


function valid($e)
{
    $e = htmlspecialchars($e);
    return trim($e);
}

function vd($e)
{
    echo "<pre>";
    var_dump($e);
    echo "</pre>";
}


function pas_hash($e)
{
    return password_hash($e, null, $options = []);
}

function home()
{
    header("Location: /");
}

function set_s($value, $var)
{
    $_SESSION[$value]  = $var;
}


function get_s($value)
{
    return $_SESSION[$value];
}

// ! -------------------------------------------------------------

// function userGetById($id, $conn)
// {

//     $queryGet = "SELECT * FROM `users` WHERE `id` = '$id'";

//     return mysqli_query($conn, $queryGet)->fetch_assoc();
// }

// // Get current user (logged in)
// function getUserBySession () {
//     global $conn;
//     $res = null;
//     if ( isset( $_COOKIE["id"] ) ) {
//         if ( isset( $_SESSION["id"] ) ) {
//             $query = mysqli_query( $conn , "SELECT * FROM `users` WHERE `id` = '{$_SESSION["id"]}'" );
//             if ( $query -> num_rows ) {
//                 $res = $query -> fetch_assoc();
//             }
//         }
//     }
//     return $res;
// }


// //Func For Sql

// function userGetLast($conn) //Get the last 3 users
// {

//     $queryGetLast = "SELECT * FROM `users` ORDER BY `createdAt` DESC LIMIT 3";

//     return mysqli_query($conn, $queryGetLast)->fetch_all(MYSQLI_ASSOC);
// }

// // if for open cms

// if ($_SERVER["REQUEST_URI"] == "/cms/panel") {
//     if (!isset($_SESSION['id'])) {
//         home();
//     }
// }

// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     if (isset($_GET["action"])) {
//         if ($_GET["action"] == "exit") {
//             // Logout
//             unset($_SESSION["id"]);
//             unset($_COOKIE["id"]);
//             setcookie("id", "", -3600, "/");
//             session_destroy();
//             die(true);
//         }
//     }
// }
