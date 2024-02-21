<?php
$title_header_name = null;
function Router($url) {
    if($url == 'home'){
        $title_header_name = 'Legendary Notes';
    }elseif ($url == 'notes') {
        $title_header_name = 'Hello /' . get_session('uname');
    }
}

?>