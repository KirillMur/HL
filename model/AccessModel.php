<?php
require_once(__DIR__ . '/../functions/PDO.php');

function checkLogin($login, $password)
{
    return $response = DB::select("SELECT login, first_name, access_type FROM users WHERE login='$login' 
    AND password='$password'");
}

function writeHash($username, $hash)
{
    DB::update('users', 'hash', $hash, "first_name='$username'");
}

function findHash($hash)
{
    return $findHash = DB::select("SELECT id FROM users WHERE hash='$hash'");
}