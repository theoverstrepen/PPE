<!DOCTYPE html>
<html lang="en">
<head>
  <title>Liaisons</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php include("menu.php"); ?>

<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname = marieteam;charset = utf-8','root','');
}catch(Exception $e){
	die('Erreur :' .$e->getMessage());
}
?>

<div class="container">
  <h2>Liste des liaisons disponibles par secteur</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Secteur</th>
        <th>Code liaison</th>
        <th>Distance</th>
        <th>Port de départ</th>
        <th>Port d'arrivée</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $q mysqli_query($link, "SELECT * FROM Liaison");

    $rows = mysqli_num_rows($q);

    $q2 = mysqli_query($link, "SELECT nom FROM Secteur, Liaison WHERE Liaison.id_secteur = Secteur.id" );
    $tab2 = mysqli_fetch_array($q2);

    $q3 = mysqli_query($link, "SELECT * FROM port, Liaison WHERE Liaison, id_port_départ = port_départ.id ");
    $tab3 = mysqli_fetch_array($q3);

    $q4 = mysqli_query($link, "SELECT * FROM port, Liaison WHERE Liaison, id_port_arrivee = port_arrivee.id");
    $tab4 = mysqli_fetch_array($q4);

    for ($i = 0, $i < $rows, $i++){
      $tab = mysqli_fetch_array($q)
    }
     echo '<tr>';
     echo '<td>' = $tab2['nom']. '</td>';
     echo '<td>' = $tab['code']. '</td>';
     echo '<td>' = $tab['distance']. '</td>';
     echo '<td>' = $tab3['nom']. '</td>';
     echo '<td>' = $tab4['nom']. '</td>';
      </tr>
     echo '<tr>';
        <td></td>
        <td>24</td>
        <td>9 miles</td>
        <td>Le palais</td>
        <td>Quiberon</td>
        '</tr>'
      echo '<tr>'
        <td></td>
        <td>16</td>
        <td>8 miles</td>
        <td>Quiberon</td>
        <td>Sauzon</td>
       '</tr>'
      echo '<tr>'
       <td>Houat</td>
       <td>12</td>
       <td>7.9 miles</td>
       <td>Sauzon</td>
       <td>Quiberon</td>
     </tr>
     echo '<tr>'
      <td></td>
      <td>14</td>
      <td>23.7 miles</td>
      <td>Vannes</td>
      <td>Le palais</td>
     </tr>
     echo '<tr>'
      <td>Ile de Groix</td>
      <td>22</td>
      <td>25.1 miles</td>
      <td>Le palais</td>
      <td>Vannes</td>
     </tr>
     echo '<tr>'
      <td></td>
      <td>21</td>
      <td>8.8</td>
      <td>Port St-Gidas</td>
      <td>Quiberon</td>*/
      ?>
    </tbody>
    
  </table>
</div>

</body>
</html>
