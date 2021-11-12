<?php 
include_once __DIR__.'/comm/lib/autoload.php';
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$controller = new OrderController("ORDER");

switch($path) {
    case '/':
    case '/order':
        $controller->list();
        break;
    case '/auth/login/':
        $controller->login();
        break;
    case '/auth/logout/':
        $controller->logout();
        break;
    default:
        require __DIR__.'/404.php';
}
?>
