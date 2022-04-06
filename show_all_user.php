<?php
     /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue (menu)
    include './view/view_menu.php';
    //importer la vue(interface)
    include './view/view_show_all_user.php';
    /*---------------------------------------
                    LOGIQUE
    -----------------------------------------*/
    //version 1
    //showAllUser($bdd);

    //version 2 (Méthode conseillé)
    //on stocke le tableau dans une variable
    $list = showAllUserV2($bdd);
    echo '<form action="" method="post">';
    //on parcours le tableau
    foreach($list as $value){
        //on affiche à chaque tour un paragraphe avec les de l'utilisateur
        echo '<p><inputb type="checkbox" name="box[]" value="'.$value['id_util'].'">
        <a href="update_user.php?id='.$value['id_util'].'">le prenom est égal à :
         '.$value['prenom_util'].' le mdp est est égal à :
        '.$value['mdp_util'].'</a></p>';
    }
    echo '<p><input type="submit" value="Supprimer"></p><
    /form>';
    //vérification de la super globale $_POST['id_prod']
    if(isset($_POST['box'])){
        //boucle pour parcourir chaque case cochés ($value équivaut à value en HTML)
        foreach($_POST['box'] as $value){
            //récupération des informations utilisateur
            $user = getUser($bdd, $value);
            //méthode pour supprimer un utilisateur depuis son id
            deleteUser($bdd, $value);
            echo '<p>Suppression de l\'utilisateur '.$user[0]['nom_util'].'</p>';
        }
        //refresh de la page
        echo '<script>
         setTimeout(()=>{
         document.location.href="show_all_user.php"; 
         }, 1000);</script>';
    }
    else{
        echo "<p>Veuillez cocher un ou plusieurs produit à supprimer</p>";
    }
    //version 3
    /*$obj = showAllUserV3($bdd);
    foreach($obj as $value){
        echo '<p>le prenom est égal à : '.$value->nom_util.' 
        le mdp est est égal à :'.$value->mdp_util.'</p>';
    }
    */
?>