<?php

require_once 'Personne.php';

class Admin extends Personne {
    // Constructor
    public function __construct($id, $nom, $prenom, $email, $motDePasse, $role) {
        parent::__construct($id, $nom, $prenom, $email, $motDePasse, $role);
    }

    // Additional methods for Admin
    public function manageUsers() {
        // Code to manage users
    }

    public function manageContent() {
        // Code to manage content
    }
}
?>