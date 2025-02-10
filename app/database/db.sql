-- Table pour Personne (classe parent)
CREATE TABLE Personne (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(20) CHECK (role IN ('user', 'admin', 'artiste')) NOT NULL
);

-- Table pour User (hérite de Personne)
CREATE TABLE User (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES Personne(id) ON DELETE CASCADE
);

-- Table pour Admin (hérite de Personne)
CREATE TABLE Admin (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES Personne(id) ON DELETE CASCADE
);

-- Table pour Artiste (hérite de Personne)
CREATE TABLE Artiste (
    id INT PRIMARY KEY,
    biographie TEXT,
    FOREIGN KEY (id) REFERENCES Personne(id) ON DELETE CASCADE
);

-- Table pour Album
CREATE TABLE Album (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    date_sortie DATE NOT NULL,
    artiste_id INT NOT NULL,
    FOREIGN KEY (artiste_id) REFERENCES Artiste(id) ON DELETE CASCADE
);

-- Table pour Track (chanson)
CREATE TABLE Track (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    duree INTERVAL NOT NULL,
    album_id INT,
    categorie_id INT NOT NULL,
    FOREIGN KEY (album_id) REFERENCES Album(id) ON DELETE SET NULL,
    FOREIGN KEY (categorie_id) REFERENCES Categorie(id) ON DELETE CASCADE
);

-- Table pour Categorie
CREATE TABLE Categorie (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Table pour Playlist
CREATE TABLE Playlist (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    visibilite VARCHAR(10) CHECK (visibilite IN ('publique', 'privee')) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE
);

-- Table pour la relation Playlist-Track
CREATE TABLE Playlist_Track (
    playlist_id INT NOT NULL,
    track_id INT NOT NULL,
    PRIMARY KEY (playlist_id, track_id),
    FOREIGN KEY (playlist_id) REFERENCES Playlist(id) ON DELETE CASCADE,
    FOREIGN KEY (track_id) REFERENCES Track(id) ON DELETE CASCADE
);

