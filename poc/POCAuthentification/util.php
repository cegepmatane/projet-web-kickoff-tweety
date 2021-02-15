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
    return true;
}

function est_admin() : bool {
    return true;
}
