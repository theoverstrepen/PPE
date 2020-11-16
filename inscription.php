<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="formulaire.css">
</head>
<body>

    <?php include("menu.php"); ?>
	
    <form action="traitement" method="post">
		<div class="container">
			<h1> Inscription </h1></br>
			<label for="name">Nom :</label>
			<input type="text" placeholder="Entrer nom" id="name" name="user_name">
				
			<label for="mail">e-mail:</label>
			<input type="text" placeholder="Entrer e-mail" id="mail" name="user_mail">
			
			<label for="password">Mot de passe :</label>
			<input type="password" placeholder="Entrer mot de passe" id="password" name="password">
		
			<label for="password_confirm">Confirmer :</label>
			<input type="password" placeholder="Repeter mot de passe" id="password_confirm" name="password_confirm">
	
			<button type="submit" class="registerbtn">inscription</button>
		</form>

</body>
</html>
