
<?php 
$title ="page d'admin";
require 'includes/header.php';
?>

    <h1>bienvenue admin</h1>

    <?php


    $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

    mysqli_set_charset($bdd, 'UTF8');

    $sql = 'SELECT * FROM utilisateurs';

    $requete = mysqli_query($bdd, $sql);

    $utilisateurs = mysqli_fetch_all($requete, MYSQLI_ASSOC);

    // var_dump($etudiants);

    echo "<table>
    <caption>Liste des membres inscrits</caption>
    <thead>
    <th>id</th>
    <th>login</th>
    <th>prenom</th>
    <th>non</th>
    <th>password</th>
</thead>
<tbody>";
    foreach ($utilisateurs as $utilisateur) {
        echo " <tr>
            <td>" . $utilisateur['id'] . "</td>
            <td>" . $utilisateur['login'] . "</td>
            <td>" . $utilisateur['prenom'] . "</td>
            <td>" . $utilisateur['nom'] . "</td>
            <td>" . $utilisateur['password'] . "</td>
        </tr>";
    }

    echo "</tbody>
    
</table>";

    ?>
<?php require 'includes/footer.php';?>
