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
    include './view/view_update_user.php';
    /*---------------------------------------
                    TEST
    -----------------------------------------*/
    //test si $_GET['id'] existe
    if(isset($_GET['id'])AND !empty($_GET['id'])){
        //stocker dans id la valeur de l'id_util
        $id = $_GET['id'];
        $list = getUser($bdd, $id);
        echo '<script>
        setValueInput("'.$list[0]['nom_util'].'", "'.$list[0]['prenom_util'].'", "'.$list[0]['mail_util'].'", 
        "'.$list[0]['mdp_util'].'");
        </script>';
        //test pour vérifier si les champs du formulaire sont remplis
        if(isset($_POST['nom_util']) AND isset($_POST['prenom_util']) 
            AND isset($_POST['mail_util']) AND isset($_POST['mdp_util']) AND 
            $_POST['nom_util'] !='' AND $_POST['prenom_util'] !='' AND 
            $_POST['mail_util'] !='' AND $_POST['mdp_util'] !=''){
            //stocker les super globales POST dans des variables
            $nom =$_POST['nom_util'];
            $prenom =$_POST['prenom_util'];
            $mail =$_POST['mail_util'];
            $mdp =$_POST['mdp_util'];
            //hashage du mdp
            $mdp = md5($mdp);
            //appel de la fonction ajouter  un user en BDD
            updateUser($bdd, $nom, $prenom, $mail,$mdp, $id);
            //message
            echo "$nom à été modifié en  BDD";
        }
        //sinon vides
        else{
            echo 'Veuillez compléter les champs du formulaire';
        }
    }
?>