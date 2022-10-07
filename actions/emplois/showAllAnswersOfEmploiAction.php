<?php

require('actions/database.php');
//nbr de commentaires
$getnbrAnswers = $bdd->prepare('SELECT count(*) as nbrcomm FROM answers WHERE id_emploi=?');
$getnbrAnswers->execute(array($idOfemploi));
$getanswers = $getnbrAnswers->fetch();
$nbrOfcomm = $getanswers['nbrcomm'];

// get all commentaires
$getAllAnswersOfEmploi = $bdd->prepare('SELECT * FROM answers WHERE id_emploi=? ORDER BY id DESC');
$getAllAnswersOfEmploi->execute(array($idOfemploi));
 
