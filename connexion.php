<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="formulaire.css">
</head>
<body>
	<?php //connexion BDD 
		$BDD = array();
		$BDD['host'] = "localhost";
		$BDD['user'] = "root";
		$BDD['pass'] = "";
		$BDD['db'] = "marieteam";
		$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
		if(!$mysqli) {
    		echo "Connexion non établie.";
    		exit;
		}
	?>
    <form action="verification.php" method="post">
		<div class="container">
			<h1> Connexion </h1></br>
			<label for="name">Email :</label>
			<input type="text" placeholder="Entrer nom" id="name" name="user_mail">
				
			<label for="mail">Mot de passe:</label>
			<input type="password" placeholder="Entrer e-mail" id="mail" name="password">			

            <button type="submit" class="loginbtn">Connexion</button>
            <p class="signin">Vous n'avez pas encore de compte? <a href="inscription">Inscription</a></p>
		</div>
	</form>
	<?php 
		if(isset($_GET['erreur'])){
			$err = $_GET['erreur'];
			if($err==1 || $err==2)
				echo "<p>Utilisateur ou mot de passe incorrect</p>";
		}
	?>

</body>
</html>
