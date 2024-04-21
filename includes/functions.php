<?php
function redirect($url) {
    header("Location: $url");
    exit();
}

function isLoggedIn() {
    return isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;
}

function isAdmin() {
    return isLoggedIn() && isset($_SESSION["role_id"]) && $_SESSION["role_id"] === 1;
}

function getUserRole() {
    return isset($_SESSION["role_id"]) ? $_SESSION["role_id"] : null;
}

function getUsername() {
    return isset($_SESSION["username"]) ? $_SESSION["username"] : null;
}

// Add more functions as needed
?>
