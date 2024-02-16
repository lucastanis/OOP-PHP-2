<?php

//Auteur: Lucas

require_once "user.php";

//Maak object aan
$user = new User();

// Registreer User
$user->registerUser("jantje", "geheim", "admin");

var_dump($user)

?>