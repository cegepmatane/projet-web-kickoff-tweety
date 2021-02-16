<?php

function initialiser_session() : bool {
    if (!session_id()) {
        session_start();
        session_regenerate_id();
        return true;
    }
    return false;
}

function purger_session() : void {
    session_unset();
    session_destroy();
}

function est_connecte() : bool {
    if (isset($_SESSION['utilisateur'])) {
        return true;
    }
    return false;
}

function est_admin() : bool {
    if (est_connecte()) {
        if ($_SESSION['utilisateur']->estadmin === 1) {
            return true;
        }
    }
    return false;
}
