<h2 class="mb-4">Edit Student</h2>
<form id="student-form" action="/students/<?php echo $student['id']; ?>/update" method="POST" class="needs-validation"
    novalidate>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student['name']); ?>"
            class="form-control" required>
        <div class="invalid-feedback">Please enter a name.</div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>"
            class="form-control" required>
        <div class="invalid-feedback">Please enter a valid email.</div>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age:</label>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($student['age']); ?>"
            class="form-control" required>
        <div class="invalid-feedback">Please enter an age.</div>
    </div>
    <button type="submit" class="btn btn-primary">Update Student</button>
    <a href="/students" class="btn btn-secondary ms-2">Back to List</a>
</form>