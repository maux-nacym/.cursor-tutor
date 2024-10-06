<?php
session_start();
require_once '../config/database.php';
require_once '../controllers/HomeController.php';
require_once '../controllers/CustomerController.php';
require_once '../controllers/SubscriptionController.php';
require_once '../controllers/UserController.php';
require_once '../controllers/BillingController.php';

// Initialize controllers
$homeController = new HomeController($pdo);
$customerController = new CustomerController($pdo);
$subscriptionController = new SubscriptionController($pdo);
$userController = new UserController($pdo);
$billingController = new BillingController($pdo);

// Improved routing
$route = $_GET['route'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Include header
include '../views/layout/header.php';

// Route to appropriate controller and action
switch ($route) {
    case 'home':
        $homeController->index();
        break;
    case 'customers':
        $customerController->$action();
        break;
    case 'subscriptions':
        $subscriptionController->$action();
        break;
    case 'users':
        $userController->$action();
        break;
    case 'bills':
        $billingController->$action();
        break;
    default:
        $homeController->index();
}

// Include footer
include '../views/layout/footer.php';