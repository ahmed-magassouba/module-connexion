<?php
require_once 'mes_fonctions/authentification.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($title)) {
                echo $title;
            } else {
                echo "Mon site";
            }  ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>

        <div>
            <h1>Mon site</h1>
        </div>
        <div>
            <?php if (!est_connecte()) : ?>
                <button><a href="connexion.php">Connexion</a></button>
                <button><a href="inscription.php">Inscription</a> </button>
            <?php else : ?>
                <button><a href="deconnexion.php">Deconnexion</a> </button>
            <?php endif; ?>
        </div>


    </header>
    <main>
    <aside></aside>
    <section>

  