<?php
require_once('functions/PDO.php');

$answ = file_get_contents('php://input');
$answ = json_decode($answ, true);
$answ = array_shift($answ);
$userData = $answ['userdata'];
$itemsList = $answ['itemlist'];


insert('customers', implode(',', array_keys($userData)), implode(',', array_values($userData)));

echo 'Success';