<?php

if (isset($_GET['page'])) {
    $page = htmlspecialchars($_GET['page']);
} else {
    $page = "accueil";
}

require_once('controleurs/c_'.$page.'.php');
