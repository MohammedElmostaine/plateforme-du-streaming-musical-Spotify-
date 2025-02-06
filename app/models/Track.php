<?php


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
