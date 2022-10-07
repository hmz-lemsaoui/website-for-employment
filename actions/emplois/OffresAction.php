<?php

require('actions/database.php');

$getAllEmplois = $bdd->prepare('SELECT id, nom_auteur,  titre, description, date_publication, image FROM emplois WHERE id_auteur =? ORDER BY id DESC');
$getAllEmplois->execute(array($_GET['id']));

