<?php

$hotebd = 'localhost';
$utilisateurbd = 'root';
$motdepassebd = '';
$nombd = 'poctwitterclone';

$conn = mysqli_connect($hotebd, $utilisateurbd, $motdepassebd, $nombd);

mysqli_select_db($conn, $nombd);

/*
$res = requete("select * from utilisateurs");
while ($li = mysqli_fetch_assoc($res)) {
    print_r($li);
}
*/

// Execute une requête
function requete($requete) {
    global $conn;
    return mysqli_query($conn, $requete);
}

/** Récupère la première ligne d'une requête */
function getTete($requete) {
    $res = requete($requete);
    $li = mysqli_fetch_row($res);
    return $li[0];
}

function getUid() {
    global $conn;
    // Récupérer l'adresse ip de l'utilisateur
    $ip = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);
    // Récupérer l'id de l'utilisateur
    return getTete("select uid from user where ip = " . $ip);
}

if ($_REQUEST['follow']) {
    // Enregistrer le follow
    $follow = mysqli_real_escape_string($conn, $_REQUEST['follow']);
    $uid = getUid();
    requete("insert into follows values('$uid', '$follow')");
}

if ($_REQUEST['tweet']) {
    // Récupérer le contenu du tweet de l'utilisateur
    $tweet = mysqli_real_escape_string($conn, $_REQUEST['tweet']);
    // Récupérer l'adresse ip de l'utilisateur
    $ip = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);

    // Si l'utilisateur qui tweete n'existe pas, le créer
    $uid = getUid();
    if (!$uid) {
        requete("insert into utilisateurs(ip) values ('$ip')");
    }
    // Enregistrer le tweet
    $date = Date("Y-m-d H:i:s");
    requete("insert into tweets(uid, post, date) values('$uid', '$tweet', '$date')");

    // print "$tweet, $ip";
}

print <<< EOF

<form action=index.php>
    <textarea name="tweet"></textarea>
    <input type="submit" value="Tweet">
</form>

EOF;

// Récupérer les tweets et les afficher
$res = requete("select * from tweets order by date desc");
print "<table>";
while ($li = mysqli_fetch_assoc($res)) {
    $uid = htmlspecialchars($li['uid']);
    $post = htmlspecialchars($li['post']);
    $date = htmlspecialchars(($li['date']));

    // Vérifier si l'utilisateur ne suit pas déjà les autres utilisateurs affichés
    $utilisateur = getUid();
    if (!getTete("select follower from follows where uid='$utilisateur' and follower='$uid'")) {
        $follow = <<< EOF
<a href="index.php?follow=$uid">Follow</a>
EOF;
    } else {
        $follow = "Followed.";
    }


    print <<< EOF
<tr><td>$uid</td><td>$post</td><td>$date</td><td>$follow</td></tr>
EOF;
}
print "</table>";
