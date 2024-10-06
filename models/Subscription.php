<?php

class Subscription {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllSubscriptions() {
        $stmt = $this->pdo->query("SELECT * FROM subscriptions");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSubscriptionById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM subscriptions WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createSubscription($customerId, $planName, $price, $billingCycle) {
        $stmt = $this->pdo->prepare("INSERT INTO subscriptions (customer_id, plan_name, price, billing_cycle) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$customerId, $planName, $price, $billingCycle]);
    }

    public function updateSubscription($id, $planName, $price, $billingCycle) {
        $stmt = $this->pdo->prepare("UPDATE subscriptions SET plan_name = ?, price = ?, billing_cycle = ? WHERE id = ?");
        return $stmt->execute([$planName, $price, $billingCycle, $id]);
    }

    public function deleteSubscription($id) {
        $stmt = $this->pdo->prepare("DELETE FROM subscriptions WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getActiveSubscribersCount() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM subscriptions WHERE status = 'active'");
        return $stmt->fetchColumn();
    }

    public function getInactiveSubscribersCount() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM subscriptions WHERE status = 'inactive'");
        return $stmt->fetchColumn();
    }
}