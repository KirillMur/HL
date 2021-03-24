<?php
require_once(__DIR__.'/../functions/PDO.php');
//
$input = json_decode(file_get_contents('php://input'), true);

//$hash = '356534353657658679o7078766456456456454';
//$response = DB::select("SELECT id FROM users WHERE first_name='{$input['username']}' AND password='{$input['password']}'", true);
//
//(strpos($response, 'Error') !== null) ? print_r($response) : print_r(true);

//print(sprintf('%b', $response));

