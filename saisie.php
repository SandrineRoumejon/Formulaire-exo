<?php
//Récupération des données formulaire
$nom = $_POST['nom'];
$prenom =  $_POST['prenom'];
$email = $_POST['email'];
$message = $_POST['message'];

// Requete PDO connexion base de données
$servername = "localhost";
$database = "formulaire";
$username = "root";
$password = "coda";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !!!";
}
catch(PDOException $e)
{
    echo "La connexion a échouée !!! " . $e->getMessage();
}

// Insertion des données dans la base
$data = $conn->prepare("INSERT INTO contact (nom, prenom, email, message)
  VALUES (:nom, :prenom, :email, :message)");

$data -> execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'message' => $message
));

echo $nom . $prenom . $email . $message;
?>
