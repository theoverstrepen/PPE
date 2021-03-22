			<form name = "form" method = "post" action="">
				Selectionnez un bateau pour la traversée : <input type ="" name = "Bateau"><br />
				Entrez la date de la traversée : <input type="date" name="date"/><br/>
				Entrez l'heure de la traversée : <input type="time" name="heure"/> <br/>
				<input type="submit" name="validAdd" value="Ajouter"/> <br/>
			</form>
			<?php
				$servername = 'localhost'; //nom du serveur de connexion
				$dbname = 'marieteam2'; //nom de la bdd
            	$username = 'root'; // identifiant
            	$password = ''; //mot de passe (laissez comme tel si vide)
 
//-----------------------------------------Partie Destinée à la connexion, ignorez si déja présent lors de la copie--------------------------

            //On établit la connexion
            	$base = new mysqli($servername, $username, $password);
            	$base = mysqli_connect($servername, $username,$password, $dbname);
            //On vérifie la connexion
				if($base) 
				{
					echo 'Connexion réussie.<br />';
					echo 'Informations sur le serveur:'.mysqli_get_host_info($base).'<br />';

				}  
				else 
				{
					echo('Erreur %d : %s.<br/>'.mysqli_connect_errno().mysqli_connect_error().'<br />');
				}

//---------------------------------------Fin de la Partie Connexion---------------------------------------------------------------------------
			
			
                //Appuyer sur le bouton du formulaire
				if(isset($_POST['validAdd']))
				{
					//Nos variables pour la requête
					$date=$_POST['date'];
					$heure=$_POST['heure'];
					
                    $compteur = mysqli_insert_id($base);
					
					//Ecriture de la requête dans la base
					
					$sql = "INSERT INTO traverse(DateTraversee,heureTraverse) VALUES ('".$date."','".$heure."')";

					echo $sql.'<br />';
					$resultat = mysqli_query($base, $sql);
					if($resultat = TRUE)
					{
						echo "reussite";
					}
					else 
					{
						echo "echec";
					}
				    echo "Traversée enregistrée.<br />";
				}
//-----------------------Partie Deconnexion et redirection----------------------------------------------------------------------------------------------
               
			?>