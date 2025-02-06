<?php


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