<?php
session_start();

$title = "page de profil";
require 'includes/header.php';


var_dump($_SESSION);
var_dump($_POST);
include_once "includes/header.php";

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

    var_dump($requete);
}




?>

<form action="profil.php" method="post">
    <fieldset>
        <legend>Modifier mon profil</legend>

        <div class="">
            <label for="login"> </label>
            <input type="text" name="login" id="login" value="<?= $login  ?>">
        </div>

        <div class="">
            <label for="prenom"></label>
            <input type="text" name="prenom" id="prenom" value="<?= $prenom  ?>">
        </div>

        <div class="">
            <label for="nom"></label>
            <input type="text" name="nom" id="nom" value="<?= $nom  ?>">
        </div>


        <div class="">
            <input type="submit" value="Appliquer les modifications">
        </div>

    </fieldset>
</form>


<h1>profil de : <?= $_SESSION['connecte']['prenom'] . ' ' . $_SESSION['connecte']['nom'] ?></h1>
<p> login:<?= $_SESSION['connecte']['login'] ?></p>

<?php require 'includes/footer.php'; ?>