<?php
require_once(__DIR__ . '/../model/AccessModel.php');
session_start();

if(isset($_REQUEST['username']) || isset($_REQUEST['password'])) formHandler();

function formHandler()
{
    $login = dataValidation($_REQUEST['username']) ?? $_REQUEST['username'];
    $password = dataValidation($_REQUEST['password']) ?? $_REQUEST['password'];
    $referer = $_REQUEST['referer'] ?? null;

    if ($login && $password) {
        loginAction($login, $password, $referer);
    } elseif(!$login xor !$password) {
        logOut();
        setcookie('username', 'invalid', ['path' => '/']);
        header("Location: $referer");
    } else {
        logOut(true);
        header("Location: $referer");
    }
}

function loginAction($login, $password, $referer)
{
    $response = checkLogin($login, $password);
    (is_array($response)) ? ($selectResult = array_shift($response)) : ($selectResult = false);

    if($selectResult) {
        logIn($selectResult['first_name']);
        adminCheck($selectResult['access_type']);
        header("Location: $referer");

    } else {
        logOut();
        setcookie('username', 'false', ['path' => '/']);
        header("Location: $referer");
    }
}

function logIn($username)
{
    logOut();
    $_SESSION['is_authorised'] = true;
    $hash = generateHash();
    $_SESSION['hash'] = $hash;
    writeHash($username, $hash);
    setcookie('username', $username, ['path' => '/']);
}

function logOut(bool $clearCookie = false)
{
    $_SESSION['is_authorised'] = false;
    unset($_SESSION['login_name']);
    unset($_SESSION['admin']);
    unset($_SESSION['hash']);
    !$clearCookie ?: setcookie('username', '', ['path' => '/']);
}

function loginCheck()
{
    !isset($_SESSION['hash']) ?: $findHash = findHash($_SESSION['hash']);
    return isset($findHash);
}

function adminCheck($accessType)
{
    $accessType === 'admin' ? ($_SESSION['admin'] = true) : function() {unset($_SESSION['admin']);};
}

function generateHash()
{
    return password_hash(random_bytes(10),  PASSWORD_BCRYPT);
}

function dataValidation(string $data)
{
    $result = preg_replace('/[^\p{L}\p{N}]+/', '', $data);
    !empty($result) ?:  $result = false;
    return $result;
}