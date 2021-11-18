<?php
session_start();

$title ="page de connexion";
require 'includes/header.php';;

$bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

mysqli_set_charset($bdd, 'UTF8');

///////////////////////////////////////////
///// VERIFICATION DU FORMULAIRE ///////
//////////////////////////////////////////


$message = null;      // Message à afficher à l'utilisateu

if (!empty($_POST)) {

    if (isset($_POST['log'], $_POST['pass']) && !empty($_POST['log']) && !empty($_POST['pass'])) {

        $log = strip_tags($_POST['log']);

        $pass = $_POST['pass'];

        $sql = "SELECT * FROM `utilisateurs` WHERE login = '$log' ";
        $requete = mysqli_query($bdd, $sql);
        //var_dump($requete);

        $utilisateur = mysqli_fetch_all($requete, MYSQLI_ASSOC);
        var_dump($utilisateur);

        //les conditions de connexion et redirection vers la page de profil

        if (count($utilisateur) > 0) {

            if ((password_verify($pass,  $utilisateur[0]['password'])) ||  $pass == $utilisateur[0]['password']) {

                $_SESSION['connecte'] = [
                    "id" => $utilisateur[0]["id"],
                    "login" => $utilisateur[0]["login"],
                    "prenom" => $utilisateur[0]["prenom"],
                    "nom" => $utilisateur[0]["nom"]
                ];

                if ($_SESSION['connecte']['login'] == 'admin') {

                    header('Location: admin.php');
                    exit();
                } else {
                    // var_dump($_SESSION);

                    header('Location: profil.php');
                    exit();
                }
            } else {
                echo 'inscris toi mieux ';
            }
        }
    }
    if (empty($utilisateur)) {
        echo "<h1>Le login ou le mot de passe est incorrect</h1>";
    }
}

require_once 'mes_fonctions/authentification.php';

if (est_connecte()) {
    header('Location: profil.php ');
    exit();
}
var_dump(est_connecte());
var_dump($_POST);
include_once "includes/header.php";
?>


<form action="connexion.php" method="post">
    <fieldset>
        <legend>Identifiant</legend>
        <p>
            <label for="log"></label>
            <input type="text" name="log" id="log" placeholder="Login" required />
        </p>
        <p>
            <label for="pass"></label>
            <input type="password" name="pass" id="pass" placeholder="Mot de passe" required />

        </p>
        <input type="submit" name="submit" value="Identification" />
    </fieldset>
</form>
<?php require 'includes/footer.php'; ?>