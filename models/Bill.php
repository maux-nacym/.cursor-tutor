<?php

class Bill {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllBills() {
        $stmt = $this->pdo->query("SELECT * FROM bills");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBillById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM bills WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBill($customerId, $subscriptionId, $amount, $dueDate, $status) {
        $stmt = $this->pdo->prepare("INSERT INTO bills (customer_id, subscription_id, amount, due_date, status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$customerId, $subscriptionId, $amount, $dueDate, $status]);
    }

    public function updateBillStatus($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE bills SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function deleteBill($id) {
        $stmt = $this->pdo->prepare("DELETE FROM bills WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getTotalBillsCount() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM bills");
        return $stmt->fetchColumn();
    }

    public function getPaidBillsCount() {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM bills WHERE status = 'paid'");
        return $stmt->fetchColumn();
    }

    public function getTotalPaidAmount() {
        $stmt = $this->pdo->query("SELECT SUM(amount) FROM bills WHERE status = 'paid'");
        return $stmt->fetchColumn();
    }

    public function getTotalUnpaidAmount() {
        $stmt = $this->pdo->query("SELECT SUM(amount) FROM bills WHERE status != 'paid'");
        return $stmt->fetchColumn();
    }
}