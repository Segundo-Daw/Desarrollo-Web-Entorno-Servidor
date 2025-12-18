<?php
function secure($text){    
    $text = htmlspecialchars(stripcslashes(trim($text)));
    return $text;
}

function closeSession(){
    session_destroy();
}

?>