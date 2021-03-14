<?php

$email = (isset($_POST['email'])) ? $_POST['email'] : '';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Format de mail invalide";
} else {
    $emailErr = "";
}
$array = ['message' => $emailErr];
echo json_encode($array);