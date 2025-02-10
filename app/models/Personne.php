<?php
require_once ".php";
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
    
public static function login(string $email, string $password): ?Personne {
    try {
        $pdo = Database::getInstance()->getConnection();
        $query = "SELECT * FROM Personne WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email' => $email]);
        
        if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $user['mot_de_passe'])) {
                return new Personne(
                    $user['id'],
                    $user['nom'],
                    $user['prenom'],
                    $user['email'],
                    $user['mot_de_passe'],
                    $user['role']
                );
            }
        }
        return null;
    } catch (PDOException $e) {
        // Handle or log the error appropriately
        return null;
    }
}

public static function logout(): bool {
    if (isset($_SESSION['user_id'])) {
        session_destroy();
        return true;
    }
    return false;
}


}
