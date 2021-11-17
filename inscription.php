 <?php
    include_once "includes/header.php";

    /////////////////////////////////////////////////////////
    ///  CONNEXION ET INSERTION DANS LA BASE DE DONNEE  ////
    ///////////////////////////////////////////////////////

    $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

    mysqli_set_charset($bdd, 'UTF8');

    //traitement du formulaire d'inscription
    //la fonction strip_tags suprime les balise html et php d'une chaine de carractère 

    if (!empty($_POST)) {

        $login = strip_tags($_POST['login']);
        $prenom = strip_tags($_POST['prenom']);
        $nom = strip_tags($_POST['nom']);


        //pour verifier la validité d'un mail sans passer par les expression regulière
        //if(!filter_var($_post["email"], FILTER_VALIDATE_EMAIL)){ die("L'adresse email est incorrecte")};


        //password_hash est une fonction pour hasher le motde passe
        $password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
        $confirm_password = $_POST['confirm-password'];

        $sql = "INSERT INTO `utilisateurs` ( `login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom', '$nom', '$password')";

        if (isset($login, $prenom, $nom, $password) && !empty($login) && !empty($prenom) && !empty($nom) && !empty($password)) {

            //on verifie si le login existe
            $sqlVerif = "SELECT * FROM utilisateurs WHERE login = '$login'";
            $select = mysqli_query($bdd, $sqlVerif);

            if (mysqli_num_rows($select)) {
                echo "Ce login existe déjà . choisissez un autre";

            //si le login n'existe pas
            } elseif (password_verify($confirm_password, $password)) {
                $requete = mysqli_query($bdd, $sql);

              //  var_dump(password_verify($password, $confirm_password));
              
                header('Location: connexion.php');
                exit();
            } else {
                echo "<h1>Les mots de passe ne sont pas identique</h1>";
            }
        } else {
            echo  "vous avez des champs vide ";
        }
    }


    require_once 'mes_fonctions/authentification.php';

    if (est_connecte()) {
        header('Location: profil.php ');
        exit();
    }

    var_dump(est_connecte());

    mysqli_close($bdd);

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Page d'inscription'</title>
 </head>

 <body>


     <main>

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