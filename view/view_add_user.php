<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h3>Ajouter un utilisateur :</h3>
    <form action="" method="post">
        <p>Saisir le nom :</p>
        <input type="text" name="nom_util">
        <p>Saisir le prénom :</p>
        <input type="text" name="prenom_util">
        <p>Saisir le mail :</p>
        <input type="text" name="mail_util">
        <p>Saisir le mot de passe :</p>
        <input type="password" name="mdp_util">
        <p><input type="submit" value="Ajouter" name="submit"></p>
    </form>
    <p id="error"></p>
    <script src="./asset/script/script2.js"></script>
</body>
</html>