<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

?>
<DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Synobim</title>
         <p>
            <a href="InscriptionMusic.php">Inscription </a>
            <a href="ConnexionMusic.php">Connexion </a>
            <a href="deconnexionMusic_post.php">Déconnexion </a>
            <a href="musicDownload.php">Ajouter une musique </a>
            <a href="Member_space.php">Espace Membre </a>

        </p>
	</head>
	<body>

		<h1>MusicRx</h1>
        <?php 
            if (isset($_SESSION['id']) AND isset($_SESSION['prenom']))
                {
                 echo 'Bonjour ' . $_SESSION['prenom'];
                  echo 'Bonjour ' . $_SESSION['prenom'];
               
                } 
        

   		?>
      <?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=membre;charset=utf8', 'root', '');
}
catch(Exception $e)
{
 
        die('Erreur : '.$e->getMessage());
}


$reponse = $bdd->query('
SELECT
    T.music_title, M.prenom
FROM
    music as T
JOIN
    membre as M
        on T.id_membre = M.id


  ');

while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>titre musique</strong> : <?php echo $donnees['music_title']; ?><br />
    Artiste : <?php echo $donnees['prenom']; ?>, 
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
  <p>
   		<audio controls>
        <source src="musicAdded/37.mp3">
    
        </audio>  
</p>



<section>
  <p>Deuxième étape Partage ta musique afin qu'elle soit évalué et fais toi connaitre </p>

</section>
<nav>
    <ul>
        <h1> Classement </h1>
        <li>Musique de quentin</li>
        <li>Musique d'amélie</li>
    </ul>
</nav>
</body>
</html>