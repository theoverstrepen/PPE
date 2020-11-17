<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="formulaire.css">
</head>
<body>

    <?php include("menu.php"); ?>

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
	

	<?php $AfficherFormulaire=1;//Affichage du formulaire

	if ($AfficherFormulaire == 1){?>
		<form action="inscription.php" method="post">
		<div class="container">
			<h1> Inscription </h1></br>
			<label for="name">Prenom :</label>
			<input type="text" placeholder="Entrer prenom" id="user_name" name="user_name">

			<label for="lastname">Nom :</label>
			<input type="text" placeholder="Entrer nom" id="user_lastname" name="user_lastname">
			
			<label for="password">Mot de passe :</label>
			<input type="password" placeholder="Entrer mot de passe" id="password" name="password">
		
			<label for="password_confirm">Confirmer :</label>
			<input type="password" placeholder="Repeter mot de passe" id="password_confirm" name="password_confirm">

			<label for="mail">e-mail:</label>
			<input type="text" placeholder="Entrer e-mail" id="mail" name="user_mail">
	
			<button type="submit" class="registerbtn">inscription</button>
		</form>
	<?php }?>
	<?php 
	$date = date("Y-m-d");
	if(isset($_POST['user_name'],$_POST['password'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    	if(empty($_POST['user_name'])){//le champ prenom est vide, on arrête l'exécution du script et on affiche un message d'erreur
        	echo "Le champ prenom est vide.";
    	} elseif(strlen($_POST['user_name'])>25){//le nom est trop long, il dépasse 25 caractères
        	echo "Le pseudo est trop long, il dépasse 25 caractères.";
    	} elseif(empty($_POST['password'])){//le champ mot de passe est vide
			echo "Le champ Mot de passe est vide.";
		} elseif($_POST['password'] != $_POST['password_confirm']){//les mots de passe ne correspondent pas
			echo "les mots de passe ne correspondent pas.";
		} elseif(empty($_POST['user_mail'])){//le champ email est vide
			echo "Le champ email est vide.";
		}
		 else {
        	//toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
        	//Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
        	if(!mysqli_query($mysqli,"INSERT INTO membres SET 
			nom='".$_POST['user_lastname']."',
			prenom='".$_POST['user_name']."',
			pass='".$_POST['password']."',
			email='".$_POST['user_mail']."',
			date_inscription='".$date."'
			")){
            	echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
        	} else {
            	echo "Vous êtes inscrit avec succès!";
            	//on affiche plus le formulaire
            	$AfficherFormulaire=0;
        	}
    	}
	}?>

</body>
</html>
