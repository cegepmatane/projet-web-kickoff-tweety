<?php

if(!empty($_POST['action-follow']) && !empty($_POST['uid'])) {
    require_once ('follow.php');
}

if(!empty($_POST['action-unfollow']) && !empty($_POST['uid'])) {
    require_once ('unfollow.php');
}
