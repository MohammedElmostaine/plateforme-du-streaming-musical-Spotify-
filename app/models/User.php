<?php 
// Classe Utilisateur (hérite de Personne)
class Utilisateur extends Personne {
    private int $favoritePlaylistId;
    
    public function __construct($id, $nom, $prenom, $email, $motDePasse, $role, $favoritePlaylistId) {
        parent::__construct($id, $nom, $prenom, $email, $motDePasse, $role);
        $this->favoritePlaylistId = $favoritePlaylistId;
    }

    public function getFavoritePlaylistId(): int {
        return $this->favoritePlaylistId;
    }
}
