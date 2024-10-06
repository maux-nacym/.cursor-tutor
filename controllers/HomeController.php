<?php

require_once '../models/Customer.php';
require_once '../models/Subscription.php';
require_once '../models/Bill.php';

class HomeController {
    private $customerModel;
    private $subscriptionModel;
    private $billModel;

    public function __construct($pdo) {
        $this->customerModel = new Customer($pdo);
        $this->subscriptionModel = new Subscription($pdo);
        $this->billModel = new Bill($pdo);
    }

    public function index() {
        $dashboardData = $this->getDashboardData();
        include '../views/home.php';
    }

    private function getDashboardData() {
        $activeSubscribers = $this->subscriptionModel->getActiveSubscribersCount();
        $inactiveSubscribers = $this->subscriptionModel->getInactiveSubscribersCount();
        $totalSubscribers = $activeSubscribers + $inactiveSubscribers;
        
        $totalBills = $this->billModel->getTotalBillsCount();
        $paidBills = $this->billModel->getPaidBillsCount();
        $unpaidBills = $totalBills - $paidBills;
        
        $totalPaidAmount = $this->billModel->getTotalPaidAmount();
        $totalUnpaidAmount = $this->billModel->getTotalUnpaidAmount();

        return [
            'activeSubscribers' => $activeSubscribers,
            'inactiveSubscribers' => $inactiveSubscribers,
            'totalSubscribers' => $totalSubscribers,
            'totalBills' => $totalBills,
            'paidBills' => $paidBills,
            'unpaidBills' => $unpaidBills,
            'totalPaidAmount' => $totalPaidAmount,
            'totalUnpaidAmount' => $totalUnpaidAmount,
        ];
    }
}