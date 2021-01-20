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

function requete($requete) {
    global $conn;
    return mysqli_query($conn, $requete);
}

print <<< EOF

<form action=index.php>
    <textarea name="tweet"></textarea>
    <input type="submit" value="Tweet">
</form>

EOF;
