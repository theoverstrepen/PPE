			<form name = "form" method = "post" action="">
				Entrez la date de la traversée : <input type="date" name="date"/><br/>
				Entrez l'heure de la traversée : <input type="time" name="heure"/> <br/>
				<input type="submit" name="validFind" value="Trouver"/> <br/>
			</form>
			<?php
				$servername = 'localhost'; //nom du serveur de connexion
				$dbname = 'marieteam'; //nom de la bdd
            	$username = 'root'; // identifiant
            	$password = ''; //mot de passe (laissez comme tel si vide)
 
//-----------------------------------------Partie Destinée à la connexion, ignorez si déja présent lors de la copie--------------------------
            //On établit la connexion
            	$base = new mysqli($servername, $username, $password);
            	$base = mysqli_connect($servername, $username,$password, $dbname);
            //On vérifie la connexion
				if($base) 
				{
					echo 'Connexion réussie.<br />'; // affiche Connexion réussie
					echo 'Informations sur le serveur:'.mysqli_get_host_info($base).'<br />'; //Affiche les informations du serveur
				}  
				else 
				{
					echo('Erreur %d : %s.<br/>'.mysqli_connect_errno().mysqli_connect_error().'<br />');
				} 
			
//---------------------------------------Fin de la Partie Connexion et Début programme--------------------------------------------------			
			
            //situation dépendantes d'une condition:
                //Appuyer sur le bouton du formulaire effectue:
				if(isset($_POST['validFind'])) //"Si le bouton de valeur 'validFind', faire "
				{
                    //Les valeurs entrées dans le formulaire deviennent des variables
					//$date=$_POST['date'];
					$date = date("Y-m-d",strtotime($_POST['date']));
                    $heure= $_POST['heure'];
					
                    //Les commandes sont effectuées
						//On imprime les traversées
						$requete = "SELECT * FROM traverse WHERE DateTraversee >= $date ORDER BY DateTraversee ASC,heureTraverse ASC ";
						
						$result = mysqli_query($base,$requete);
						
                        if ($result == TRUE)
                        {
							
							mysqli_query($base,$creatable);
							while ($ligne = mysqli_fetch_assoc($result)) 
                            {
								echo $ligne['date'].''.$ligne['heure'].'<br />';
							}
                        }
                        else
                        {
                            echo 'Erreur : Aucun résultat trouvé <br />'; //Si aucune traversées n'est trouver à la date entrée, Affiche ce message
						}
						
                    
//-----------------------Partie Deconnexion et redirection-------------------------------------------------------------------------------------------------
                
				 	//si il y a une tentative de fermeture de la base
				/*	 if (mysqli_close($base)) 
					 {
						 echo 'Déconnexion réussie.<br />'; // Afficher "Déconnexion réussie" si c'est un succès
					 }
 
					 else 
					 {
						 echo 'Echec de la déconnexion.'; //Afficher "Echec de la déconnexion." si cela échoue
					 }
					 */
				 }
				 unset($date);
				 unset($heure);
				 unset($sql);
				// header("Location: http://localhost/ppe/zonetest.php"); //Modifiez le lien de redirection ici
 
			?>