<?php
 require_once 'mes_fonctions/authentification.php';
?>

<header>
         <section>
             <div>
                 <h1>LOGO</h1>
             </div>
             <div>
                 <?php  if (!est_connecte()): ?>
                 <button><a href="connexion.php">CONNEXION</a></button>
                 <button><a href="inscription.php">Inscription</a> </button>
                 <?php  else: ?>
                 <button><a href="deconnexion.php">Deconnexion</a> </button>
                 <?php  endif; ?>
             </div>
         </section>

     </header>

