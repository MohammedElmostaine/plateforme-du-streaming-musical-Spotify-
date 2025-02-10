<?php

namespace App\Controllers;


class AuthController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate CSRF token
            if (!Security::validateCsrfToken($_POST['csrf_token'] ?? null)) {
                return $this->json(['error' => 'Invalid CSRF token'], 403);
            }

            $validator = new Validator($_POST);
            $validator->required('email')->email('email')
                     ->required('password')->minLength('password', 6);
            
            if ($validator->isValid()) {
                $user = Personne::findByEmail($_POST['email']);
                
                if ($user && password_verify($_POST['password'], $user->getMotDePasse())) {
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['role'] = $user->getRole();

                    // Create appropriate object based on role
                    switch ($user->getRole()) {
                        case 'admin':
                            $person = new Admin($user);
                            break;
                        case 'artiste':
                            $person = new Artiste($user);
                            break;
                        default:
                            $person = new Utilisateur($user);
                    }

                    $_SESSION['user'] = serialize($person);
                    $this->redirect('/dashboard');
                }
                
                $error = 'Email ou mot de passe invalide';
            } else {
                $error = $validator->getErrors();
            }
        }
        
        return $this->render('auth/login', [
            'error' => $error ?? null,
            'email' => $_POST['email'] ?? ''
        ]);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate CSRF token
            if (!Security::validateCsrfToken($_POST['csrf_token'] ?? null)) {
                return $this->json(['error' => 'Invalid CSRF token'], 403);
            }

            $validator = new Validator($_POST);
            $validator->required('nom')
                     ->required('prenom')
                     ->required('email')->email('email')
                     ->required('password')->minLength('password', 6)
                     ->required('password_confirm')
                     ->matches('password_confirm', 'password');
            
            if ($validator->isValid()) {
                if (!Personne::findByEmail($_POST['email'])) {
                    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $user = new Personne([
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'email' => $_POST['email'],
                        'mot_de_passe' => $hashedPassword,
                        'role' => $_POST['role'] ?? 'user'
                    ]);
                    
                    if ($user->save()) {
                        $_SESSION['user_id'] = $user->getId();
                        $_SESSION['role'] = $user->getRole();
                        
                        $this->redirect('/dashboard');
                    }
                    
                    $error = 'Erreur lors de la création du compte';
                } else {
                    $error = 'Cet email existe déjà';
                }
            } else {
                $error = $validator->getErrors();
            }
        }
        
        return $this->render('auth/register', [
            'error' => $error ?? null,
            'email' => $_POST['email'] ?? ''
        ]);
    }

    public function logout() {
        $_SESSION = [];
        
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        
        session_destroy();
        
        $this->redirect('/login');
    }
}