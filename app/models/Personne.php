<?php
require_once "User.php";
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
