 <?php
    
   
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

            //si le login n'existe pas
            if (!$utilisateur) {
                echo "<h1>Le login ou le mot de passe est incorrect</h1>";
            }

            if($utilisateur[0]['login']!= $log ){
                echo "<h1>Le login ou le mot de passe est incorrect</h1>";
            }

            //la fonction password_verify Vérifie que la table de hachage fournie correspond bien au mot de passe fourni
            //si le mot de passe  est different de celui dans la basse de donnéé
            if (!password_verify($pass,  $utilisateur[0]['password'])) {
                echo "<h1>Le login ou le mot de passe est incorrect</h1>";
            }

            // si le login et le mot de passe sont correct
            //on connecte l'utilisateur
            session_start();
            $_SESSION['connecte'] = [
                "id" => $utilisateur[0]["id"],
                "login" => $utilisateur[0]["login"],
                "prenom" => $utilisateur[0]["prenom"],
                "nom" => $utilisateur[0]["nom"]
            ];

           // var_dump($_SESSION);

          //  header('Location: profil.php');
        }
    }

    // require_once 'mes_fonctions/authentification.php';

    // if (est_connecte()) {
    //     header('Location: profil.php ');
    //     exit();
    // }
    // var_dump(est_connecte());
    // var_dump($_POST);
    // include_once "includes/header.php";
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

         <form action="connexion.php" method="post">
             <fieldset>
                 <legend>Identifiant</legend>
                 <p>
                     <label for="log"></label>
                     <input type="text" name="log" id="log" placeholder="Login" />
                 </p>
                 <p>
                     <label for="pass"></label>
                     <input type="password" name="pass" id="pass" placeholder="Mot de passe" />

                 </p>
                 <input type="submit" name="submit" value="Identification" />
             </fieldset>
         </form>
     </main>

     <footer></footer>

 </body>

 </html>