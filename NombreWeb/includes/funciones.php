<?php

function debuguear($variable) : string { // Depuracion
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string { // Sanitizar datos
    $s = htmlspecialchars($html);
    return $s;
}
