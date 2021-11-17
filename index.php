<?php
   require_once 'mes_fonctions/authentification.php';
   include_once "includes/header.php";
     obliger_utilisateur_connecte();
     var_dump(est_connecte());
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>

<body>

    <header></header>

    <main>
    <header>
        <section>
            <div>
                <h1>LOGO</h1>
            </div>
            <div>
                <button><a href="connexion.php">CONNEXION</a></button>
                <button><a href="inscription.php">Inscription</a> </button>
                <button><a href="deconnexion.php">Deconnexion</a> </button>
            </div>
        </section>

    </header>

    <main>
       

    </main>

    <footer>
        <div>
            <h1>FOOTER</h1>
        </div>
    </footer>
</body>

</html>
    