<?php

/*$email = "vitaleyohann@gmail.com";

if(isset($_POST['email']))
{
    if($_POST['email'] != $email){

        echo "Nice, ton email est valide";
    }
    else{ // Sinon

        echo "Email deja utilise";
    }
}*/
$email = "vitaleyohann@gmail.com";
if (isset($email))
{
    if($_POST['email'] != $email)
    {
        $emailErr = "Email Bon";
    }
    else
        {
        $emailErr = "Email deja utiliser";
    }
}
$array = ['message' => $emailErr];
echo json_encode($array);