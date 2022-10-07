<?php
require('actions/database.php');
if (isset($_GET['id']) and !empty($_GET['id'])){

    $idOfUser = $_GET['id'];
    $checkIfUserExists = $bdd->prepare('SELECT nome, prenom, phone, email, metier, image FROM user WHERE id=?');
    $checkIfUserExists->execute(array($idOfUser));
    if($checkIfUserExists->rowCount() > 0){

        $usersInfos = $checkIfUserExists->fetch();
        $user_nom = $usersInfos['nome'];
        $user_prenom = $usersInfos['prenom'];
        $user_phone = $usersInfos['phone'];
        $user_email = $usersInfos['email'];
        $user_job = $usersInfos['metier'];
        $user_image = $usersInfos['image'];

        $getHisEmplois = $bdd->prepare('SELECT *,count(*) as nbr  FROM emplois WHERE id_auteur=? ORDER BY id DESC');
        $getHisEmplois->execute(array($idOfUser));
        $getEmplois = $getHisEmplois->fetch();
        $nbrOfOffers = $getEmplois['nbr'];

        // $getHisanswers = $bdd->prepare('SELECT *,count(*) as nbrcomm  FROM answers WHERE id_emploi=? ORDER BY id DESC');
        // $getHisanswers->execute(array($idOfemploi));
        // $getanswers = $getHisanswers->fetch();
        // $nbrOfcomm = $getanswers['nbrcomm'];
        
    }else{
    $errorMsg= "aucun utilisateur trouvée";
}

}else{
    $errorMsg= "aucun utilisateur trouvée";
}
