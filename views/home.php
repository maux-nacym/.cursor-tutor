<h1 class="mb-4">Dashboard</h1>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Active Subscribers</h5>
                <p class="card-text display-4"><?= $dashboardData['activeSubscribers'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Inactive Subscribers</h5>
                <p class="card-text display-4"><?= $dashboardData['inactiveSubscribers'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Subscribers</h5>
                <p class="card-text display-4"><?= $dashboardData['totalSubscribers'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Bills</h5>
                <p class="card-text display-4"><?= $dashboardData['totalBills'] ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Subscribers</h5>
                <canvas id="subscribersChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bills</h5>
                <canvas id="billsChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Paid Amount</h5>
                <p class="card-text display-4">$<?= number_format($dashboardData['totalPaidAmount'], 2) ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Unpaid Amount</h5>
                <p class="card-text display-4">$<?= number_format($dashboardData['totalUnpaidAmount'], 2) ?></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Subscribers Chart
    const subscribersCtx = document.getElementById('subscribersChart').getContext('2d');
    new Chart(subscribersCtx, {
        type: 'pie',
        data: {
            labels: ['Active', 'Inactive'],
            datasets: [{
                data: [<?= $dashboardData['activeSubscribers'] ?>, <?= $dashboardData['inactiveSubscribers'] ?>],
                backgroundColor: ['#28a745', '#dc3545']
            }]
        }
    });

    // Bills Chart
    const billsCtx = document.getElementById('billsChart').getContext('2d');
    new Chart(billsCtx, {
        type: 'pie',
        data: {
            labels: ['Paid', 'Unpaid'],
            datasets: [{
                data: [<?= $dashboardData['paidBills'] ?>, <?= $dashboardData['unpaidBills'] ?>],
                backgroundColor: ['#28a745', '#dc3545']
            }]
        }
    });
</script>