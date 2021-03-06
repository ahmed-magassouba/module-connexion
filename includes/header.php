<?php
session_start();
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>

        <div>
            <h1>Mon site</h1>
        </div>
        <div class="menu">
            <div class="child1">
                <h4 class="color"><?php if (!empty($_SESSION['connecte']) ) {
                        echo 'Salut ' . $_SESSION["connecte"]["prenom"] . ' ' . $_SESSION["connecte"]["nom"] ;
                    }
                    ?>
                </h4>
            </div>

            <div class="child2">
                <a href="index.php"><button>Accueil</button></a>
                
                <?php if (!est_connecte()) : ?>
                    <a href="connexion.php"><button>Connexion</button></a>
                    <a href="inscription.php"><button>Inscription </button></a>
                <?php else : ?>
                    <a href="profil.php"><button> Profil </button></a>
                    <a href="deconnexion.php"><button>Déconnexion</button></a>
                <?php endif; ?>

                <?php if (!empty($_SESSION) && !empty($_SESSION['connecte']) && $_SESSION['connecte']['login'] == 'admin') : ?>
                    <a href="admin.php"><button>Admin</button></a>
                <?php endif; ?>

            </div>
        </div>


    </header>
    <main>
        <aside></aside>
       