<?php
    //session
    session_start();
    //import des ressources
    include './utils/connectBdd.php';
    include './model/model_user.php';
    include './view/view_menu.php';
    include './view/view_connexion.php';

    //test si le bouton submit à été cliqué
    if(isset($_POST['submit'])){
        //test si les champs sont remplis
        if(isset($_POST['mail_util']) AND isset($_POST['mdp_util']) AND
        !empty($_POST['mail_util']) AND !empty($_POST['mdp_util'])){
            $mail = $_POST['mail_util'];
            $mdp = $_POST['mdp_util'];
            //hash mdp en md5
            $mdp = md5($mdp);
            //récupération des informations utilisateur (array)
            $info = getUserByInfo($bdd, $mail, $mdp);
            //test si les valeurs correspondent (bdd et formulaire)
            if($mail == $info[0]['mail_util'] AND $mdp == $info[0]['mdp_util']){
                //création des supers globale SESSION
                $_SESSION['id'] = $info[0]['id_util'];
                $_SESSION['nom'] = $info[0]['nom_util'];
                $_SESSION['prenom'] = $info[0]['prenom_util'];
                $_SESSION['mail_util'] = $info[0]['mail_util'];
                $_SESSION['connected'] = true;
                //redirection
                header('Location: ./index.php?connected');
            }
            //sinon informations de connexion incorrectes
            else{
                //redirection
                header('Location: ./index.php?invalid');
            }
        }
        //sinon champs du formulaire vides ou incomplets
        else{
            //redirection
            header('Location: ./index.php?empty');
        }
    }
    //variable message
    $msg = "";
    //gestion des erreurs
    if(isset($_GET['deconnected'])){
        $msg = 'Deconnecté !!!';
    }
    if(isset($_GET['invalid'])){
        $msg = 'informations incorrectes!!!';
    }
    if(isset($_GET['connected'])){
        $msg = 'Utilisateur connecté !!!';
    }
    if(isset($_GET['empty'])){
        $msg = 'Veuillez remplir les champs du formulaire !!!';
    }
    //script gestion des messages d'erreurs en JS
    echo '<script>
        console.log("'.$msg.'");
        setMessage("'.$msg.'");
    </script>';     
?>