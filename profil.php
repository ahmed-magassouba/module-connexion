<?php

$title = "page de profil";
require 'includes/header.php';

obliger_utilisateur_connecte();


//var_dump($_SESSION);
//var_dump($_POST);


$bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
mysqli_set_charset($bdd, 'UTF8');
$id = $_SESSION['connecte']['id'];
$login = $_SESSION['connecte']['login'];
$prenom = $_SESSION['connecte']['prenom'];
$nom = $_SESSION['connecte']['nom'];

if (!empty($_POST)) {

    $loginp =  strip_tags($_POST['login']);
    $prenomp =  strip_tags($_POST['prenom']);
    $nomp = strip_tags($_POST['nom']);


    $sql = "UPDATE `utilisateurs` SET `login`='$loginp',`prenom`='$prenomp',`nom`='$nomp' WHERE id = $id";
    $requete = mysqli_query($bdd, $sql);

   // var_dump($requete);
   header('Location: index.php ');
   exit();
}




?>
<div>
    <div>
        <h1>Profil de : <?= $_SESSION['connecte']['prenom'] . ' ' . $_SESSION['connecte']['nom'] ?></h1>
        <h1> login:<?= ' ' . $_SESSION['connecte']['login'] ?></h1>
    </div>

    <form class="formprofil" action="profil.php" method="post">

        <h3>
            <legend>Modifier mon profil</legend>
        </h3>
        
        <div class="el2"><h6>Login</h6>
            <label for="login"> </label>
            <input type="text" name="login" id="login" class=" inputclass" value="<?= $login  ?>">
        </div>
        
        <div class="el2"><h6>Prenom</h6>
            <label for="prenom"></label>
            <input type="text" name="prenom" id="prenom" class=" inputclass" value="<?= $prenom  ?>">
        </div>
        
        <div class="el2"><h6>Nom</h6>

            <label for="nom"></label>
            <input type="text" name="nom" id="nom" class=" inputclass" value="<?= $nom  ?>">
        </div>


        <div class="el2">
            <input class="submitclass" type="submit" value="Appliquer les modifications">
        </div>
    </form>


</div>
<?php require 'includes/footer.php'; ?>