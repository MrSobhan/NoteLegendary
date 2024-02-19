<?php
// $hostname = "localhost";
// $username = "";
// $password = "";
// $database = "";
// $conn = mysqli_connect( $hostname , $username , $password ); // For Host

include_once("./includes/alertCom.php");

// echo "loded...";


$conn = mysqli_connect("localhost", "root", null);
if ($conn) {
    $conn->set_charset("utf8");
    $DOCROOT = $_SERVER['DOCUMENT_ROOT'];
    mysqli_multi_query($conn, file_get_contents("$DOCROOT/php/NoteLegendary/db/db.sql"));
    while (mysqli_next_result($conn));
}else{
    exit;
}

session_start();




//Helper Func

$rootHeaderUrl = 'http://localhost/php/NoteLegendary/';

function Locatoin($url)
{
    global $rootHeaderUrl;
    header("Location:" . $rootHeaderUrl . $url);
}

function href($url)
{
    global $rootHeaderUrl;
    return $rootHeaderUrl . $url;
}


function valid($e)
{
    $e = htmlspecialchars($e);
    return trim($e) != '' ? trim($e) : null;
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
    global $rootHeaderUrl;
    header("Location:" . $rootHeaderUrl . 'home.php');
}

function set_session($value, $var)
{
    $_SESSION[$value]  = $var;
}


function get_session($value)
{
    return $_SESSION[$value];
}

function get_id_header($id) {
    return $_GET[$id] == null ? false : $_GET[$id];
}

// ! -------------------------------------------------------------

$isLogin = isset($_SESSION['login']) && $_SESSION['login'] && get_session('id');


if (isset($_POST['goNotes'])) {
    if ($isLogin) {
        Locatoin("notes.php?id=" . get_session('id'));
    }
}

if (isset($_POST['exit'])) {
    set_session('login', false);
    home();
}

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
