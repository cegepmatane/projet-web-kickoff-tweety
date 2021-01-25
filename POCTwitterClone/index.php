<?php

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = "accueil";
}

require_once('controllers/c_'.$page.'.php');
