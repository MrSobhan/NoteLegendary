<?php
// $hostname = "localhost";
// $username = "";
// $password = "";
// $database = "";
// $conn = mysqli_connect( $hostname , $username , $password ); // For Host

include_once("./includes/alertCom.php");

$page_type =  'home';

$conn = mysqli_connect("notes", "root", "DttLDVdKudxdzsVKp2x8frtI");
if ($conn) {
    $conn->set_charset("utf8");
    $DOCROOT = "https://notelegendary.liara.run";
    mysqli_multi_query($conn, file_get_contents("$DOCROOT/db/db.sql"));
    while (mysqli_next_result($conn));
}



session_start();



// ? Get Time Now 
$getTime =  getdate();
$month_Number = strlen($getTime['mon']) != 1 ? $getTime['mon'] : '0' . $getTime['mon'];
$day_Number = strlen($getTime['mday']) != 1 ? $getTime['mday'] : '0' . $getTime['mday'];
$Today = $getTime['year'] . '-' . $month_Number . '-' . $day_Number;


//Helper Func

$rootHeaderUrl = 'https://notelegendary.liara.run/';

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

function get_id_header($id)
{
    return $_GET[$id] == null ? false : $_GET[$id];
}

// ! -------------------------------------------------------------

$isLogin = isset($_SESSION['login']) && $_SESSION['login'] && get_session('id');

// vd($isLogin);

if (isset($_POST['goNotes'])) {
    if ($isLogin) {
        Locatoin("notes.php?id=" . get_session('id'));
    }
}

if (isset($_POST['exit'])) {
    set_session('login', false);
    home();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sub-chat'])) {
        $emailChat = valid($_POST['emailChat']);
        $chat = valid($_POST['chat']);

        $id_chats = uniqid();

        if ($emailChat && $chat) {
            $idd = get_session('id');
            $querySetChats = "INSERT INTO `chats`(`id`,`uid`, `email`, `chat`) VALUES ('$id_chats','$idd','$emailChat','$chat')";

            $resultAllChats = mysqli_query($conn, $querySetChats);

            if ($resultAllChats) {
                if (get_session('login') && get_session('id')) {
                    header("Refresh:0");
                }
            }
        } else {
            alertErrorInput();
        }
    }
}


// ! ---------------------  Comments  --------------------------

$quryGetChats = "SELECT * FROM `chats`";

$chats = mysqli_query($conn, $quryGetChats);
