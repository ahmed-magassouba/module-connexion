<?php
require_once 'mes_fonctions/authentification.php';

$title ="page d'accueil";
require "includes/header.php";

if (est_connecte()) {
    header('Location: profil.php ');
    exit();
}

var_dump(est_connecte());
?>


<?php require 'includes/footer.php'; ?>

   
       

    
    