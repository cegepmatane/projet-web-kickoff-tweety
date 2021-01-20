<?php

$hotebd = 'localhost';
$utilisateurbd = 'root';
$motdepassebd = '';
$nombd = 'poctwitterclone';

$conn = mysqli_connect($hotebd, $utilisateurbd, $motdepassebd);

mysqli_select_db($conn, $nombd);

$res = mysqli_query($conn, "select * from utilisateurs");
while ($li = mysqli_fetch_assoc($res)) {
    print_r($li);
}
