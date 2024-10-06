<h1 class="mb-4">Customers</h1>
<a href="/?route=customers&action=create" class="btn btn-primary mb-3">Add New Customer</a>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= htmlspecialchars($customer['id']) ?></td>
                    <td><?= htmlspecialchars($customer['name']) ?></td>
                    <td><?= htmlspecialchars($customer['email']) ?></td>
                    <td><?= htmlspecialchars($customer['phone']) ?></td>
                    <td>
                        <a href="/?route=customers&action=edit&id=<?= $customer['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/?route=customers&action=delete&id=<?= $customer['id'] ?>" class="btn btn-sm btn-danger btn-delete">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>