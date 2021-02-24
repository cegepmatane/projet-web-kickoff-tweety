<?php

if (!empty($_POST['action-modifier']) && !empty($_POST['nomutilisateur'])) {
    require_once('action/a_modifier_profil.php');
}

if (!empty($_POST['action-modifier']) && !empty($_POST['biographie'])) {
    require_once('action/a_modifier_profil.php');
}