<h2 class="mb-4">Students List</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo htmlspecialchars($student['id']); ?></td>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo htmlspecialchars($student['age']); ?></td>
                <td>
                    <button class="btn btn-sm btn-warning edit-student-btn"
                        data-id="<?php echo $student['id']; ?>">Edit</button>
                    <button class="btn btn-sm btn-danger delete-student-btn"
                        data-id="<?php echo $student['id']; ?>">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>