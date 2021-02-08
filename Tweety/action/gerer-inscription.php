<?php

if (!empty($_POST['action-inscription']) && !empty($_POST['pseudonyme']) && !empty($_POST['biographie'])) {
    require_once ('inscription.php');
}

