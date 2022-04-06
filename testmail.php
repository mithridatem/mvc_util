<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="mail_util" id="mail">
        <p><input type="submit" value="tester"></p>
    </form>
</body>
</html>
<?php
    //import des ressources
    include './utils/connectBdd.php';
    include './model/model_user.php';
    //test si le champ mail existe et est rempli
    if(isset($_POST['mail_util']) AND !empty($_POST['mail_util'])){
        $mail = $_POST['mail_util'];
        //test si le mail existe déja
        if(getUserBymail($bdd, $mail)){
            echo '<p>Le mail existe déja !!!</p>';
        }
        else{
            echo '<p>Le mail n\'existe pas Go !!!</p>';
        }
    }
    
?>