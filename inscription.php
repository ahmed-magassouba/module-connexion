<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription'</title>
</head>

<body>
    <header>
        <section>
            <div>
                <h1>LOGO</h1>
            </div>
            <div>
                <button><a href="inscription.php">CONNEXION</a></button>
                <button><a href="inscription.php">Inscription</a> </button>
            </div>
        </section>

    </header>

    <main>
        <?php


        /////////////////////////////////////////////////////////
        ///  CONNEXION ET INSERTION DANS LA BASE DE DONNEE  ////
        ///////////////////////////////////////////////////////

        $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

        mysqli_set_charset($bdd, 'UTF8');

        $login = $_POST['login'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];


        $sauvegarde = false;

        $sql = "INSERT INTO `utilisateurs` ( `login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$password')";

        //traitement du formulaire d'inscription

        if (!empty($_POST)) {
            if( !empty($login) && !empty($prenom) && !empty($nom) && !empty($password)){

          
            if ($_POST['password'] == $_POST['confirm-password']) {
                $requete = mysqli_query($bdd, $sql);
                var_dump($requete);
                echo "<h1>Inscription reussie</h1>";
                $sauvegarde=true;
            } else{
            echo"<h1> erreur Inscription</h1>";
       
        } 
     }else{
        echo  "vous avez des champs vide ";
     }

    }

if($sauvegarde==true){
    header('Location: connexion.php');
}








        var_dump($_POST);


        mysqli_close($bdd);

        ?>
        <form action="inscription.php" method="post">
            <fieldset>
                <legend>Inscription</legend>

                <div class="">
                    <label for="login"> </label>
                    <input type="text" name="login" id="login" placeholder="login" required>
                </div>

                <div class="">
                    <label for="prenom"></label>
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
                </div>

                <div class="">
                    <label for="nom"></label>
                    <input type="text" name="nom" id="nom" placeholder="Nom" required>
                </div>

                <div class="">

                    <label for="password"></label>
                    <input type="password" name="password" id="password " placeholder="Mot de passe" required>

                    <label for="confirm-password"></label>
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirmer le mot de passe" required>

                </div>

                <div class="">
                    <input type="submit" value="Envoyer">
                </div>

            </fieldset>
        </form>

    </main>

    <footer>
        <div>
            <h1>FOOTER</h1>
        </div>
    </footer>
</body>

</html>