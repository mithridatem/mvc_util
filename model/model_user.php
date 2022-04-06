<?php
    //fonction qui ajoute un utilisateur en BDD(utilisateur)
    function adduser($bdd, $nom, $prenom, $mail,$mdp):void{
        try{
            $req = $bdd->prepare('INSERT INTO utilisateur(nom_util, prenom_util,
            mail_util, mdp_util) 
            VALUES(:nom_util, :prenom_util, :mail_util, :mdp_util)');
            $req->execute(array(
                'nom_util' => $nom,
                'prenom_util' =>$prenom,
                'mail_util' =>$mail,
                'mdp_util' =>$mdp
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction qui affiche tous les utilisateurs
    function showAllUser($bdd):void{
        try{
            $req = $bdd->prepare('SELECT * FROm utilisateur');
            $req->execute();
            //a chaque tour de la boucle remplace le contenu de $data
            //par un enregistrement de la BDD
            while($data = $req->fetch()){
                echo '<p>Le nom est égal à : '.$data['nom_util'].' le mail est égal à 
                '.$data['mail_util'].'</p>';
            }
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction affiche tous les utilisateurs (version alternative)
    function showAllUserV2($bdd):array {
        try{
            $req = $bdd->prepare("SELECT * FROM utilisateur");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction affiche tous les utilisateurs (version alternative)
    function showAllUserV3($bdd):array {
        try{
            $req = $bdd->prepare("SELECT * FROM utilisateur");
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction qui update un utilisateur en BDD(utilisateur)
    function updateUser($bdd, $nom, $prenom, $mail,$mdp, $id):void{
        try{
            $req = $bdd->prepare('UPDATE utilisateur SET nom_util = :nom_util, prenom_util
            = :prenom_util, mail_util = :mail_util, mdp_util = :mdp_util 
            WHERE id_util = :id_util');
            $req->execute(array(
                'nom_util' => $nom,
                'prenom_util' =>$prenom,
                'mail_util' =>$mail,
                'mdp_util' =>$mdp,
                'id_util' =>$id
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction affiche récupére un utilisateur
    function getUser($bdd, $id):array {
        try{
            $req = $bdd->prepare("SELECT nom_util, prenom_util, mail_util, mdp_util FROM utilisateur WHERE id_util = :id_util");
            $req->execute(array(
                'id_util' => $id,  
            ));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction qui supprime un utilisateur (table->utilisateur) depuis son $id
    function deleteUser($bdd, $value):void{
        try{
            $req = $bdd->prepare('DELETE FROM utilisateur WHERE id_util = :id_util');
            $req->execute(array(
                'id_util' => $value
                ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
?>