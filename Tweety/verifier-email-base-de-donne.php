<?php
require_once ('accesseur/UtilisateurSQL.php');
require_once ('accesseur/UtilisateurDAO.php');

UtilisateurDAO::obtenirEmail($_POST['email']);

if (isset($email))
{
    if($_POST['email'] != $email)
    {
        $emailErr = "";
    }
    else
    {
        $emailErr = "Email deja utiliser";
    }
}
$array = ['message' => $emailErr];
echo json_encode($array);