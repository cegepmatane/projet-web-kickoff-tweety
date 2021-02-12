<?php

if (!empty($_POST['action-supprimer']) && !empty($_POST['tid'])) {
    require_once('a_supprimer.php');
}

if (!empty($_POST['action-modifier'])) {
    require_once ('a_modifier.php');
}
