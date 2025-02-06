<?php

// Classe Artiste (hérite de Personne)
class Artiste extends Personne {
    private string $biographie;
    
    public function __construct($id, $nom, $prenom, $email, $motDePasse, $role, $biographie) {
        parent::__construct($id, $nom, $prenom, $email, $motDePasse, $role);
        $this->biographie = $biographie;
    }
    
    public function getBiographie(): string {
        return $this->biographie;
    }
}