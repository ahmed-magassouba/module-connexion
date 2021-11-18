<?php
include_once 'mes_fonctions/authentification.php';
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
        <section class="menu">
            <div>
                <h6><?php if (!empty($_SESSION['connecte']['prenom']) && !empty($_SESSION['connecte']['nom']) ) {
                        echo 'Salut ' . $_SESSION["connecte"]["prenom"] . ' ' . $_SESSION["connecte"]["nom"] ;
                    }
                    ?>
                </h6>
            </div>

            <div>
                <a href="index.php"><button>Accueil</button></a>
                <?php if (!est_connecte()) : ?>
                    <a href="connexion.php"><button>Connexion</button></a>
                    <a href="inscription.php"><button>Inscription </button></a>
                <?php else : ?>
                    <a href="profil.php"><button> Profil </button></a>
                    <a href="deconnexion.php"><button>Logout </button></a>
                <?php endif; ?>
                <?php if (!empty($_SESSION) && $_SESSION['connecte']['login'] == 'admin') : ?>
                    <a href="admin.php"><button>Admin</button></a>
                <?php endif; ?>
            </div>
        </section>


    </header>
    <main>
        <aside></aside>
        <section>