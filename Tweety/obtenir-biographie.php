<?php
require_once('accesseur/UtilisateurDAO.php');

$nomutilisateur = $_POST['nomutilisateur'];
$utilisateur = UtilisateurDAO::obtenirUtilisateur($nomutilisateur);

$array = ['nomutilisateur' => $nomutilisateur, 'biographie' => $utilisateur->biographie];

echo json_encode($array);
