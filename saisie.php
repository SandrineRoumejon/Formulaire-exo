<?php
//Récupération des données formulaire
$nom = $_POST['nom'];
$prenom =  $_POST['prenom'];
$mail = $_POST['mail'];
$message = $_POST['message'];

// Requete PDO connexion base de données
$servername = "localhost";
$database = "formulaire";
$username = "votre identifiant";
$password = "votre mot de passe";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !!!";
    header('Location: http://localhost/phpmyadmin/');

}
catch(PDOException $e)
{
    echo "La connexion a échouée !!! " . $e->getMessage();
}

// Insertion des données dans la base
$data = $db->prepare("INSERT INTO contact (nom, prenom, mail, message)
  VALUES (:nom, :prenom, :mail, :message)");
$data -> execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'mail' => $mail,
    'message' => $message
));

?>
