<?php
require_once('accesseur/UtilisateurDAO.php');

$nomutilisateur = $_POST['nomutilisateur'];
$tid = $_POST['tid'];
$utilisateur = UtilisateurDAO::obtenirUtilisateur($nomutilisateur);

$array = ['nomutilisateur' => $nomutilisateur, 'tid' => $tid,'biographie' => $utilisateur->biographie];

echo json_encode($array);
