<?php
// Classe principale Personne
class Personne {
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $motDePasse;
    protected string $role;

    public function __construct($id, $nom, $prenom, $email, $motDePasse, $role) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->motDePasse = password_hash($motDePasse, PASSWORD_BCRYPT);
        $this->role = $role;
    }

    public function getId(): int {
        return $this->id;
    }
    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getMotDePasse(): string {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): void {
        $this->motDePasse = password_hash($motDePasse, PASSWORD_BCRYPT);
    }

    public function getRole(): string {
        return $this->role;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }

}

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
// Classe Playlist
class Playlist {
    private int $id;
    private string $nom;
    private int $userId;
    private string $visibilite;

    public function __construct($id, $nom, $userId, $visibilite) {
        $this->id = $id;
        $this->nom = $nom;
        $this->userId = $userId;
        $this->visibilite = $visibilite;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    public function getVisibilite(): string {
        return $this->visibilite;
    }

    public function setVisibilite(string $visibilite): void {
        $this->visibilite = $visibilite;
    }
}

// Classe Album
class Album {
    private int $id;
    private string $titre;
    private string $dateSortie;
    private int $artisteId;

    public function __construct($id, $titre, $dateSortie, $artisteId) {
        $this->id = $id;
        $this->titre = $titre;
        $this->dateSortie = $dateSortie;
        $this->artisteId = $artisteId;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function getDateSortie(): string {
        return $this->dateSortie;
    }

    public function setDateSortie(string $dateSortie): void {
        $this->dateSortie = $dateSortie;
    }

    public function getArtisteId(): int {
        return $this->artisteId;
    }

    public function setArtisteId(int $artisteId): void {
        $this->artisteId = $artisteId;
    }
}

// Classe Track
class Track {
    private int $id;
    private string $titre;
    private string $duree;
    private int $albumId;
    private int $categorieId;

    public function __construct($id, $titre, $duree, $albumId, $categorieId) {
        $this->id = $id;
        $this->titre = $titre;
        $this->duree = $duree;
        $this->albumId = $albumId;
        $this->categorieId = $categorieId;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitre(): string {
        return $this->titre;
    }

    public function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    public function getDuree(): string {
        return $this->duree;
    }

    public function setDuree(string $duree): void {
        $this->duree = $duree;
    }

    public function getAlbumId(): int {
        return $this->albumId;
    }

    public function setAlbumId(int $albumId): void {
        $this->albumId = $albumId;
    }

    public function getCategorieId(): int {
        return $this->categorieId;
    }

    public function setCategorieId(int $categorieId): void {
        $this->categorieId = $categorieId;
    }
}

// Classe Categorie
class Categorie {
    private int $id;
    private string $nom;

    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }
}
