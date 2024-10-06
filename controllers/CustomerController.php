<?php

require_once '../models/Customer.php';

class CustomerController {
    private $customerModel;

    public function __construct($pdo) {
        $this->customerModel = new Customer($pdo);
    }

    public function index() {
        $customers = $this->customerModel->getAllCustomers();
        include '../views/customers/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            
            if ($this->customerModel->createCustomer($name, $email, $phone)) {
                header('Location: /?route=customers');
                exit;
            }
        }
        include '../views/customers/create.php';
    }

    // Add other methods like edit, delete, etc.
}