<?php
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
