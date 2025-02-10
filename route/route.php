<?php
class Router {
    private $request;

    public function __construct() {
        $this->request = $_SERVER['REQUEST_URI'];
    }

    public function route() {
        switch ($this->request) {
            case '/':
                require __DIR__ . '/../views/home.php';
                break;
            case '/about':
                require __DIR__ . '/../views/about.php';
                break;
            case '/contact':
                require __DIR__ . '/../views/contact.php';
                break;
            default:
                http_response_code(404);
                require __DIR__ . '/../views/404.php';
                break;
        }
    }
}

$router = new Router();
$router->route();