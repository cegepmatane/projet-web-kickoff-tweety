<?php

if (!empty($_POST['action-tweeter']) && !empty($_POST['tweet'])) {
    require_once('a_tweeter.php');
}

if (!empty($_POST['action-follow']) && !empty($_POST['uid'])) {
    require_once('a_follow.php');
}

if (!empty($_POST['action-unfollow']) && !empty($_POST['uid'])) {
    require_once('a_unfollow.php');
}
