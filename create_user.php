<?php
    /*---------------------------------------
                    SESSION
    -----------------------------------------*/
    //Démarrage de la session
    session_start();
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
    include './view/view_add_user.php';
    /*---------------------------------------
                    TEST
    -----------------------------------------*/
    //variable message
    $msg = "";
    //test si le bouton submit à été cliqué
    if(isset($_POST['submit'])){
        //test pour vérifier si les champs du formulaire sont remplis
        if(isset($_POST['nom_util']) AND isset($_POST['prenom_util']) 
            AND isset($_POST['mail_util']) AND isset($_POST['mdp_util']) AND 
            $_POST['nom_util'] !='' AND $_POST['prenom_util'] !='' AND 
            $_POST['mail_util'] !='' AND $_POST['mdp_util'] !=''){
            //stockage de la super globale POST['mail_util] dans une variable
            $mail =$_POST['mail_util'];
            //test si le mail existe déja en BDD (éviter les doublons)
            if(getUserBymail($bdd, $mail)){
                $msg = "le mail existe déja !!!";
            }
            //sinon création d'un nouvel utilisateur
            else{
                //stockage des super globales POST dans des variables
                $nom =$_POST['nom_util'];
                $prenom =$_POST['prenom_util'];
                $mdp =$_POST['mdp_util'];
                //hashage en md5 (obsoléte)
                $mdp = md5($mdp);
                //appel de la fonction ajouter  un user en BDD
                adduser($bdd, $nom, $prenom, $mail,$mdp) ;
                //message
                $msg = "$nom à été ajouté en  BDD";
            }
        }
        //sinon vides
        else{
            $msg = 'Veuillez compléter les champs du formulaire';
        }
    }
    //script gestion des messages d'erreurs en JS
    echo '<script>
        console.log("'.$msg.'");
        setMessage("'.$msg.'");
    </script>';        
?>