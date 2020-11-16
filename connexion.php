<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="formulaire.css">
</head>
<body>
	
    <form action="traitement" method="post">
		<div class="container">
			<h1> Connexion </h1></br>
			<label for="name">Nom :</label>
			<input type="text" placeholder="Entrer nom" id="name" name="user_name">
				
			<label for="mail">Mot de passe:</label>
			<input type="password" placeholder="Entrer e-mail" id="mail" name="user_mail">			

            <button type="submit" class="loginbtn">Connexion</button>
            <p class="signin">Vous n'avez pas encore de compte? <a href="inscription">Inscription</a></p>
		</form>

</body>
</html>
