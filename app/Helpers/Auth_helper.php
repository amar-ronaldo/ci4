<?php
if (!function_exists('password_encrpt')) {
    function password_encrpt($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT);
    }
}

if (!function_exists('password_check')) {
    function password_check($password,$hash)
    {
        return password_verify($password, $hash);
    }
}
