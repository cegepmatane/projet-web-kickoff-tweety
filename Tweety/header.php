<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device, initial-scale=1.0">
        <title>Twitter Clone</title>

        <link rel="stylesheet" href="public/styles.css">
    </head>
    <body class="px-3 flex flex-col h-screen justify-between">
        <!-- En-tête -->
        <header></header>
        <!-- Connexion -->
        <?php if(!isset($_COOKIE["user"])) {
        header("Location: connexion.php");
        } ?>
        <!-- Menu -->
        <?php include('menu.php'); ?>
        <!-- Vue -->
        <section class="mb-auto">
