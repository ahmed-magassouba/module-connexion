<?php
include_once "includes/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            margin: auto;
            width: 80%;
            border-collapse: collapse;
            border: 1px solid black;
            text-align: center;
        }

        th,
        td {
            border: 1px solid black;
            height: 50px;
        }
    </style>
</head>

<body>
    <h1>bienvenue admin</h1>
    <?php


    $bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');

    mysqli_set_charset($bdd, 'UTF8');

    $sql = 'SELECT * FROM utilisateurs';

    $requete = mysqli_query($bdd, $sql);

    $utilisateurs = mysqli_fetch_all($requete, MYSQLI_ASSOC);

    // var_dump($etudiants);

    echo "<table><thead>
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

</body>

</html>