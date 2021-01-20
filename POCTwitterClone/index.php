<?php

$hotebd = 'localhost';
$utilisateurbd = 'root';
$motdepassebd = '';
$nombd = 'poctwitterclone';

$conn = mysqli_connect($hotebd, $utilisateurbd, $motdepassebd);

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

if ($_REQUEST['tweet']) {
    // Récupérer le contenu du tweet de l'utilisateur
    $tweet = mysqli_real_escape_string($conn, $_REQUEST['tweet']);
    // Récupérer l'adresse ip de l'utilisateur
    $ip = mysqli_real_escape_string($conn, $_SERVER['REMOTE_ADDR']);

    // Si l'utilisateur qui tweete n'existe pas, le créer
    $uid = getTete("select uid from user where ip = " . $ip);
    if (!$uid) {
        requete("insert into utilisateurs(ip) values ('$ip')");
    }
    // Enregistrer le tweet
    $date = Date("Y-m-d H:i:s");
    requete("insert into tweets(uid, post, date) values('$uid', '$tweet', '$date')");

    print "$tweet, $ip";
}

print <<< EOF

<form action=index.php>
    <textarea name="tweet"></textarea>
    <input type="submit" value="Tweet">
</form>

EOF;
